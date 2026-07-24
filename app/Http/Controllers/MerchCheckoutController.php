<?php

namespace App\Http\Controllers;

use App\Models\Merch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class MerchCheckoutController extends Controller
{
    public function checkout(Request $request, Merch $merch)
    {
        $user = Auth::user();
        $token = env('MERCADOPAGO_ACCESS_TOKEN');

        if (!$token) {
            return redirect()->back()->with('error', 'Error de configuración: Faltan credenciales de pago.');
        }

        $baseUrl = config('app.url', 'https://conejocantu.com');
        if (str_contains($baseUrl, 'localhost') || str_contains($baseUrl, '192.168')) {
            $baseUrl = 'https://conejocantu.com';
        }

        $preferenceData = [
            'items' => [
                [
                    'title' => 'Merch: ' . $merch->title,
                    'quantity' => 1,
                    'unit_price' => (float) $merch->price,
                    'currency_id' => 'MXN',
                ]
            ],
            'back_urls' => [
                'success' => $baseUrl,
                'failure' => $baseUrl,
                'pending' => $baseUrl
            ],
            'auto_return' => 'approved',
        ];

        if ($user) {
            $preferenceData['payer'] = ['email' => $user->email];
            $preferenceData['external_reference'] = 'MERCH_' . $merch->id . '_' . $user->id;
        } else {
            $preferenceData['external_reference'] = 'MERCH_' . $merch->id;
        }

        $response = Http::withToken($token)->post('https://api.mercadopago.com/checkout/preferences', $preferenceData);

        if ($response->successful()) {
            $data = $response->json();
            return redirect()->away($data['init_point']);
        }

        $errorDetail = $response->body();
        \Illuminate\Support\Facades\Log::error('MercadoPago Error (Merch): ' . $errorDetail);

        return redirect()->back()->with('error', 'Hubo un error al iniciar la compra segura. Intenta más tarde.');
    }
}
