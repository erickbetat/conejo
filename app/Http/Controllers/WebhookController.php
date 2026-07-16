<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Subscription;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\ThankYouMail;

class WebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $type = $request->input('type') ?? $request->input('topic');
        $id = $request->input('data.id') ?? $request->input('id');
        
        Log::info('Mercado Pago Webhook Received:', ['type' => $type, 'id' => $id]);

        if (!$id) {
            return response()->json(['status' => 'ignored']);
        }

        $token = env('MERCADOPAGO_ACCESS_TOKEN');

        if ($type === 'subscription_preapproval' || $type === 'preapproval') {
            // Obtener detalles de la suscripción
            $response = Http::withToken($token)->get("https://api.mercadopago.com/preapproval/{$id}");
            
            if ($response->successful()) {
                $data = $response->json();
                $userId = $data['external_reference'] ?? null;
                $status = $data['status']; // authorized, paused, cancelled
                $reason = $data['reason'];
                
                if ($userId) {
                    $user = User::find($userId);
                    if ($user) {
                        // Mapear nombre del plan
                        $planName = 'Ninguno';
                        if (str_contains(strtolower($reason), 'oro')) $planName = 'Club Oro';
                        if (str_contains(strtolower($reason), 'titanio')) $planName = 'Club Titanio';
                        if (str_contains(strtolower($reason), 'elite')) $planName = 'Club Elite';

                        // Actualizar o crear suscripción
                        Subscription::updateOrCreate(
                            ['user_id' => $user->id],
                            [
                                'mercadopago_id' => $id,
                                'plan_name' => $planName,
                                'status' => $status === 'authorized' ? 'active' : 'cancelled'
                            ]
                        );
                        // Enviar correo de bienvenida si se acaba de autorizar
                        if ($status === 'authorized') {
                            try {
                                Mail::to($user->email)->send(new ThankYouMail([
                                    'name' => $user->name,
                                    'plan' => $planName !== 'Ninguno' ? $planName : $reason,
                                    'is_subscription' => true,
                                ]));
                            } catch (\Exception $e) {
                                Log::error('Error enviando email de bienvenida: ' . $e->getMessage());
                            }
                        }
                    }
                }
            }
        } elseif ($type === 'payment') {
            // Manejar pagos únicos (Aportación Libre)
            $response = Http::withToken($token)->get("https://api.mercadopago.com/v1/payments/{$id}");
            
            if ($response->successful()) {
                $data = $response->json();
                $status = $data['status'];
                $payerEmail = $data['payer']['email'] ?? null;
                $description = $data['description'] ?? 'Aportación';
                
                if ($status === 'approved' && $payerEmail) {
                    try {
                        Mail::to($payerEmail)->send(new ThankYouMail([
                            'name' => 'Amigo/a', // Mercado Pago payments api might not give name directly depending on integration
                            'plan' => $description,
                            'is_subscription' => false,
                        ]));
                    } catch (\Exception $e) {
                        Log::error('Error enviando email de donación: ' . $e->getMessage());
                    }
                }
            }
        }

        return response()->json(['status' => 'success']);
    }
}
