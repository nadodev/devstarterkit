<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Lead;

class AdminViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('layouts.admin', function ($view) {
            $stats = [
                'pending' => Lead::pendingEmail()->count(),
                'total' => Lead::count(),
            ];
            
            $view->with('stats', $stats);
        });
    }
}