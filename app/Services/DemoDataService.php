<?php

namespace App\Services;

class DemoDataService
{
    public static function getUsers()
    {
        // Tentar buscar usuários demo do banco primeiro
        $dbUsers = \App\Models\User::where('email', 'like', '%@demo.com')
                                  ->orWhere('role', 'client')
                                  ->get()
                                  ->map(function ($user) {
                                      return [
                                          'id' => $user->id,
                                          'name' => $user->name,
                                          'email' => $user->email,
                                          'role' => $user->role,
                                          'status' => $user->status ?? 'active',
                                          'avatar' => "https://ui-avatars.com/api/?name=" . urlencode($user->name) . "&background=3B82F6&color=fff",
                                          'created_at' => $user->created_at->toISOString(),
                                          'updated_at' => $user->updated_at->toISOString()
                                      ];
                                  });
        
        if ($dbUsers->isNotEmpty()) {
            return $dbUsers;
        }
        
        // Fallback para dados da sessão
        $users = session('demo_users', []);
        
        if (empty($users)) {
            $users = self::getDefaultUsers();
            session(['demo_users' => $users]);
        }
        
        return collect($users);
    }
    
    public static function getClients()
    {
        $clients = session('demo_clients', []);
        
        if (empty($clients)) {
            $clients = self::getDefaultClients();
            session(['demo_clients' => $clients]);
        }
        
        return collect($clients);
    }
    
    public static function getProjects()
    {
        $projects = session('demo_projects', []);
        
        if (empty($projects)) {
            $projects = self::getDefaultProjects();
            session(['demo_projects' => $projects]);
        }
        
        return collect($projects);
    }
    
    public static function addUser($data)
    {
        $users = self::getUsers();
        $newId = $users->max('id') + 1;
        
        $user = [
            'id' => $newId,
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'status' => $data['status'],
            'avatar' => "https://ui-avatars.com/api/?name=" . urlencode($data['name']) . "&background=3B82F6&color=fff",
            'created_at' => now()->toISOString(),
            'updated_at' => now()->toISOString()
        ];
        
        $users->push($user);
        session(['demo_users' => $users->toArray()]);
        
        return $user;
    }
    
    public static function updateUser($id, $data)
    {
        $users = self::getUsers();
        $userIndex = $users->search(function ($user) use ($id) {
            return $user['id'] == $id;
        });
        
        if ($userIndex !== false) {
            $user = $users[$userIndex];
            $user['name'] = $data['name'];
            $user['email'] = $data['email'];
            $user['role'] = $data['role'];
            $user['status'] = $data['status'];
            $user['updated_at'] = now()->toISOString();
            
            $usersArray = $users->toArray();
            $usersArray[$userIndex] = $user;
            session(['demo_users' => $usersArray]);
            
            return $user;
        }
        
        return null;
    }
    
    public static function deleteUser($id)
    {
        $users = self::getUsers();
        $users = $users->reject(function ($user) use ($id) {
            return $user['id'] == $id;
        });
        
        session(['demo_users' => $users->toArray()]);
        return true;
    }
    
    public static function addClient($data)
    {
        $clients = self::getClients();
        $newId = $clients->max('id') + 1;
        
        $client = [
            'id' => $newId,
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'company' => $data['company'],
            'status' => $data['status'],
            'notes' => $data['notes'] ?? '',
            'projects_count' => 0,
            'created_at' => now()->toISOString(),
            'updated_at' => now()->toISOString()
        ];
        
        $clients->push($client);
        session(['demo_clients' => $clients->toArray()]);
        
        return $client;
    }
    
    public static function updateClient($id, $data)
    {
        $clients = self::getClients();
        $clientIndex = $clients->search(function ($client) use ($id) {
            return $client['id'] == $id;
        });
        
        if ($clientIndex !== false) {
            $client = $clients[$clientIndex];
            $client['name'] = $data['name'];
            $client['email'] = $data['email'];
            $client['phone'] = $data['phone'];
            $client['company'] = $data['company'];
            $client['status'] = $data['status'];
            $client['notes'] = $data['notes'] ?? '';
            $client['updated_at'] = now()->toISOString();
            
            $clientsArray = $clients->toArray();
            $clientsArray[$clientIndex] = $client;
            session(['demo_clients' => $clientsArray]);
            
            return $client;
        }
        
        return null;
    }
    
    public static function deleteClient($id)
    {
        $clients = self::getClients();
        $clients = $clients->reject(function ($client) use ($id) {
            return $client['id'] == $id;
        });
        
        session(['demo_clients' => $clients->toArray()]);
        return true;
    }
    
