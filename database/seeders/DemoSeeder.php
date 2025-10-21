<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpar dados existentes
        $this->clearDemoData();
        
        // Popular dados demo
        $this->seedUsers();
        $this->seedClients();
        $this->seedProjects();
        $this->seedLeads();
        $this->seedProducts();
        $this->seedTasks();
        
        // Demo data seeded successfully!
    }
    
    private function clearDemoData()
    {
        // Limpar tabelas relacionadas primeiro
        DB::table('leads')->truncate();
        DB::table('products')->truncate();
        DB::table('tasks')->truncate();
        DB::table('users')->where('email', 'like', '%@demo.com')->delete();
        DB::table('users')->where('email', 'like', '%@techcorp.com')->delete();
        DB::table('users')->where('email', 'like', '%@startupxyz.com')->delete();
        DB::table('users')->where('email', 'like', '%@empresaabc.com')->delete();
        DB::table('users')->where('email', 'like', '%@digitalsolutions.com')->delete();
    }
    
    private function seedUsers()
    {
        $users = [
            [
                'name' => 'Admin Demo',
                'email' => 'admin@demo.com',
                'password' => bcrypt('password'),
                'role' => 'admin',
                'status' => 'active',
                'email_verified_at' => now(),
                'created_at' => now()->subDays(30),
                'updated_at' => now()->subDays(5)
            ],
            [
                'name' => 'João Silva',
                'email' => 'joao@demo.com',
                'password' => bcrypt('password'),
                'role' => 'moderator',
                'status' => 'active',
                'email_verified_at' => now(),
                'created_at' => now()->subDays(25),
                'updated_at' => now()->subDays(2)
            ],
            [
                'name' => 'Maria Santos',
                'email' => 'maria@demo.com',
                'password' => bcrypt('password'),
                'role' => 'user',
                'status' => 'active',
                'email_verified_at' => now(),
                'created_at' => now()->subDays(20),
                'updated_at' => now()->subDays(1)
            ],
            [
                'name' => 'Pedro Costa',
                'email' => 'pedro@demo.com',
                'password' => bcrypt('password'),
                'role' => 'user',
                'status' => 'inactive',
                'email_verified_at' => now(),
                'created_at' => now()->subDays(15),
                'updated_at' => now()->subDays(10)
            ],
            [
                'name' => 'Ana Oliveira',
                'email' => 'ana@demo.com',
                'password' => bcrypt('password'),
                'role' => 'user',
                'status' => 'active',
                'email_verified_at' => now(),
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(3)
            ]
        ];
        
        DB::table('users')->insert($users);
    }
    
    private function seedClients()
    {
        // Criar clientes como usuários com role 'client'
        $clients = [
            [
                'name' => 'TechCorp Ltda',
                'email' => 'contato@techcorp.com',
                'password' => bcrypt('password'),
                'role' => 'client',
                'status' => 'active',
                'phone' => '(11) 99999-9999',
                'company' => 'TechCorp Ltda',
                'email_verified_at' => now(),
                'created_at' => now()->subDays(45),
                'updated_at' => now()->subDays(10)
            ],
            [
                'name' => 'StartupXYZ',
                'email' => 'admin@startupxyz.com',
                'password' => bcrypt('password'),
                'role' => 'client',
                'status' => 'active',
                'phone' => '(11) 88888-8888',
                'company' => 'StartupXYZ',
                'email_verified_at' => now(),
                'created_at' => now()->subDays(30),
                'updated_at' => now()->subDays(5)
            ],
            [
                'name' => 'Empresa ABC',
                'email' => 'contato@empresaabc.com',
                'password' => bcrypt('password'),
                'role' => 'client',
                'status' => 'active',
                'phone' => '(11) 77777-7777',
                'company' => 'Empresa ABC',
                'email_verified_at' => now(),
                'created_at' => now()->subDays(20),
                'updated_at' => now()->subDays(2)
            ],
            [
                'name' => 'Digital Solutions',
                'email' => 'info@digitalsolutions.com',
                'password' => bcrypt('password'),
                'role' => 'client',
                'status' => 'inactive',
                'phone' => '(11) 66666-6666',
                'company' => 'Digital Solutions',
                'email_verified_at' => now(),
                'created_at' => now()->subDays(15),
                'updated_at' => now()->subDays(8)
            ]
        ];
        
        DB::table('users')->insert($clients);
    }
    
    private function seedProjects()
    {
        // Projetos serão simulados via sessão no DemoDataService
        // Aqui podemos criar dados relacionados se necessário
    }
    
    private function seedLeads()
    {
        $leads = [
            [
                'name' => 'Carlos Mendes',
                'email' => 'carlos@exemplo.com',
                'whatsapp' => '(11) 99999-1111',
                'ip_address' => '192.168.1.100',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                'email_sent' => true,
                'email_sent_at' => now()->subHours(2),
                'created_at' => now()->subHours(3),
                'updated_at' => now()->subHours(2)
            ],
            [
                'name' => 'Fernanda Lima',
                'email' => 'fernanda@exemplo.com',
                'whatsapp' => '(11) 88888-2222',
                'ip_address' => '192.168.1.101',
                'user_agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36',
                'email_sent' => true,
                'email_sent_at' => now()->subHours(5),
                'created_at' => now()->subHours(6),
                'updated_at' => now()->subHours(5)
            ],
            [
                'name' => 'Roberto Silva',
                'email' => 'roberto@exemplo.com',
                'whatsapp' => '(11) 77777-3333',
                'ip_address' => '192.168.1.102',
                'user_agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36',
                'email_sent' => false,
                'email_sent_at' => null,
                'created_at' => now()->subHours(1),
                'updated_at' => now()->subHours(1)
            ],
            [
                'name' => 'Patricia Costa',
                'email' => 'patricia@exemplo.com',
                'whatsapp' => '(11) 66666-4444',
                'ip_address' => '192.168.1.103',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                'email_sent' => true,
                'email_sent_at' => now()->subDays(1),
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1)
            ],
            [
                'name' => 'Marcos Oliveira',
                'email' => 'marcos@exemplo.com',
                'whatsapp' => '(11) 55555-5555',
                'ip_address' => '192.168.1.104',
                'user_agent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X) AppleWebKit/605.1.15',
                'email_sent' => false,
                'email_sent_at' => null,
                'created_at' => now()->subMinutes(30),
                'updated_at' => now()->subMinutes(30)
            ]
        ];
        
        DB::table('leads')->insert($leads);
    }
    
    private function seedProducts()
    {
        $products = [
            [
                'name' => 'DevStarter Kit - Básico',
                'slug' => 'devstarter-kit-basico',
                'short_description' => 'Sistema completo para desenvolvimento web com Laravel + Vue',
                'description' => 'O DevStarter Kit Básico inclui todas as funcionalidades essenciais para começar seu projeto web profissional. Inclui autenticação, dashboard, CRUD básico e muito mais.',
                'price' => 197.00,
                'image' => 'products/devstarter-basico.jpg',
                'features' => json_encode([
                    'Autenticação completa',
                    'Dashboard responsivo',
                    'CRUD básico',
                    'Sistema de usuários',
                    'Layout moderno'
                ]),
                'benefits' => json_encode([
                    'Economize 40+ horas de desenvolvimento',
                    'Código limpo e documentado',
                    'Suporte por 30 dias',
                    'Atualizações gratuitas'
                ]),
                'is_active' => true,
                'created_at' => now()->subDays(30),
                'updated_at' => now()->subDays(5)
            ],
            [
                'name' => 'DevStarter Kit - Pro',
                'slug' => 'devstarter-kit-pro',
                'short_description' => 'Versão avançada com funcionalidades premium',
                'description' => 'O DevStarter Kit Pro inclui todas as funcionalidades do básico, mais recursos avançados como sistema de pagamentos, relatórios, API REST e muito mais.',
                'price' => 497.00,
                'image' => 'products/devstarter-pro.jpg',
                'features' => json_encode([
                    'Tudo do Kit Básico',
                    'Sistema de pagamentos',
                    'Relatórios avançados',
                    'API REST completa',
                    'Sistema de notificações',
                    'Backup automático'
                ]),
                'benefits' => json_encode([
                    'Economize 80+ horas de desenvolvimento',
                    'Funcionalidades premium',
                    'Suporte prioritário',
                    'Consultoria incluída',
                    'Código fonte completo'
                ]),
                'is_active' => true,
                'created_at' => now()->subDays(25),
                'updated_at' => now()->subDays(3)
            ],
            [
                'name' => 'DevStarter Kit - Enterprise',
                'slug' => 'devstarter-kit-enterprise',
                'short_description' => 'Solução completa para grandes projetos',
                'description' => 'O DevStarter Kit Enterprise é a solução mais completa, ideal para grandes projetos e empresas. Inclui todas as funcionalidades, mais recursos empresariais.',
                'price' => 997.00,
                'image' => 'products/devstarter-enterprise.jpg',
                'features' => json_encode([
                    'Tudo do Kit Pro',
                    'Multi-tenancy',
                    'Sistema de permissões avançado',
                    'Integração com APIs externas',
                    'Monitoramento em tempo real',
                    'Deploy automatizado'
                ]),
                'benefits' => json_encode([
                    'Economize 120+ horas de desenvolvimento',
                    'Solução empresarial completa',
                    'Suporte 24/7',
                    'Consultoria personalizada',
                    'Treinamento da equipe'
                ]),
                'is_active' => true,
                'created_at' => now()->subDays(20),
                'updated_at' => now()->subDays(1)
            ]
        ];
        
        DB::table('products')->insert($products);
    }
    
    private function seedTasks()
    {
        // Buscar IDs dos usuários e projetos
        $adminId = DB::table('users')->where('email', 'admin@demo.com')->first()->id;
        $joaoId = DB::table('users')->where('email', 'joao@demo.com')->first()->id;
        $mariaId = DB::table('users')->where('email', 'maria@demo.com')->first()->id;
        $techCorpId = DB::table('users')->where('email', 'contato@techcorp.com')->first()->id;
        $startupId = DB::table('users')->where('email', 'admin@startupxyz.com')->first()->id;
        
        $tasks = [
            [
                'title' => 'Configurar ambiente de desenvolvimento',
                'description' => 'Instalar e configurar todas as ferramentas necessárias para o desenvolvimento do projeto.',
                'status' => 'completed',
                'priority' => 'high',
                'due_date' => now()->subDays(5)->format('Y-m-d'),
                'project_id' => $techCorpId,
                'assigned_to' => $joaoId,
                'created_by' => $adminId,
                'notes' => 'Ambiente configurado com sucesso. Todas as dependências instaladas.',
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(5)
            ],
            [
                'title' => 'Criar wireframes do sistema',
                'description' => 'Desenvolver wireframes detalhados para todas as telas do sistema.',
                'status' => 'in_progress',
                'priority' => 'medium',
                'due_date' => now()->addDays(3)->format('Y-m-d'),
                'project_id' => $techCorpId,
                'assigned_to' => $mariaId,
                'created_by' => $adminId,
                'notes' => 'Wireframes principais já criados. Falta finalizar as telas de relatórios.',
                'created_at' => now()->subDays(7),
                'updated_at' => now()->subDays(1)
            ],
            [
                'title' => 'Implementar autenticação',
                'description' => 'Desenvolver sistema de login e registro de usuários.',
                'status' => 'pending',
                'priority' => 'high',
                'due_date' => now()->addDays(7)->format('Y-m-d'),
                'project_id' => $startupId,
                'assigned_to' => $joaoId,
                'created_by' => $adminId,
                'notes' => 'Aguardando aprovação dos wireframes para iniciar.',
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3)
            ],
            [
                'title' => 'Configurar banco de dados',
                'description' => 'Criar estrutura do banco de dados e configurar conexões.',
                'status' => 'completed',
                'priority' => 'urgent',
                'due_date' => now()->subDays(8)->format('Y-m-d'),
                'project_id' => $techCorpId,
                'assigned_to' => $adminId,
                'created_by' => $adminId,
                'notes' => 'Banco configurado com todas as tabelas necessárias.',
                'created_at' => now()->subDays(12),
                'updated_at' => now()->subDays(8)
            ],
            [
                'title' => 'Revisar documentação',
                'description' => 'Revisar e atualizar toda a documentação do projeto.',
                'status' => 'pending',
                'priority' => 'low',
                'due_date' => now()->addDays(10)->format('Y-m-d'),
                'project_id' => $startupId,
                'assigned_to' => $mariaId,
                'created_by' => $adminId,
                'notes' => 'Documentação será revisada após conclusão das funcionalidades principais.',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2)
            ],
            [
                'title' => 'Testes de integração',
                'description' => 'Executar testes de integração em todo o sistema.',
                'status' => 'pending',
                'priority' => 'medium',
                'due_date' => now()->addDays(5)->format('Y-m-d'),
                'project_id' => $techCorpId,
                'assigned_to' => $joaoId,
                'created_by' => $adminId,
                'notes' => 'Aguardando conclusão das funcionalidades principais.',
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1)
            ]
        ];
        
        DB::table('tasks')->insert($tasks);
    }
}
