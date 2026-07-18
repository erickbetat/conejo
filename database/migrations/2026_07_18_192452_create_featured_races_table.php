<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('featured_races', function (Blueprint $table) {
            $table->id();
            $table->string('badge')->nullable(); // Ej. 1er Lugar
            $table->string('category')->nullable(); // Ej. Fórmula 4 México
            $table->string('title')->nullable();
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            
            $table->string('stat1_label')->nullable();
            $table->string('stat1_value')->nullable();
            
            $table->string('stat2_label')->nullable();
            $table->string('stat2_value')->nullable();
            
            $table->string('video_url')->nullable(); // Enlace a YouTube
            $table->string('video_path')->nullable(); // Archivo MP4 subido
            $table->string('image_path')->nullable(); // Foto del podio
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('featured_races');
    }
};
