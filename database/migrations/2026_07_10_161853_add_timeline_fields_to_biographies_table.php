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
        Schema::table('biographies', function (Blueprint $table) {
            $table->string('photo_1')->nullable();
            $table->string('desc_1')->nullable();
            $table->string('photo_2')->nullable();
            $table->string('desc_2')->nullable();
            $table->string('photo_3')->nullable();
            $table->string('desc_3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('biographies', function (Blueprint $table) {
            $table->dropColumn(['photo_1', 'desc_1', 'photo_2', 'desc_2', 'photo_3', 'desc_3']);
        });
    }
};
