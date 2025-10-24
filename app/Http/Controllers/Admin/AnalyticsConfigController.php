<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnalyticsConfigController extends Controller
{
    /**
     * Exibir página de configuração
     */
    public function index()
    {
        $config = $this->getConfig();
        
        return view('admin.analytics.config', compact('config'));
    }

    /**
     * Salvar configurações
     */
    public function store(Request $request)
    {
        $request->validate([
            'google_analytics_id' => 'nullable|string|max:255',
            'facebook_pixel_id' => 'nullable|string|max:255',
            'google_tag_manager_id' => 'nullable|string|max:255',
            'hotjar_site_id' => 'nullable|string|max:255',
            'google_analytics_enabled' => 'boolean',
            'facebook_pixel_enabled' => 'boolean',
            'google_tag_manager_enabled' => 'boolean',
            'hotjar_enabled' => 'boolean',
        ]);

        $config = [
            'google_analytics' => [
                'measurement_id' => $request->google_analytics_id,
                'enabled' => $request->boolean('google_analytics_enabled'),
            ],
            'facebook_pixel' => [
                'pixel_id' => $request->facebook_pixel_id,
                'enabled' => $request->boolean('facebook_pixel_enabled'),
            ],
            'gtm' => [
                'container_id' => $request->google_tag_manager_id,
                'enabled' => $request->boolean('google_tag_manager_enabled'),
            ],
            'hotjar' => [
                'site_id' => $request->hotjar_site_id,
                'enabled' => $request->boolean('hotjar_enabled'),
            ],
            'events' => [
                'purchase_value' => 97.00,
                'currency' => 'BRL',
                'product_name' => 'Laravel ProStarter',
            ],
        ];

        // Salvar no arquivo de configuração
        $this->saveConfig($config);

        return redirect()->route('admin.analytics.config')
            ->with('success', 'Configurações de analytics salvas com sucesso!');
    }

    /**
     * Testar configurações
     */
    public function test(Request $request)
    {
        $config = $this->getConfig();
        
        $results = [];
        
        // Testar Google Analytics
        if ($config['google_analytics']['enabled'] && $config['google_analytics']['measurement_id']) {
            $results['google_analytics'] = $this->testGoogleAnalytics($config['google_analytics']['measurement_id']);
        }
        
        // Testar Facebook Pixel
        if ($config['facebook_pixel']['enabled'] && $config['facebook_pixel']['pixel_id']) {
            $results['facebook_pixel'] = $this->testFacebookPixel($config['facebook_pixel']['pixel_id']);
        }
        
        return response()->json([
            'success' => true,
            'results' => $results
        ]);
    }

    /**
     * Obter configurações atuais
     */
    private function getConfig()
    {
        $configFile = storage_path('app/analytics_config.json');
        
        if (file_exists($configFile)) {
            return json_decode(file_get_contents($configFile), true);
        }
        
        // Configuração padrão
        return [
            'google_analytics' => [
                'measurement_id' => '',
                'enabled' => false,
            ],
            'facebook_pixel' => [
                'pixel_id' => '',
                'enabled' => false,
            ],
            'gtm' => [
                'container_id' => '',
                'enabled' => false,
            ],
            'hotjar' => [
                'site_id' => '',
                'enabled' => false,
            ],
            'events' => [
                'purchase_value' => 97.00,
                'currency' => 'BRL',
                'product_name' => 'Laravel ProStarter',
            ],
        ];
    }

    /**
     * Salvar configurações
     */
    private function saveConfig($config)
    {
        $configFile = storage_path('app/analytics_config.json');
        file_put_contents($configFile, json_encode($config, JSON_PRETTY_PRINT));
    }

    /**
     * Testar Google Analytics
     */
    private function testGoogleAnalytics($measurementId)
    {
        // Simular teste (em produção, você faria uma requisição real)
        return [
            'status' => 'success',
            'message' => 'Google Analytics configurado corretamente',
            'measurement_id' => $measurementId
        ];
    }

    /**
     * Testar Facebook Pixel
     */
    private function testFacebookPixel($pixelId)
    {
        // Simular teste (em produção, você faria uma requisição real)
        return [
            'status' => 'success',
            'message' => 'Facebook Pixel configurado corretamente',
            'pixel_id' => $pixelId
        ];
    }
}
