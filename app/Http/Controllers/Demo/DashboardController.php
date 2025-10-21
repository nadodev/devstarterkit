<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use App\Services\DemoDataService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Dados reais do sistema demo
        $users = DemoDataService::getUsers();
        $clients = DemoDataService::getClients();
        $projects = DemoDataService::getProjects();
        
        $stats = [
            'users' => $users->count(),
            'clients' => $clients->count(),
            'projects' => $projects->count(),
            'revenue' => $projects->sum('budget')
        ];

        $recentActivities = [
            [
                'id' => 1,
                'type' => 'user_registered',
                'message' => 'Novo usuário cadastrado: Maria Silva',
                'time' => '2 minutos atrás',
                'icon' => 'fas fa-user-plus',
                'color' => 'text-green-500'
            ],
            [
                'id' => 2,
                'type' => 'project_created',
                'message' => 'Projeto "Sistema de Vendas" criado',
                'time' => '15 minutos atrás',
                'icon' => 'fas fa-project-diagram',
                'color' => 'text-blue-500'
            ],
            [
                'id' => 3,
                'type' => 'client_updated',
                'message' => 'Cliente "TechCorp" atualizado',
                'time' => '1 hora atrás',
                'icon' => 'fas fa-edit',
                'color' => 'text-yellow-500'
            ],
            [
                'id' => 4,
                'type' => 'payment_received',
                'message' => 'Pagamento de R$ 2.500 recebido',
                'time' => '2 horas atrás',
                'icon' => 'fas fa-dollar-sign',
                'color' => 'text-green-500'
            ],
            [
                'id' => 5,
                'type' => 'system_alert',
                'message' => 'Backup automático realizado',
                'time' => '3 horas atrás',
                'icon' => 'fas fa-shield-alt',
                'color' => 'text-purple-500'
            ]
        ];

        $chartData = [
            'labels' => ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
            'users' => [120, 150, 180, 200, 220, 250],
            'revenue' => [15000, 18000, 22000, 25000, 28000, 32000]
        ];

        return view('demo.dashboard.index', compact('stats', 'recentActivities', 'chartData'));
    }
}
