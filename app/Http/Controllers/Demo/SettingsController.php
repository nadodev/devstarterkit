<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = [
            'app_name' => 'DevStarter Kit Demo',
            'app_email' => 'contato@devstarterkit.com',
            'app_phone' => '(11) 99999-9999',
            'app_address' => 'São Paulo, SP - Brasil',
            'theme_color' => '#3B82F6',
            'logo_url' => '/images/logo.png',
            'maintenance_mode' => false,
            'email_notifications' => true,
            'backup_frequency' => 'daily',
            'max_file_size' => '10MB'
        ];

        return view('demo.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'app_name' => 'required|string|max:255',
            'app_email' => 'required|email|max:255',
            'app_phone' => 'required|string|max:20',
            'app_address' => 'required|string|max:255',
            'theme_color' => 'required|string|max:7',
            'maintenance_mode' => 'boolean',
            'email_notifications' => 'boolean',
            'backup_frequency' => 'required|in:daily,weekly,monthly',
            'max_file_size' => 'required|string'
        ]);

        return redirect()->route('demo.settings')->with('success', 'Configurações atualizadas com sucesso!');
    }
}
