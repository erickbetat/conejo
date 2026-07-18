<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'message' => 'required|string|max:2000',
        ]);

        ContactMessage::create($validated);

        try {
            // Puedes agregar más correos separándolos por comas dentro de este arreglo
            $destinatarios = [
                'contacto@conejocantu.com',
                // 'otrodireccion@ejemplo.com'
            ];
            \Illuminate\Support\Facades\Mail::to($destinatarios)->send(new \App\Mail\ContactFormMail($validated));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error enviando correo de contacto: ' . $e->getMessage());
            return back()->with('error', 'Error técnico del correo: ' . $e->getMessage());
        }

        return back()->with('contact_success', '¡Gracias por tu mensaje! Nos pondremos en contacto contigo pronto.')->withFragment('contacto');
    }
}
