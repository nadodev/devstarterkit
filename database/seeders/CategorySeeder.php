<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Programação',
                'slug' => 'programacao',
                'description' => 'Cursos de desenvolvimento de software e programação',
                'color' => '#3B82F6',
                'icon' => 'fas fa-code',
                'is_active' => true,
            ],
            [
                'name' => 'Design',
                'slug' => 'design',
                'description' => 'Cursos de design gráfico, UX/UI e web design',
                'color' => '#EF4444',
                'icon' => 'fas fa-palette',
                'is_active' => true,
            ],
            [
                'name' => 'Marketing',
                'slug' => 'marketing',
                'description' => 'Cursos de marketing digital e estratégias de vendas',
                'color' => '#10B981',
                'icon' => 'fas fa-bullhorn',
                'is_active' => true,
            ],
            [
                'name' => 'Negócios',
                'slug' => 'negocios',
                'description' => 'Cursos de empreendedorismo e gestão empresarial',
                'color' => '#F59E0B',
                'icon' => 'fas fa-briefcase',
                'is_active' => true,
            ],
            [
                'name' => 'Data Science',
                'slug' => 'data-science',
                'description' => 'Cursos de ciência de dados e análise',
                'color' => '#8B5CF6',
                'icon' => 'fas fa-chart-bar',
                'is_active' => true,
            ],
            [
                'name' => 'Idiomas',
                'slug' => 'idiomas',
                'description' => 'Cursos de idiomas e comunicação',
                'color' => '#EC4899',
                'icon' => 'fas fa-language',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
