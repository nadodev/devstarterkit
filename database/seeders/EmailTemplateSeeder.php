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
            [
                'name' => 'Education Value Mail',
                'subject' => 'Como eu economizo 40h por projeto (sem começar do zero)',
                'content' => '
                    <p>Olá <strong>{{name}}</strong>!</p>
                    
                    <p>Hoje quero te contar como eu economizo mais de 40 horas por projeto usando uma estratégia que qualquer dev pode aplicar.</p>
                    
                    <p><strong>O problema:</strong> Todo projeto novo = começar do zero</p>
                    <p><strong>A solução:</strong> Ter uma base sólida e reutilizável</p>
                    
                    <p>Com o DevStarter Kit, eu tenho:</p>
                    <ul>
                        <li>✅ Sistema de login pronto</li>
                        <li>✅ Dashboard administrativo</li>
                        <li>✅ CRUD básico funcionando</li>
                        <li>✅ Design responsivo</li>
                    </ul>
                    
                    <p><strong>Em média, isso me economiza mais de 40 horas por projeto.</strong></p>
                    <p>E o melhor: qualquer dev pode usar, mesmo começando agora.</p>
                    
                    <div style="text-align: center;">
                        <a href="{{$demoLink}}" class="cta-button">
                            👉 Veja a demo do DevStarter Kit em ação
                        </a>
                    </div>
                    
                    <p>Amanhã te mando um bônus especial que normalmente vendo por R$197, mas quero liberar pra você de graça.</p>
                    
                    <p>Abraços,<br>Leonardo</p>
                ',
                'is_active' => true,
            ],
            [
                'name' => 'Offer Conversion Mail',
                'subject' => 'Oferta especial: DevStarter Kit com 50% OFF',
                'content' => '
                    <p>Olá <strong>{{name}}</strong>!</p>
                    
                    <p>Como prometido, aqui está sua oferta especial! 🎯</p>
                    
                    <p>Por tempo limitado, você pode ter o <strong>DevStarter Kit completo</strong> com <strong>50% DE DESCONTO</strong>!</p>
                    
                    <p>O que você vai receber:</p>
                    <ul>
                        <li>🚀 Sistema completo Laravel + Blade + TailwindCSS</li>
                        <li>🎨 Design moderno e responsivo</li>
                        <li>🔐 Autenticação segura</li>
                        <li>📊 Dashboard administrativo</li>
                        <li>💾 CRUD completo</li>
                        <li>📱 Totalmente responsivo</li>
                    </ul>
                    
                    <p><strong>Valor normal: R$197,00</strong><br>
                    <strong>Seu preço: R$97,00</strong> (50% OFF)</p>
                    
                    <div style="text-align: center;">
                        <a href="{{url(\'/conversion\')}}" class="cta-button">
                            🎯 Quero o DevStarter Kit com 50% OFF
                        </a>
                    </div>
                    
                    <p>Esta oferta é válida apenas por 48 horas. Não perca!</p>
                    
                    <p>Abraços,<br>Leonardo</p>
                ',
                'is_active' => true,
            ],
            [
                'name' => 'Conversion Initial Mail',
                'subject' => 'Última chance: DevStarter Kit com desconto especial',
                'content' => '
                    <p>Olá <strong>{{name}}</strong>!</p>
                    
                    <p>Esta é sua <strong>última chance</strong> de garantir o DevStarter Kit com desconto especial! ⏰</p>
                    
                    <p>Muitos desenvolvedores já estão usando o DevStarter Kit para:</p>
                    <ul>
                        <li>🚀 Entregar projetos 3x mais rápido</li>
                        <li>💰 Faturar mais com menos trabalho</li>
                        <li>🎯 Impressionar clientes com qualidade profissional</li>
                        <li>⏱️ Economizar horas de desenvolvimento</li>
                    </ul>
                    
                    <p><strong>O que você está perdendo:</strong></p>
                    <p>Enquanto você hesita, outros devs já estão usando o DevStarter Kit para acelerar seus projetos e faturar mais.</p>
                    
                    <div style="text-align: center;">
                        <a href="{{url(\'/conversion\')}}" class="cta-button">
                            Quero o DevStarter Kit Agora
                        </a>
                    </div>
                    
                    <p>Esta oferta expira em breve. Não deixe passar!</p>
                    
                    <p>Abraços,<br>Leonardo</p>
                ',
                'is_active' => true,
            ],
            [
                'name' => 'Conversion Social Proof Mail',
                'subject' => 'Veja o que outros desenvolvedores dizem sobre o DevStarter Kit',
                'content' => '
                    <p>Olá <strong>{{name}}</strong>!</p>
                    
                    <p>Veja o que outros desenvolvedores estão falando sobre o DevStarter Kit:</p>
                    
                    <blockquote style="background: #f8f9fa; padding: 20px; border-left: 4px solid #3B82F6; margin: 20px 0;">
                        <p><em>"Economizei 30 horas no meu último projeto usando o DevStarter Kit. Simplesmente incrível!"</em></p>
                        <p><strong>- Maria Silva, Desenvolvedora Full Stack</strong></p>
                    </blockquote>
                    
                    <blockquote style="background: #f8f9fa; padding: 20px; border-left: 4px solid #10B981; margin: 20px 0;">
                        <p><em>"O DevStarter Kit me ajudou a entregar um projeto em 2 dias que normalmente levaria 2 semanas. Cliente ficou impressionado!"</em></p>
                        <p><strong>- João Santos, Freelancer</strong></p>
                    </blockquote>
                    
                    <blockquote style="background: #f8f9fa; padding: 20px; border-left: 4px solid #8B5CF6; margin: 20px 0;">
                        <p><em>"Melhor investimento que fiz na minha carreira. ROI em menos de 1 mês!"</em></p>
                        <p><strong>- Ana Costa, Tech Lead</strong></p>
                    </blockquote>
                    
                    <p><strong>+127 desenvolvedores</strong> já estão usando o DevStarter Kit para acelerar seus projetos.</p>
                    
                    <div style="text-align: center;">
                        <a href="{{url(\'/conversion\')}}" class="cta-button">
                            Aproveitar Oferta e Começar Agora
                        </a>
                    </div>
                    
                    <p>Junte-se a eles e acelere seus projetos também!</p>
                    
                    <p>Abraços,<br>Leonardo</p>
                ',
                'is_active' => true,
            ],
            [
                'name' => 'Conversion Final Mail',
                'subject' => 'ÚLTIMA CHAMADA: Oferta expira hoje!',
                'content' => '
                    <p>Olá <strong>{{name}}</strong>!</p>
                    
                    <p><strong>ATENÇÃO:</strong> Esta é sua <strong>ÚLTIMA CHAMADA</strong>! 🚨</p>
                    
                    <p>Sua oferta especial do DevStarter Kit com 50% OFF <strong>expira hoje à meia-noite</strong>!</p>
                    
                    <p>Após isso, o preço volta ao normal (R$197,00) e você perderá:</p>
                    <ul>
                        <li>❌ 50% de desconto</li>
                        <li>❌ Bônus exclusivos</li>
                        <li>❌ Suporte prioritário</li>
                        <li>❌ Garantia de 30 dias</li>
                    </ul>
                    
                    <p><strong>Não deixe esta oportunidade passar!</strong></p>
                    
                    <p>Mais de 127 desenvolvedores já estão usando o DevStarter Kit para:</p>
                    <ul>
                        <li>✅ Entregar projetos 3x mais rápido</li>
                        <li>✅ Faturar mais com menos trabalho</li>
                        <li>✅ Impressionar clientes</li>
                        <li>✅ Economizar horas de desenvolvimento</li>
                    </ul>
                    
                    <div style="text-align: center;">
                        <a href="{{url(\'/conversion\')}}" class="cta-button">
                            Quero Comprar Agora – Última Chance
                        </a>
                    </div>
                    
                    <p><strong>Esta é realmente sua última chance!</strong></p>
                    
                    <p>Abraços,<br>Leonardo</p>
                ',
                'is_active' => true,
            ],
        ];

        foreach ($templates as $template) {
            EmailTemplate::create($template);
        }
    }
}