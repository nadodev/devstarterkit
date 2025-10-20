<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'DevStarter Kit - Pacote Completo',
                'slug' => 'devstarter-kit-pacote-completo',
                'description' => 'O kit completo para desenvolvedores iniciantes que querem acelerar sua carreira. Inclui templates, componentes, documentação e muito mais.',
                'short_description' => 'Kit completo para desenvolvedores iniciantes',
                'price' => 197.00,
                'discount_price' => 97.00,
                'type' => 'product',
                'category' => 'Desenvolvimento',
                'features' => [
                    'Templates HTML/CSS prontos',
                    'Componentes JavaScript reutilizáveis',
                    'Documentação completa',
                    'Suporte por 6 meses',
                    'Atualizações gratuitas'
                ],
                'benefits' => [
                    'Economize 80% do tempo de desenvolvimento',
                    'Projetos profissionais desde o primeiro dia',
                    'Aprenda as melhores práticas',
                    'Suporte da comunidade',
                    'Certificado de conclusão'
                ],
                'is_active' => true,
                'is_featured' => true,
                'sort_order' => 1,
                'button_text' => 'Comprar Agora',
                'button_url' => 'https://pay.hotmart.com/devstarter-kit'
            ],
            [
                'name' => 'Curso de React Avançado',
                'slug' => 'curso-react-avancado',
                'description' => 'Aprenda React do zero ao avançado com projetos reais. Hooks, Context API, Redux, testes e muito mais.',
                'short_description' => 'Curso completo de React com projetos práticos',
                'price' => 297.00,
                'discount_price' => 197.00,
                'type' => 'service',
                'category' => 'Cursos',
                'features' => [
                    '40+ horas de conteúdo',
                    'Projetos práticos',
                    'Certificado de conclusão',
                    'Suporte no Discord',
                    'Acesso vitalício'
                ],
                'benefits' => [
                    'Domine React em 30 dias',
                    'Portfolio profissional',
                    'Preparação para entrevistas',
                    'Comunidade ativa',
                    'Mentoria individual'
                ],
                'is_active' => true,
                'is_featured' => true,
                'sort_order' => 2,
                'button_text' => 'Inscrever-se',
                'button_url' => 'https://pay.hotmart.com/react-avancado'
            ],
            [
                'name' => 'Consultoria em Desenvolvimento',
                'slug' => 'consultoria-desenvolvimento',
                'description' => 'Consultoria personalizada para seu projeto. Análise de código, arquitetura, performance e melhores práticas.',
                'short_description' => 'Consultoria técnica personalizada',
                'price' => 500.00,
                'type' => 'service',
                'category' => 'Consultoria',
                'features' => [
                    'Análise completa do projeto',
                    'Relatório detalhado',
                    'Recomendações práticas',
                    'Sessão de mentoria',
                    'Suporte por 30 dias'
                ],
                'benefits' => [
                    'Identifique gargalos no código',
                    'Melhore a performance',
                    'Aprenda boas práticas',
                    'Reduza bugs e erros',
                    'Escalabilidade garantida'
                ],
                'is_active' => true,
                'is_featured' => false,
                'sort_order' => 3,
                'button_text' => 'Agendar Consultoria',
                'button_url' => 'https://calendly.com/consultoria-dev'
            ],
            [
                'name' => 'Template E-commerce Premium',
                'slug' => 'template-ecommerce-premium',
                'description' => 'Template completo de e-commerce com React, Node.js e MongoDB. Inclui painel administrativo, pagamentos e muito mais.',
                'short_description' => 'Template completo de e-commerce',
                'price' => 397.00,
                'discount_price' => 297.00,
                'type' => 'product',
                'category' => 'Templates',
                'features' => [
                    'Frontend em React',
                    'Backend em Node.js',
                    'Banco MongoDB',
                    'Sistema de pagamento',
                    'Painel administrativo'
                ],
                'benefits' => [
                    'Economize meses de desenvolvimento',
                    'Código limpo e documentado',
                    'Fácil customização',
                    'Suporte técnico',
                    'Licença comercial'
                ],
                'is_active' => true,
                'is_featured' => true,
                'sort_order' => 4,
                'button_text' => 'Baixar Template',
                'button_url' => 'https://gumroad.com/template-ecommerce'
            ],
            [
                'name' => 'Mentoria Individual',
                'slug' => 'mentoria-individual',
                'description' => 'Sessões de mentoria 1:1 para acelerar sua carreira em desenvolvimento. Foco em seus objetivos específicos.',
                'short_description' => 'Mentoria personalizada para sua carreira',
                'price' => 150.00,
                'type' => 'service',
                'category' => 'Mentoria',
                'features' => [
                    'Sessão de 1 hora',
                    'Análise de perfil',
                    'Plano de carreira',
                    'Revisão de portfolio',
                    'Networking estratégico'
                ],
                'benefits' => [
                    'Clareza sobre seus objetivos',
                    'Plano de ação personalizado',
                    'Feedback profissional',
                    'Conexões valiosas',
                    'Acelere sua carreira'
                ],
                'is_active' => true,
                'is_featured' => false,
                'sort_order' => 5,
                'button_text' => 'Agendar Mentoria',
                'button_url' => 'https://calendly.com/mentoria-dev'
            ],
            [
                'name' => 'Sistema de Gestão Completo',
                'slug' => 'sistema-gestao-completo',
                'description' => 'Sistema completo de gestão empresarial com Laravel. CRM, vendas, estoque, relatórios e muito mais.',
                'short_description' => 'Sistema completo de gestão empresarial',
                'price' => 997.00,
                'discount_price' => 697.00,
                'type' => 'product',
                'category' => 'Sistemas',
                'features' => [
                    'CRM completo',
                    'Gestão de vendas',
                    'Controle de estoque',
                    'Relatórios avançados',
                    'Multi-usuário'
                ],
                'benefits' => [
                    'Automatize processos',
                    'Reduza custos operacionais',
                    'Aumente produtividade',
                    'Controle total do negócio',
                    'ROI garantido'
                ],
                'is_active' => true,
                'is_featured' => true,
                'sort_order' => 6,
                'button_text' => 'Solicitar Demo',
                'button_url' => 'https://demo.sistema-gestao.com'
            ]
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}