<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function login()
    {
        return view('demo.auth.login');
    }

    public function authenticate(Request $request)
    {
        // Para demo, sempre autenticar qualquer credencial
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:1',
        ]);

        // Simular autenticação demo
        session([
            'demo.authenticated' => true,
            'demo.user' => [
                'id' => 1,
                'name' => 'Admin Demo',
                'email' => $request->email,
                'role' => 'admin',
                'avatar' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&h=100&fit=crop&crop=face'
            ]
        ]);

        return redirect()->route('demo.dashboard')->with('success', 'Login realizado com sucesso!');
    }

    public function logout()
    {
        session()->forget(['demo.authenticated', 'demo.user']);
        return redirect()->route('demo.login')->with('success', 'Logout realizado com sucesso!');
    }
}
