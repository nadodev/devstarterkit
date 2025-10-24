<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CookieConsent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        
        // Verificar se o usuário deu consentimento para cookies
        $consent = $request->cookie('cookie-consent');
        
        if ($consent) {
            $consentData = json_decode($consent, true);
            
            // Adicionar headers para analytics se permitido
            if ($consentData['analytics'] ?? false) {
                $response->headers->set('X-Analytics-Enabled', 'true');
            }
            
            // Adicionar headers para marketing se permitido
            if ($consentData['marketing'] ?? false) {
                $response->headers->set('X-Marketing-Enabled', 'true');
            }
        }
        
        return $response;
    }
}
