<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // Estadísticas
            ['key' => 'stats_carreras', 'value' => '121', 'type' => 'number', 'description' => 'Número de carreras'],
            ['key' => 'stats_podios', 'value' => '78', 'type' => 'number', 'description' => 'Número de podios'],
            ['key' => 'stats_anios', 'value' => '10', 'type' => 'number', 'description' => 'Años de experiencia'],
            
            // Hero
            ['key' => 'hero_typewriter', 'value' => 'Piloto profesional de karting,Campeón Nacional 2023,Orgullo Mexicano', 'type' => 'text', 'description' => 'Texto que aparece como máquina de escribir (separado por comas)'],
            
            // Membresías
            ['key' => 'club_oro_price', 'value' => '188', 'type' => 'number', 'description' => 'Precio del Club Oro (MXN)'],
            ['key' => 'club_titanio_price', 'value' => '788', 'type' => 'number', 'description' => 'Precio del Club Titanio (MXN)'],
            ['key' => 'club_elite_price', 'value' => '1888', 'type' => 'number', 'description' => 'Precio del Club Élite (MXN)'],
            
            // Redes Sociales y Contacto
            ['key' => 'whatsapp_number', 'value' => '5218112345678', 'type' => 'text', 'description' => 'Número de WhatsApp con código de país'],
            ['key' => 'whatsapp_message', 'value' => '¡Hola! Me interesa unirme al Conejo Club.', 'type' => 'text', 'description' => 'Mensaje predefinido de WhatsApp'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
