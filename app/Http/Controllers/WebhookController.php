<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Subscription;
use Illuminate\Support\Facades\Log;

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
                    }
                }
            }
        }

        return response()->json(['status' => 'success']);
    }
}
