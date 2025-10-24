<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CookieController extends Controller
{
    const COOKIE_NAME = 'cookie_consent';
    const COOKIE_LIFETIME_DAYS = 365; // 1 ano

    /**
     * Salvar preferências de cookies
     */
    public function saveConsent(Request $request): JsonResponse
    {
        // Validar dados JSON
        $data = $request->json()->all();
        
        $consent = [
            'essential' => $data['essential'] ?? true,
            'analytics' => $data['analytics'] ?? false,
            'marketing' => $data['marketing'] ?? false,
            'timestamp' => now()->toISOString()
        ];

        // Salvar no cookie do navegador
        $cookie = cookie(self::COOKIE_NAME, json_encode($consent), 60 * 24 * self::COOKIE_LIFETIME_DAYS);

        return response()->json([
            'success' => true,
            'message' => 'Preferências de cookies salvas com sucesso!',
            'consent' => $consent
        ])->withCookie($cookie);
    }

    /**
     * Obter preferências atuais de cookies
     */
    public function getConsent(Request $request): JsonResponse
    {
        $consent = $request->cookie(self::COOKIE_NAME);
        
        if ($consent) {
            $consentData = json_decode($consent, true);
            return response()->json([
                'success' => true,
                'consent' => $consentData
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Nenhum consentimento encontrado'
        ]);
    }

    /**
     * Revogar consentimento
     */
    public function revokeConsent(): JsonResponse
    {
        $cookie = cookie('cookie-consent', null, -1); // Expirar cookie

        return response()->json([
            'success' => true,
            'message' => 'Consentimento revogado com sucesso!'
        ])->withCookie($cookie);
    }
}
