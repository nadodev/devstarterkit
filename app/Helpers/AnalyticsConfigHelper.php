<?php

namespace App\Helpers;

class AnalyticsConfigHelper
{
    /**
     * Obter configurações de analytics
     */
    public static function getConfig(): array
    {
        $configFile = storage_path('app/analytics_config.json');
        
        if (file_exists($configFile)) {
            return json_decode(file_get_contents($configFile), true);
        }
        
        // Fallback para configurações do .env
        return [
            'google_analytics' => [
                'measurement_id' => env('GA_MEASUREMENT_ID', ''),
                'enabled' => env('GA_ENABLED', false),
            ],
            'facebook_pixel' => [
                'pixel_id' => env('FB_PIXEL_ID', ''),
                'enabled' => env('FB_PIXEL_ENABLED', false),
            ],
            'gtm' => [
                'container_id' => env('GTM_CONTAINER_ID', ''),
                'enabled' => env('GTM_ENABLED', false),
            ],
            'hotjar' => [
                'site_id' => env('HOTJAR_SITE_ID', ''),
                'enabled' => env('HOTJAR_ENABLED', false),
            ],
            'events' => [
                'purchase_value' => 97.00,
                'currency' => 'BRL',
                'product_name' => 'Laravel ProStarter',
            ],
        ];
    }

    /**
     * Verificar se Google Analytics está ativo
     */
    public static function isGoogleAnalyticsEnabled(): bool
    {
        $config = self::getConfig();
        return $config['google_analytics']['enabled'] && !empty($config['google_analytics']['measurement_id']);
    }

    /**
     * Verificar se Facebook Pixel está ativo
     */
    public static function isFacebookPixelEnabled(): bool
    {
        $config = self::getConfig();
        return $config['facebook_pixel']['enabled'] && !empty($config['facebook_pixel']['pixel_id']);
    }

    /**
     * Verificar se Google Tag Manager está ativo
     */
    public static function isGTMEnabled(): bool
    {
        $config = self::getConfig();
        return $config['gtm']['enabled'] && !empty($config['gtm']['container_id']);
    }

    /**
     * Verificar se Hotjar está ativo
     */
    public static function isHotjarEnabled(): bool
    {
        $config = self::getConfig();
        return $config['hotjar']['enabled'] && !empty($config['hotjar']['site_id']);
    }

    /**
     * Obter ID do Google Analytics
     */
    public static function getGoogleAnalyticsId(): string
    {
        $config = self::getConfig();
        return $config['google_analytics']['measurement_id'] ?? '';
    }

    /**
     * Obter ID do Facebook Pixel
     */
    public static function getFacebookPixelId(): string
    {
        $config = self::getConfig();
        return $config['facebook_pixel']['pixel_id'] ?? '';
    }

    /**
     * Obter ID do Google Tag Manager
     */
    public static function getGTMId(): string
    {
        $config = self::getConfig();
        return $config['gtm']['container_id'] ?? '';
    }

    /**
     * Obter ID do Hotjar
     */
    public static function getHotjarId(): string
    {
        $config = self::getConfig();
        return $config['hotjar']['site_id'] ?? '';
    }
}
