<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\Demo\DashboardController;
use App\Http\Controllers\Demo\UserController;
use App\Http\Controllers\Demo\ClientController;
use App\Http\Controllers\Demo\ProjectController;
use App\Http\Controllers\Demo\TaskController;
use App\Http\Controllers\Demo\SettingsController;

// Demo Routes - Sem autenticação real
Route::prefix('demo')->name('demo.')->group(function () {
    
    // Login Demo (sem autenticação real)
    Route::get('/login', [DemoController::class, 'login'])->name('login');
    Route::post('/login', [DemoController::class, 'authenticate'])->name('authenticate');
    Route::post('/logout', [DemoController::class, 'logout'])->name('logout');
    
    // Dashboard e páginas protegidas (middleware demo)
    Route::middleware(['demo.auth'])->group(function () {
        
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Usuários
        Route::resource('users', UserController::class);
        Route::post('users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggle-status');
        
        // Clientes
        Route::resource('clients', ClientController::class);
        Route::get('clients/{client}/export', [ClientController::class, 'export'])->name('clients.export');
        
        // Projetos
        Route::resource('projects', ProjectController::class);
        Route::post('projects/{project}/toggle-status', [ProjectController::class, 'toggleStatus'])->name('projects.toggle-status');
        Route::get('projects/{project}/export', [ProjectController::class, 'export'])->name('projects.export');
        
        // Tarefas
        Route::resource('tasks', TaskController::class);
        Route::post('tasks/{task}/update-status', [TaskController::class, 'updateStatus'])->name('tasks.update-status');
        Route::post('tasks/{task}/update-priority', [TaskController::class, 'updatePriority'])->name('tasks.update-priority');
        Route::post('tasks/{task}/assign', [TaskController::class, 'assign'])->name('tasks.assign');
        
        // Configurações
        Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
        Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');
    });
});
