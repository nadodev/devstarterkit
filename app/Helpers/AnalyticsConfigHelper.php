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
            $config = json_decode(file_get_contents($configFile), true);
            if ($config) {
                return $config;
            }
        }
        
        // Se não conseguir ler o arquivo, criar com configurações padrão
        $defaultConfig = [
            'google_analytics' => [
                'measurement_id' => 'G-5WZ2TZP14V',
                'enabled' => true,
            ],
            'facebook_pixel' => [
                'pixel_id' => '',
                'enabled' => false,
            ],
            'gtm' => [
                'container_id' => 'GTM-ND7QC9VT',
                'enabled' => true,
            ],
            'hotjar' => [
                'site_id' => '2600022',
                'enabled' => true,
            ],
            'events' => [
                'purchase_value' => 97.00,
                'currency' => 'BRL',
                'product_name' => 'Laravel ProStarter',
            ],
        ];
        
        // Salvar configuração padrão
        file_put_contents($configFile, json_encode($defaultConfig, JSON_PRETTY_PRINT));
        
        return $defaultConfig;
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
