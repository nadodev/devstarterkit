<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EmailTemplate;

class EmailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $templates = [
            [
                'name' => 'Boas-vindas',
                'subject' => 'Bem-vindo ao DevStarter Kit! 🚀',
                'content' => '
                    <p>Olá <strong>{{name}}</strong>!</p>
                    
                    <p>Seja muito bem-vindo(a) ao <strong>DevStarter Kit</strong>! 🎉</p>
                    
                    <p>Estamos muito felizes em tê-lo(a) conosco nesta jornada de aprendizado e crescimento.</p>
                    
                    <p>Com o DevStarter Kit, você terá acesso a:</p>
                    <ul>
                        <li>✅ Cursos completos e atualizados</li>
                        <li>✅ Certificados reconhecidos</li>
                        <li>✅ Suporte especializado</li>
                        <li>✅ Comunidade ativa de desenvolvedores</li>
                    </ul>
                    
                    <p>Estamos aqui para ajudar você a alcançar seus objetivos na programação!</p>
                    
                    <p>Qualquer dúvida, não hesite em nos contatar.</p>
                    
                    <p>Bons estudos! 📚</p>
                ',
                'is_active' => true,
            ],
            [
                'name' => 'Promoção Especial',
                'subject' => '🔥 OFERTA ESPECIAL: 50% OFF em todos os cursos!',
                'content' => '
                    <p>Olá <strong>{{name}}</strong>!</p>
                    
                    <p>Que tal aproveitar nossa <strong>OFERTA ESPECIAL</strong>? 🔥</p>
                    
                    <p>Por tempo limitado, você pode ter acesso a <strong>TODOS</strong> os nossos cursos com <strong>50% DE DESCONTO</strong>!</p>
                    
                    <p>Esta é uma oportunidade única para:</p>
                    <ul>
                        <li>🚀 Acelerar sua carreira</li>
                        <li>💼 Aprender as tecnologias mais demandadas</li>
                        <li>📜 Obter certificados reconhecidos</li>
                        <li>💰 Investir no seu futuro profissional</li>
                    </ul>
                    
                    <p><strong>Não perca esta chance!</strong> A oferta é válida apenas por tempo limitado.</p>
                    
                    <p>Clique no botão abaixo e garante já sua vaga:</p>
                    
                    <p style="text-align: center; margin: 30px 0;">
                        <a href="#" style="background: linear-gradient(135deg, #3B82F6 0%, #8B5CF6 100%); color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; display: inline-block;">
                            🎯 QUERO MEU DESCONTO!
                        </a>
                    </p>
                    
                    <p>Corra, as vagas são limitadas! ⏰</p>
                ',
                'is_active' => true,
            ],
            [
                'name' => 'Newsletter Semanal',
                'subject' => '📰 Newsletter DevStarter Kit - Dicas e Novidades',
                'content' => '
                    <p>Olá <strong>{{name}}</strong>!</p>
                    
                    <p>Chegou mais uma edição da nossa newsletter com as melhores dicas e novidades do mundo da programação! 📰</p>
                    
                    <h3>🎯 Destaques desta semana:</h3>
                    <ul>
                        <li>💡 <strong>Dica do Dia:</strong> Como otimizar seu código JavaScript</li>
                        <li>🆕 <strong>Novo Curso:</strong> React Avançado - Hooks e Context API</li>
                        <li>🏆 <strong>Sucesso:</strong> Aluno consegue primeiro emprego como dev!</li>
                        <li>📚 <strong>Artigo:</strong> 10 frameworks que todo dev deve conhecer</li>
                    </ul>
                    
                    <h3>🔥 Oportunidades:</h3>
                    <p>Vagas abertas em empresas parceiras:</p>
                    <ul>
                        <li>Desenvolvedor Frontend - Remoto</li>
                        <li>Desenvolvedor Full Stack - São Paulo</li>
                        <li>DevOps Engineer - Rio de Janeiro</li>
                    </ul>
                    
                    <p>Mantenha-se atualizado e continue evoluindo! 🚀</p>
                    
                    <p>Até a próxima newsletter!</p>
                ',
                'is_active' => true,
            ],
            [
                'name' => 'Lembrete de Curso',
                'subject' => '📚 Continue seu aprendizado no DevStarter Kit',
                'content' => '
                    <p>Olá <strong>{{name}}</strong>!</p>
                    
                    <p>Notamos que você começou um curso conosco, mas ainda não o finalizou. 😊</p>
                    
                    <p>Sabemos que a vida pode ser corrida, mas não desista dos seus sonhos! 💪</p>
                    
                    <p><strong>Que tal retomar seus estudos hoje?</strong></p>
                    
                    <p>Lembre-se dos benefícios de continuar:</p>
                    <ul>
                        <li>✅ Aprender novas habilidades</li>
                        <li>✅ Aumentar suas chances no mercado</li>
                        <li>✅ Obter seu certificado</li>
                        <li>✅ Fazer networking com outros alunos</li>
                    </ul>
                    
                    <p>Estamos aqui para apoiar você em cada passo! 🤝</p>
                    
                    <p style="text-align: center; margin: 30px 0;">
                        <a href="#" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%); color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; display: inline-block;">
                            📖 CONTINUAR ESTUDOS
                        </a>
                    </p>
                    
                    <p>Vamos juntos nessa jornada! 🚀</p>
                ',
                'is_active' => true,
            ],
            [
                'name' => 'Convite para Evento',
                'subject' => '🎉 Você está convidado para nosso Webinar Gratuito!',
                'content' => '
                    <p>Olá <strong>{{name}}</strong>!</p>
                    
                    <p>Temos uma <strong>excelente notícia</strong> para você! 🎉</p>
                    
                    <p>Estamos organizando um <strong>Webinar Gratuito</strong> sobre:</p>
                    
                    <h3>🚀 "Como se tornar um Desenvolvedor Full Stack em 2024"</h3>
                    
                    <p><strong>Data:</strong> Próxima sexta-feira, 20h<br>
                    <strong>Duração:</strong> 1h30<br>
                    <strong>Local:</strong> Online (Zoom)</p>
                    
                    <p>Neste webinar você vai aprender:</p>
                    <ul>
                        <li>🎯 As tecnologias mais demandadas do mercado</li>
                        <li>💼 Como montar um portfólio que impressiona</li>
                        <li>💰 Estratégias para conseguir o primeiro emprego</li>
                        <li>🔥 Dicas de carreira de um desenvolvedor sênior</li>
                    </ul>
                    
                    <p><strong>Vagas limitadas!</strong> Garanta já sua participação:</p>
                    
                    <p style="text-align: center; margin: 30px 0;">
                        <a href="#" style="background: linear-gradient(135deg, #EF4444 0%, #EC4899 100%); color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; display: inline-block;">
                            🎫 QUERO PARTICIPAR GRATUITAMENTE!
                        </a>
                    </p>
                    
                    <p>Nos vemos lá! 👋</p>
                ',
                'is_active' => true,
            ],
        ];

        foreach ($templates as $template) {
            EmailTemplate::create($template);
        }
    }
}