    public static function addProject($data)
    {
        $projects = self::getProjects();
        $newId = $projects->max('id') + 1;
        
        $project = [
            'id' => $newId,
            'name' => $data['name'],
            'client' => $data['client'],
            'description' => $data['description'],
            'budget' => $data['budget'],
            'status' => $data['status'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'progress' => $data['progress'] ?? 0,
            'created_at' => now()->toISOString(),
            'updated_at' => now()->toISOString()
        ];
        
        $projects->push($project);
        session(['demo_projects' => $projects->toArray()]);
        
        return $project;
    }
    
    public static function updateProject($id, $data)
    {
        $projects = self::getProjects();
        $projectIndex = $projects->search(function ($project) use ($id) {
            return $project['id'] == $id;
        });
        
        if ($projectIndex !== false) {
            $project = $projects[$projectIndex];
            $project['name'] = $data['name'];
            $project['client'] = $data['client'];
            $project['description'] = $data['description'];
            $project['budget'] = $data['budget'];
            $project['status'] = $data['status'];
            $project['start_date'] = $data['start_date'];
            $project['end_date'] = $data['end_date'];
            $project['progress'] = $data['progress'] ?? 0;
            $project['updated_at'] = now()->toISOString();
            
            $projectsArray = $projects->toArray();
            $projectsArray[$projectIndex] = $project;
            session(['demo_projects' => $projectsArray]);
            
            return $project;
        }
        
        return null;
    }
    
    public static function deleteProject($id)
    {
        $projects = self::getProjects();
        $projects = $projects->reject(function ($project) use ($id) {
            return $project['id'] == $id;
        });
        
        session(['demo_projects' => $projects->toArray()]);
        return true;
    }
    
    private static function getDefaultUsers()
    {
        return [
            [
                'id' => 1,
                'name' => 'João Silva',
                'email' => 'joao@exemplo.com',
                'role' => 'admin',
                'status' => 'active',
                'avatar' => 'https://ui-avatars.com/api/?name=João+Silva&background=3B82F6&color=fff',
                'created_at' => now()->subDays(30)->toISOString(),
                'updated_at' => now()->subDays(5)->toISOString()
            ],
            [
                'id' => 2,
                'name' => 'Maria Santos',
                'email' => 'maria@exemplo.com',
                'role' => 'moderator',
                'status' => 'active',
                'avatar' => 'https://ui-avatars.com/api/?name=Maria+Santos&background=10B981&color=fff',
                'created_at' => now()->subDays(25)->toISOString(),
                'updated_at' => now()->subDays(2)->toISOString()
            ],
            [
                'id' => 3,
                'name' => 'Pedro Costa',
                'email' => 'pedro@exemplo.com',
                'role' => 'user',
                'status' => 'inactive',
                'avatar' => 'https://ui-avatars.com/api/?name=Pedro+Costa&background=8B5CF6&color=fff',
                'created_at' => now()->subDays(20)->toISOString(),
                'updated_at' => now()->subDays(10)->toISOString()
            ]
        ];
    }
    
    private static function getDefaultClients()
    {
        return [
            [
                'id' => 1,
                'name' => 'TechCorp Ltda',
                'email' => 'contato@techcorp.com',
                'phone' => '(11) 99999-9999',
                'company' => 'TechCorp Ltda',
                'status' => 'active',
                'notes' => 'Cliente premium com projetos de grande porte',
                'projects_count' => 3,
                'created_at' => now()->subDays(45)->toISOString(),
                'updated_at' => now()->subDays(10)->toISOString()
            ],
            [
                'id' => 2,
                'name' => 'StartupXYZ',
                'email' => 'admin@startupxyz.com',
                'phone' => '(11) 88888-8888',
                'company' => 'StartupXYZ',
                'status' => 'active',
                'notes' => 'Startup em crescimento',
                'projects_count' => 1,
                'created_at' => now()->subDays(30)->toISOString(),
                'updated_at' => now()->subDays(5)->toISOString()
            ]
        ];
    }
    
    private static function getDefaultProjects()
    {
        return [
            [
                'id' => 1,
                'name' => 'Sistema de Vendas',
                'client' => 'TechCorp Ltda',
                'description' => 'Sistema completo para gestão de vendas e estoque',
                'budget' => 25000.00,
                'status' => 'active',
                'start_date' => now()->subDays(30)->format('Y-m-d'),
                'end_date' => now()->addDays(30)->format('Y-m-d'),
                'progress' => 75,
                'created_at' => now()->subDays(30)->toISOString(),
                'updated_at' => now()->subDays(2)->toISOString()
            ],
            [
                'id' => 2,
                'name' => 'E-commerce Platform',
                'client' => 'StartupXYZ',
                'description' => 'Plataforma de e-commerce com integração de pagamentos',
                'budget' => 45000.00,
                'status' => 'completed',
                'start_date' => now()->subDays(60)->format('Y-m-d'),
                'end_date' => now()->subDays(10)->format('Y-m-d'),
                'progress' => 100,
                'created_at' => now()->subDays(60)->toISOString(),
                'updated_at' => now()->subDays(10)->toISOString()
            ]
        ];
    }
}
