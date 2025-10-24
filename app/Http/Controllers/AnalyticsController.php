<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\CookieHelper;

class AnalyticsController extends Controller
{
    /**
     * Dashboard de Analytics
     */
    public function dashboard()
    {
        // Verificar se o usuário tem consentimento para analytics
        if (!CookieHelper::analyticsAccepted()) {
            return redirect()->route('conversion')->with('error', 'Consentimento para analytics necessário.');
        }

        $data = [
            'title' => 'Dashboard de Analytics - Laravel ProStarter',
            'analytics_enabled' => CookieHelper::analyticsAccepted(),
            'marketing_enabled' => CookieHelper::marketingAccepted(),
        ];

        return view('admin.analytics.dashboard', $data);
    }

    /**
     * API para dados de analytics
     */
    public function api(Request $request)
    {
        // Verificar consentimento
        if (!CookieHelper::analyticsAccepted()) {
            return response()->json(['error' => 'Consentimento necessário'], 403);
        }

        $type = $request->get('type', 'overview');

        switch ($type) {
            case 'overview':
                return $this->getOverviewData();
            case 'conversions':
                return $this->getConversionData();
            case 'traffic':
                return $this->getTrafficData();
            default:
                return response()->json(['error' => 'Tipo inválido'], 400);
        }
    }

    /**
     * Dados gerais do dashboard
     */
    private function getOverviewData()
    {
        return response()->json([
            'success' => true,
            'data' => [
                'total_visitors' => $this->getTotalVisitors(),
                'conversion_rate' => $this->getConversionRate(),
                'avg_time_on_page' => $this->getAvgTimeOnPage(),
                'bounce_rate' => $this->getBounceRate(),
                'top_pages' => $this->getTopPages(),
                'traffic_sources' => $this->getTrafficSources(),
            ]
        ]);
    }

    /**
     * Dados de conversão
     */
    private function getConversionData()
    {
        return response()->json([
            'success' => true,
            'data' => [
                'total_conversions' => $this->getTotalConversions(),
                'conversion_funnel' => $this->getConversionFunnel(),
                'revenue' => $this->getRevenue(),
                'cost_per_acquisition' => $this->getCostPerAcquisition(),
            ]
        ]);
    }

    /**
     * Dados de tráfego
     */
    private function getTrafficData()
    {
        return response()->json([
            'success' => true,
            'data' => [
                'page_views' => $this->getPageViews(),
                'unique_visitors' => $this->getUniqueVisitors(),
                'sessions' => $this->getSessions(),
                'new_vs_returning' => $this->getNewVsReturning(),
            ]
        ]);
    }

    // Métodos auxiliares (simulados - em produção, conectar com APIs reais)
    private function getTotalVisitors()
    {
        // Em produção, conectar com Google Analytics API
        return rand(1000, 5000);
    }

    private function getConversionRate()
    {
        return rand(2, 8) / 100; // 2-8%
    }

    private function getAvgTimeOnPage()
    {
        return rand(120, 300); // 2-5 minutos
    }

    private function getBounceRate()
    {
        return rand(30, 70) / 100; // 30-70%
    }

    private function getTopPages()
    {
        return [
            ['page' => '/conversion', 'views' => rand(500, 2000)],
            ['page' => '/suporte', 'views' => rand(100, 500)],
            ['page' => '/politica', 'views' => rand(50, 200)],
        ];
    }

    private function getTrafficSources()
    {
        return [
            ['source' => 'Google', 'percentage' => rand(40, 60)],
            ['source' => 'Facebook', 'percentage' => rand(20, 40)],
            ['source' => 'Direct', 'percentage' => rand(10, 30)],
        ];
    }

    private function getTotalConversions()
    {
        return rand(50, 200);
    }

    private function getConversionFunnel()
    {
        return [
            ['stage' => 'Visitors', 'count' => rand(1000, 5000)],
            ['stage' => 'Interested', 'count' => rand(200, 800)],
            ['stage' => 'Leads', 'count' => rand(50, 200)],
            ['stage' => 'Customers', 'count' => rand(10, 50)],
        ];
    }

    private function getRevenue()
    {
        return rand(5000, 20000); // R$ 5.000 - R$ 20.000
    }

    private function getCostPerAcquisition()
    {
        return rand(50, 200); // R$ 50 - R$ 200
    }

    private function getPageViews()
    {
        return rand(2000, 10000);
    }

    private function getUniqueVisitors()
    {
        return rand(800, 3000);
    }

    private function getSessions()
    {
        return rand(1000, 4000);
    }

    private function getNewVsReturning()
    {
        return [
            ['type' => 'New', 'percentage' => rand(60, 80)],
            ['type' => 'Returning', 'percentage' => rand(20, 40)],
        ];
    }
}
