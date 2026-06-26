<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BiographyController;
use App\Http\Controllers\Admin\ContentController;

use App\Models\Biography;
use App\Models\Content;

// Vista Pública (Landing Page)
Route::get('/', function () {
    $biography = Biography::where('is_active', true)->first();
    $sections = Content::orderBy('sort_order', 'asc')->get();
    return view('welcome', compact('biography', 'sections'));
});

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
    });
});
