<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buscar categoria de Programação
        $programmingCategory = \App\Models\Category::where('slug', 'programacao')->first();
        
        // Buscar instrutor (João Silva)
        $instructor = \App\Models\User::where('email', 'joao@example.com')->first();
        
        if (!$programmingCategory || !$instructor) {
            $this->command->error('Categoria ou instrutor não encontrado. Execute primeiro o CategorySeeder e DatabaseSeeder.');
            return;
        }

        // Criar o curso principal
        $course = \App\Models\Course::create([
            'title' => 'Destravando seu Primeiro Sistema',
            'slug' => 'destravando-seu-primeiro-sistema',
            'description' => 'Aprenda a planejar e estruturar projetos modernos, evitando os 5 erros mais comuns que travam qualquer desenvolvedor. Este curso vai te mostrar como criar uma base sólida para seus sistemas.',
            'short_description' => 'Guia completo para planejar e estruturar projetos modernos sem travar no início.',
            'level' => 'beginner',
            'price' => 0,
            'is_free' => true,
            'is_published' => true,
            'is_featured' => true,
            'duration_hours' => 8,
            'rating' => 4.8,
            'students_count' => 0,
            'tags' => ['desenvolvimento', 'arquitetura', 'planejamento', 'sistemas', 'estrutura'],
            'requirements' => 'Conhecimento básico em programação e vontade de aprender a estruturar projetos.',
            'what_you_will_learn' => "• Como planejar a base de um sistema moderno\n• Os 5 erros que travam qualquer projeto\n• Estruturação de módulos e responsabilidades\n• Mapeamento de fluxo do usuário\n• Desafio prático: DevKit Challenge\n• Do rascunho ao projeto real",
            'user_id' => $instructor->id,
            'category_id' => $programmingCategory->id,
        ]);

        // Criar módulos do curso
        $modules = [
            [
                'title' => '🧭 Introdução - Por que quase todo dev trava no início?',
                'description' => 'Entenda os principais problemas que fazem desenvolvedores travarem no início de projetos.',
                'order' => 1,
            ],
            [
                'title' => '💣 Capítulo 1 - Os 5 erros que travam qualquer projeto',
                'description' => 'Conheça os 5 erros mais comuns que impedem o sucesso de projetos.',
                'order' => 2,
            ],
            [
                'title' => '🧩 Capítulo 2 - Como planejar a base de um sistema moderno',
                'description' => 'Aprenda o passo a passo para planejar sistemas escaláveis.',
                'order' => 3,
            ],
            [
                'title' => '🧠 Capítulo 3 - Exercício prático: Estruturando seus módulos',
                'description' => 'Exercício prático para aplicar os conceitos aprendidos.',
                'order' => 4,
            ],
            [
                'title' => '⚙️ Capítulo 4 - O Desafio Prático "DevKit Challenge"',
                'description' => 'Desafio prático para criar a base funcional de um sistema completo.',
                'order' => 5,
            ],
            [
                'title' => '🚀 Capítulo Final - Do rascunho ao projeto real',
                'description' => 'Como transformar o aprendizado em um produto real.',
                'order' => 6,
            ],
        ];

        foreach ($modules as $moduleData) {
            $module = \App\Models\Module::create([
                'title' => $moduleData['title'],
                'description' => $moduleData['description'],
                'order' => $moduleData['order'],
                'is_published' => true,
                'course_id' => $course->id,
            ]);

            // Criar aulas para cada módulo
            $this->createLessonsForModule($module, $moduleData['order']);
        }

        $this->command->info('Curso "Destravando seu Primeiro Sistema" criado com sucesso!');
    }

    private function createLessonsForModule($module, $moduleOrder)
    {
        $lessons = [];

        switch ($moduleOrder) {
            case 1: // Introdução
                $lessons = [
                    [
                        'title' => 'Bem-vindo ao curso',
                        'description' => 'Apresentação do curso e objetivos de aprendizagem.',
                        'type' => 'video',
                        'content' => 'Neste curso você aprenderá a planejar e estruturar projetos modernos, evitando os erros mais comuns que fazem desenvolvedores travarem.',
                        'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                        'duration_minutes' => 5,
                        'order' => 1,
                        'is_free' => true,
                    ],
                    [
                        'title' => 'Por que desenvolvedores travam?',
                        'description' => 'Entenda os principais motivos que fazem projetos falharem no início.',
                        'type' => 'text',
                        'content' => 'Todo desenvolvedor já passou por isso: abrir o editor, criar uma pasta "meu-sistema" e... travar. Falta clareza, estrutura, e principalmente uma base sólida para começar do jeito certo.',
                        'duration_minutes' => 10,
                        'order' => 2,
                        'is_free' => true,
                    ],
                ];
                break;

            case 2: // Os 5 erros
                $lessons = [
                    [
                        'title' => 'Erro 1: Começar sem propósito definido',
                        'description' => 'Não saber o que o sistema realmente resolve.',
                        'type' => 'text',
                        'content' => 'O primeiro erro é começar a codificar sem ter clareza sobre o que o sistema deve resolver. Sem um propósito definido, você vai construindo funcionalidades sem direção.',
                        'duration_minutes' => 8,
                        'order' => 1,
                        'is_free' => true,
                    ],
                    [
                        'title' => 'Erro 2: Ignorar o fluxo do usuário',
                        'description' => 'Construir telas sem mapear a jornada.',
                        'type' => 'text',
                        'content' => 'Muitos desenvolvedores começam criando telas sem entender como o usuário vai navegar pelo sistema. Isso resulta em interfaces confusas e experiências ruins.',
                        'duration_minutes' => 8,
                        'order' => 2,
                        'is_free' => true,
                    ],
                    [
                        'title' => 'Erro 3: Não definir módulos e responsabilidades',
                        'description' => 'Criar um caos de pastas e funções.',
                        'type' => 'text',
                        'content' => 'Sem uma estrutura clara de módulos, o código vira um emaranhado de arquivos e funções sem organização. Isso dificulta manutenção e escalabilidade.',
                        'duration_minutes' => 8,
                        'order' => 3,
                        'is_free' => true,
                    ],
                    [
                        'title' => 'Erro 4: Deixar a arquitetura para depois',
                        'description' => 'E acabar refazendo tudo.',
                        'type' => 'text',
                        'content' => 'Pensar na arquitetura apenas depois de ter código é um erro comum. Isso resulta em refatorações custosas e sistemas difíceis de manter.',
                        'duration_minutes' => 8,
                        'order' => 4,
                        'is_free' => true,
                    ],
                    [
                        'title' => 'Erro 5: Tentar fazer tudo sozinho e do zero',
                        'description' => 'Quando podia usar uma base sólida.',
                        'type' => 'text',
                        'content' => 'Reinventar a roda é um erro clássico. Usar ferramentas e bases sólidas acelera o desenvolvimento e reduz erros.',
                        'duration_minutes' => 8,
                        'order' => 5,
                        'is_free' => true,
                    ],
                ];
                break;

            case 3: // Planejamento
                $lessons = [
                    [
                        'title' => 'Mapa de funcionalidades',
                        'description' => 'Como mapear tudo que o sistema deve fazer.',
                        'type' => 'text',
                        'content' => 'O primeiro passo é listar todas as funcionalidades que o sistema precisa ter. Use técnicas como brainstorming e entrevistas com usuários.',
                        'duration_minutes' => 12,
                        'order' => 1,
                        'is_free' => true,
                    ],
                    [
                        'title' => 'Agrupamento por módulos',
                        'description' => 'Organize funcionalidades em módulos lógicos.',
                        'type' => 'text',
                        'content' => 'Agrupe funcionalidades relacionadas em módulos como: admin, público, autenticação, relatórios, etc. Isso facilita a organização e manutenção.',
                        'duration_minutes' => 15,
                        'order' => 2,
                        'is_free' => true,
                    ],
                    [
                        'title' => 'Definir relacionamentos',
                        'description' => 'Mapeie como os módulos se comunicam.',
                        'type' => 'text',
                        'content' => 'Entenda quem acessa o quê, o que depende do quê. Crie um diagrama de relacionamentos entre módulos.',
                        'duration_minutes' => 10,
                        'order' => 3,
                        'is_free' => true,
                    ],
                    [
                        'title' => 'Estrutura de pastas lógica',
                        'description' => 'Organize o código em uma estrutura clara.',
                        'type' => 'text',
                        'content' => 'Crie uma estrutura como: core/, modules/, shared/. Isso facilita a navegação e manutenção do código.',
                        'duration_minutes' => 12,
                        'order' => 4,
                        'is_free' => true,
                    ],
                    [
                        'title' => 'Visualizar o fluxo completo',
                        'description' => 'Mapeie a jornada do usuário do início ao fim.',
                        'type' => 'text',
                        'content' => 'Desenhe o fluxo completo: do login à ação final do usuário. Isso ajuda a identificar gargalos e melhorar a experiência.',
                        'duration_minutes' => 15,
                        'order' => 5,
                        'is_free' => true,
                    ],
                ];
                break;

            case 4: // Exercício prático
                $lessons = [
                    [
                        'title' => 'Desenhe seu sistema ideal',
                        'description' => 'Exercício prático: pegue um papel e desenhe seu sistema.',
                        'type' => 'text',
                        'content' => 'Pegue um papel (ou o Notion) e desenhe seu sistema ideal. Nomeie o projeto e liste os módulos principais.',
                        'duration_minutes' => 20,
                        'order' => 1,
                        'is_free' => true,
                    ],
                    [
                        'title' => 'Liste os módulos principais',
                        'description' => 'Identifique os módulos do seu sistema.',
                        'type' => 'text',
                        'content' => 'Exemplos: Usuários, Financeiro, Configurações, Relatórios, etc. Escreva 3 ações que cada módulo deve executar.',
                        'duration_minutes' => 15,
                        'order' => 2,
                        'is_free' => true,
                    ],
                    [
                        'title' => 'Conecte os módulos',
                        'description' => 'Mapeie como os módulos se comunicam.',
                        'type' => 'text',
                        'content' => 'Conecte os módulos que se comunicam entre si. Descreva o fluxo de um usuário real dentro do seu sistema.',
                        'duration_minutes' => 20,
                        'order' => 3,
                        'is_free' => true,
                    ],
                ];
                break;

            case 5: // Desafio prático
                $lessons = [
                    [
                        'title' => 'DevKit Challenge - Introdução',
                        'description' => 'Apresentação do desafio prático.',
                        'type' => 'text',
                        'content' => 'Agora que você tem a estrutura no papel, é hora de trazer isso à vida. O desafio é criar a base funcional de um sistema completo.',
                        'duration_minutes' => 10,
                        'order' => 1,
                        'is_free' => true,
                    ],
                    [
                        'title' => 'Objetivos do desafio',
                        'description' => 'Entenda o que você deve entregar.',
                        'type' => 'text',
                        'content' => 'Criar painel admin + página pública. Testar sua clareza de arquitetura, modularização e organização de código. Tempo sugerido: 3 dias.',
                        'duration_minutes' => 8,
                        'order' => 2,
                        'is_free' => true,
                    ],
                    [
                        'title' => 'Dica: DevStarter Kit',
                        'description' => 'Como acelerar o desenvolvimento.',
                        'type' => 'text',
                        'content' => 'Quem já usa o DevStarter Kit faz isso em 15 minutos, com tudo pronto — autenticação, layout, rotas, componentes e integrações.',
                        'duration_minutes' => 5,
                        'order' => 3,
                        'is_free' => true,
                    ],
                ];
                break;

            case 6: // Capítulo final
                $lessons = [
                    [
                        'title' => 'Do rascunho ao projeto real',
                        'description' => 'Como transformar o aprendizado em produto.',
                        'type' => 'text',
                        'content' => 'O que você acabou de construir é a visão estratégica que todo dev precisa. Mas se quiser dar o próximo passo, sem reescrever cada linha de código do zero, o DevStarter Kit é o atalho.',
                        'duration_minutes' => 10,
                        'order' => 1,
                        'is_free' => true,
                    ],
                    [
                        'title' => 'Próximos passos',
                        'description' => 'Como continuar sua jornada de desenvolvimento.',
                        'type' => 'text',
                        'content' => 'Transforme o aprendizado em um produto real. O DevStarter Kit já vem com toda a estrutura que você planejou aqui — e ainda conecta painel, site público e landing page.',
                        'duration_minutes' => 8,
                        'order' => 2,
                        'is_free' => true,
                    ],
                ];
                break;
        }

        // Criar as aulas
        foreach ($lessons as $lessonData) {
            \App\Models\Lesson::create([
                'title' => $lessonData['title'],
                'description' => $lessonData['description'],
                'type' => $lessonData['type'],
                'content' => $lessonData['content'],
                'video_url' => $lessonData['video_url'] ?? null,
                'duration_minutes' => $lessonData['duration_minutes'],
                'order' => $lessonData['order'],
                'is_published' => true,
                'is_free' => $lessonData['is_free'],
                'module_id' => $module->id,
            ]);
        }

        // Criar questionários para alguns módulos
        if (in_array($moduleOrder, [2, 3, 4])) {
            $this->createQuizForModule($module, $moduleOrder);
        }
    }

    private function createQuizForModule($module, $moduleOrder)
    {
        $quizData = [];

        switch ($moduleOrder) {
            case 2: // Os 5 erros
                $quizData = [
                    'title' => 'Quiz: Os 5 erros que travam projetos',
                    'description' => 'Teste seu conhecimento sobre os erros mais comuns.',
                    'questions' => [
                        [
                            'question' => 'Qual é o primeiro erro que travam projetos?',
                            'type' => 'multiple_choice',
                            'options' => [
                                'Começar sem propósito definido',
                                'Usar muitas tecnologias',
                                'Não fazer testes',
                                'Não usar versionamento'
                            ],
                            'correct_answer' => 0
                        ],
                        [
                            'question' => 'Ignorar o fluxo do usuário resulta em:',
                            'type' => 'multiple_choice',
                            'options' => [
                                'Interfaces confusas',
                                'Código mais limpo',
                                'Melhor performance',
                                'Menos bugs'
                            ],
                            'correct_answer' => 0
                        ],
                        [
                            'question' => 'É melhor planejar a arquitetura antes ou depois de começar a codificar?',
                            'type' => 'multiple_choice',
                            'options' => [
                                'Antes',
                                'Depois',
                                'Durante',
                                'Não importa'
                            ],
                            'correct_answer' => 0
                        ]
                    ],
                    'time_limit_minutes' => 10,
                    'passing_score' => 70
                ];
                break;

            case 3: // Planejamento
                $quizData = [
                    'title' => 'Quiz: Planejamento de sistemas',
                    'description' => 'Avalie seu entendimento sobre planejamento.',
                    'questions' => [
                        [
                            'question' => 'O primeiro passo no planejamento é:',
                            'type' => 'multiple_choice',
                            'options' => [
                                'Mapear funcionalidades',
                                'Escolher tecnologias',
                                'Criar banco de dados',
                                'Fazer layout'
                            ],
                            'correct_answer' => 0
                        ],
                        [
                            'question' => 'Agrupar funcionalidades em módulos facilita:',
                            'type' => 'multiple_choice',
                            'options' => [
                                'Organização e manutenção',
                                'Performance',
                                'Segurança',
                                'Design'
                            ],
                            'correct_answer' => 0
                        ]
                    ],
                    'time_limit_minutes' => 8,
                    'passing_score' => 70
                ];
                break;

            case 4: // Exercício prático
                $quizData = [
                    'title' => 'Quiz: Exercício prático',
                    'description' => 'Teste sua compreensão do exercício.',
                    'questions' => [
                        [
                            'question' => 'No exercício prático, você deve:',
                            'type' => 'multiple_choice',
                            'options' => [
                                'Desenhar o sistema no papel',
                                'Começar a codificar',
                                'Pesquisar tecnologias',
                                'Fazer layout'
                            ],
                            'correct_answer' => 0
                        ],
                        [
                            'question' => 'Conectar módulos significa:',
                            'type' => 'multiple_choice',
                            'options' => [
                                'Mapear como se comunicam',
                                'Colocar no mesmo arquivo',
                                'Usar a mesma tecnologia',
                                'Ter o mesmo desenvolvedor'
                            ],
                            'correct_answer' => 0
                        ]
                    ],
                    'time_limit_minutes' => 5,
                    'passing_score' => 70
                ];
                break;
        }

        if (!empty($quizData)) {
            \App\Models\Quiz::create([
                'title' => $quizData['title'],
                'description' => $quizData['description'],
                'questions' => $quizData['questions'],
                'time_limit_minutes' => $quizData['time_limit_minutes'],
                'passing_score' => $quizData['passing_score'],
                'is_published' => true,
                'lesson_id' => $module->lessons()->first()->id,
            ]);
        }
    }
}
