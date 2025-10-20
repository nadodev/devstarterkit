<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdditionalCoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buscar categorias
        $programmingCategory = \App\Models\Category::where('slug', 'programacao')->first();
        $designCategory = \App\Models\Category::where('slug', 'design')->first();
        $marketingCategory = \App\Models\Category::where('slug', 'marketing')->first();
        $businessCategory = \App\Models\Category::where('slug', 'negocios')->first();
        
        // Buscar instrutor
        $instructor = \App\Models\User::where('email', 'joao@example.com')->first();
        
        if (!$instructor) {
            $this->command->error('Instrutor não encontrado. Execute primeiro o DatabaseSeeder.');
            return;
        }

        // Curso 1: Laravel do Zero
        $course1 = \App\Models\Course::create([
            'title' => 'Laravel do Zero ao Profissional',
            'slug' => 'laravel-do-zero-ao-profissional',
            'description' => 'Aprenda Laravel desde o básico até conceitos avançados. Construa aplicações web robustas e escaláveis com o framework PHP mais popular do mundo.',
            'short_description' => 'Domine Laravel desde o básico até conceitos avançados.',
            'level' => 'beginner',
            'price' => 199.90,
            'is_free' => false,
            'is_published' => true,
            'is_featured' => true,
            'duration_hours' => 40,
            'rating' => 4.9,
            'students_count' => 1250,
            'tags' => ['laravel', 'php', 'web', 'backend', 'api'],
            'requirements' => 'Conhecimento básico em PHP e HTML.',
            'what_you_will_learn' => "• Fundamentos do Laravel\n• Eloquent ORM\n• Autenticação e autorização\n• APIs RESTful\n• Testes automatizados\n• Deploy em produção",
            'user_id' => $instructor->id,
            'category_id' => $programmingCategory->id,
        ]);

        // Curso 2: Design UX/UI
        $course2 = \App\Models\Course::create([
            'title' => 'Design UX/UI Completo',
            'slug' => 'design-ux-ui-completo',
            'description' => 'Aprenda a criar interfaces incríveis e experiências de usuário excepcionais. Do conceito ao protótipo final.',
            'short_description' => 'Crie interfaces incríveis e experiências de usuário excepcionais.',
            'level' => 'intermediate',
            'price' => 149.90,
            'is_free' => false,
            'is_published' => true,
            'is_featured' => false,
            'duration_hours' => 30,
            'rating' => 4.7,
            'students_count' => 890,
            'tags' => ['design', 'ux', 'ui', 'figma', 'prototipacao'],
            'requirements' => 'Conhecimento básico em design.',
            'what_you_will_learn' => "• Princípios de UX/UI\n• Pesquisa de usuários\n• Wireframing e prototipação\n• Design system\n• Ferramentas profissionais\n• Portfolio de projetos",
            'user_id' => $instructor->id,
            'category_id' => $designCategory->id,
        ]);

        // Curso 3: Marketing Digital
        $course3 = \App\Models\Course::create([
            'title' => 'Marketing Digital Estratégico',
            'slug' => 'marketing-digital-estrategico',
            'description' => 'Domine as principais estratégias de marketing digital. Redes sociais, SEO, Google Ads e muito mais.',
            'short_description' => 'Domine as principais estratégias de marketing digital.',
            'level' => 'beginner',
            'price' => 0,
            'is_free' => true,
            'is_published' => true,
            'is_featured' => true,
            'duration_hours' => 25,
            'rating' => 4.6,
            'students_count' => 2100,
            'tags' => ['marketing', 'digital', 'seo', 'ads', 'redes-sociais'],
            'requirements' => 'Nenhum pré-requisito.',
            'what_you_will_learn' => "• Estratégias de marketing digital\n• SEO e SEM\n• Redes sociais\n• Google Ads\n• Analytics\n• Campanhas virais",
            'user_id' => $instructor->id,
            'category_id' => $marketingCategory->id,
        ]);

        // Curso 4: Empreendedorismo
        $course4 = \App\Models\Course::create([
            'title' => 'Empreendedorismo Digital',
            'slug' => 'empreendedorismo-digital',
            'description' => 'Aprenda a criar e gerenciar negócios digitais de sucesso. Da ideia ao primeiro faturamento.',
            'short_description' => 'Crie e gerencie negócios digitais de sucesso.',
            'level' => 'intermediate',
            'price' => 299.90,
            'is_free' => false,
            'is_published' => true,
            'is_featured' => false,
            'duration_hours' => 35,
            'rating' => 4.8,
            'students_count' => 650,
            'tags' => ['empreendedorismo', 'negocios', 'startup', 'vendas', 'lideranca'],
            'requirements' => 'Experiência básica em negócios.',
            'what_you_will_learn' => "• Validação de ideias\n• Modelo de negócio\n• MVP e prototipação\n• Vendas e marketing\n• Gestão financeira\n• Escalabilidade",
            'user_id' => $instructor->id,
            'category_id' => $businessCategory->id,
        ]);

        // Curso 5: JavaScript Avançado
        $course5 = \App\Models\Course::create([
            'title' => 'JavaScript Avançado e Moderno',
            'slug' => 'javascript-avancado-e-moderno',
            'description' => 'Domine JavaScript moderno com ES6+, async/await, módulos e as melhores práticas da linguagem.',
            'short_description' => 'Domine JavaScript moderno com ES6+ e melhores práticas.',
            'level' => 'advanced',
            'price' => 179.90,
            'is_free' => false,
            'is_published' => true,
            'is_featured' => true,
            'duration_hours' => 28,
            'rating' => 4.9,
            'students_count' => 980,
            'tags' => ['javascript', 'es6', 'async', 'modules', 'performance'],
            'requirements' => 'Conhecimento intermediário em JavaScript.',
            'what_you_will_learn' => "• ES6+ e recursos modernos\n• Async/await e Promises\n• Módulos e bundlers\n• Performance e otimização\n• Padrões de design\n• Testes avançados",
            'user_id' => $instructor->id,
            'category_id' => $programmingCategory->id,
        ]);

        $this->command->info('Cursos adicionais criados com sucesso!');
    }
}
