<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BiographyController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\PartnerController;

use App\Models\Biography;
use App\Models\Content;
use App\Models\Partner;

// Vista Pública (Landing Page)
Route::get('/', function () {
    $biography = Biography::where('is_active', true)->first();
    $sections = \App\Models\Content::orderBy('sort_order', 'asc')->get();
    $partners = \App\Models\Partner::where('is_active', true)->orderBy('sort_order')->get();
    $settings = \App\Models\Setting::all()->keyBy('key');
    $merches = \App\Models\Merch::where('is_active', true)->orderBy('sort_order')->get();
    return view('welcome', compact('biography', 'sections', 'partners', 'settings', 'merches'));
});
// Rutas de Ayuda/Técnicas
Route::get('/crear-symlink', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('storage:link');
        return "¡Enlace simbólico creado con éxito! Ya deberían verse las imágenes.";
    } catch (\Exception $e) {
        return "Error al crear el enlace: " . $e->getMessage();
    }
});

// Rutas Legales
Route::view('/aviso-de-privacidad', 'legal.aviso-privacidad')->name('legal.privacidad');
Route::view('/terminos-y-condiciones', 'legal.terminos')->name('legal.terminos');

// Rutas de Administración
Route::prefix('admin')->name('admin.')->group(function () {
    // Autenticación
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post')->middleware('guest');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

    // Panel de Control (Protegido)
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Biografía
        Route::get('/biography', [BiographyController::class, 'edit'])->name('biography.edit');
        Route::post('/biography', [BiographyController::class, 'update'])->name('biography.update');

        // Contenido (Noticias/Posts)
        Route::resource('/content', ContentController::class)->except(['show']);

        // Aliados / Socios
        Route::resource('/partners', PartnerController::class)->except(['show']);
        
        // Rutas de Configuración del Sistema
        Route::get('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');

        // Rutas de Merch
        Route::resource('/merch', \App\Http\Controllers\Admin\MerchController::class)->except(['show']);

        // Rutas de Contacto
        Route::resource('/contacts', \App\Http\Controllers\Admin\ContactMessageController::class)->only(['index', 'show', 'destroy']);
    });
});

Route::post('/contacto', [\App\Http\Controllers\ContactController::class, 'store'])->name('contacto.store');
