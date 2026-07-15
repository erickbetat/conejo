<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;

class SubscriptionController extends Controller
{
    public function subscribe($plan)
    {
        $user = Auth::user();
        
        // Determinar precio y nombre basado en el plan elegido
        $price = 0;
        $planName = '';
        $reason = '';
        
        $settings = Setting::all()->keyBy('key');

        switch(strtolower($plan)) {
            case 'oro':
                $price = $settings['club_oro_price']->value ?? 188;
                $planName = 'Club Oro';
                $reason = 'Suscripción Mensual Club Oro - Conejo Cantú';
                break;
            case 'titanio':
                $price = $settings['club_titanio_price']->value ?? 788;
                $planName = 'Club Titanio';
                $reason = 'Suscripción Mensual Club Titanio - Conejo Cantú';
                break;
            case 'elite':
                $price = $settings['club_elite_price']->value ?? 2500;
                $planName = 'Club Elite';
                $reason = 'Suscripción Mensual Club Elite - Conejo Cantú';
                break;
            default:
                return redirect()->back()->with('error', 'Plan no válido.');
        }

        $token = env('MERCADOPAGO_ACCESS_TOKEN');

        if (!$token) {
            return redirect()->back()->with('error', 'Error de configuración: Faltan credenciales de pago.');
        }

        // Crear la preaprobación (suscripción) en Mercado Pago
        $response = Http::withToken($token)->post('https://api.mercadopago.com/preapproval', [
            'reason' => $reason,
            'external_reference' => (string) $user->id,
            'payer_email' => $user->email,
            'auto_recurring' => [
                'frequency' => 1,
                'frequency_type' => 'months',
                'transaction_amount' => (float) $price,
                'currency_id' => 'MXN',
            ],
            'back_url' => route('dashboard'),
            'status' => 'pending',
        ]);

        if ($response->successful()) {
            $data = $response->json();
            return redirect()->away($data['init_point']);
        }

        return redirect()->back()->with('error', 'Hubo un error al conectar con Mercado Pago. Intenta nuevamente.');
    }
}
