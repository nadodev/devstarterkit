<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cookie;

class CookieHelper
{
    const COOKIE_NAME = 'cookie_consent';

    /**
     * Obtém o status do consentimento de cookies.
     *
     * @return array|null Retorna um array com o status de cada tipo de cookie ou null se não houver consentimento.
     */
    public static function getConsent(): ?array
    {
        $consent = Cookie::get(self::COOKIE_NAME);

        if ($consent) {
            return json_decode($consent, true);
        }

        return null;
    }

    /**
     * Verifica se o consentimento para um tipo específico de cookie foi dado.
     *
     * @param string $type 'essential', 'analytics', 'marketing'
     * @return bool
     */
    public static function hasConsent(string $type): bool
    {
        $consent = self::getConsent();

        if ($consent && isset($consent[$type])) {
            return (bool) $consent[$type];
        }

        return false;
    }

    /**
     * Verifica se o consentimento essencial foi dado.
     * @return bool
     */
    public static function essentialAccepted(): bool
    {
        return self::hasConsent('essential');
    }

    /**
     * Verifica se o consentimento para analytics foi dado.
     * @return bool
     */
    public static function analyticsAccepted(): bool
    {
        return self::hasConsent('analytics');
    }

    /**
     * Verifica se o consentimento para marketing foi dado.
     * @return bool
     */
    public static function marketingAccepted(): bool
    {
        return self::hasConsent('marketing');
    }

    /**
     * Verificar se o usuário consentiu com cookies analíticos (método legado)
     */
    public static function hasAnalyticsConsent($request): bool
    {
        $consent = $request->cookie('cookie-consent');
        
        if (!$consent) {
            return false;
        }
        
        $consentData = json_decode($consent, true);
        return $consentData['analytics'] ?? false;
    }

    /**
     * Verificar se o usuário consentiu com cookies de marketing (método legado)
     */
    public static function hasMarketingConsent($request): bool
    {
        $consent = $request->cookie('cookie-consent');
        
        if (!$consent) {
            return false;
        }
        
        $consentData = json_decode($consent, true);
        return $consentData['marketing'] ?? false;
    }

    /**
     * Verificar se o usuário deu qualquer tipo de consentimento
     */
    public static function hasAnyConsent($request): bool
    {
        $consent = $request->cookie('cookie-consent');
        return $consent !== null;
    }

    /**
     * Obter dados completos do consentimento
     */
    public static function getConsentData($request): ?array
    {
        $consent = $request->cookie('cookie-consent');
        
        if (!$consent) {
            return null;
        }
        
        return json_decode($consent, true);
    }

    /**
     * Verificar se o consentimento ainda é válido (não expirou)
     */
    public static function isConsentValid($request): bool
    {
        $consentData = self::getConsentData($request);
        
        if (!$consentData) {
            return false;
        }
        
        // Verificar se o consentimento não é muito antigo (ex: 1 ano)
        $timestamp = $consentData['timestamp'] ?? null;
        if (!$timestamp) {
            return false;
        }
        
        $consentDate = new \DateTime($timestamp);
        $oneYearAgo = new \DateTime('-1 year');
        
        return $consentDate > $oneYearAgo;
    }
}
