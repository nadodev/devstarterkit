# EduPlatform - Plataforma de Cursos Online

Uma plataforma completa de cursos online desenvolvida com Laravel, oferecendo funcionalidades para estudantes, instrutores e administradores.

## 🚀 Funcionalidades

### Para Estudantes
- 📊 Dashboard personalizado com progresso
- 📈 Acompanhamento de estatísticas
- ❤️ Sistema de favoritos
- 📜 Certificados de conclusão
- 💬 Fórum de discussão por curso
- ⭐ Sistema de avaliações e reviews

### Para Instrutores
- 🛠️ Painel de criação/edição de cursos
- 📊 Estatísticas de desempenho
- 👥 Gestão de alunos inscritos
- ✏️ Ferramentas de correção
- 📋 Relatórios de progresso

### Para Administradores
- 🛡️ Moderação de cursos e usuários
- 📈 Analytics da plataforma
- 🗂️ Gestão de categorias
- ⚙️ Configurações do sistema

## 🏗️ Estrutura do Sistema

### Sistema de Autenticação
- **Aluno**: Consome cursos e acompanha progresso
- **Instrutor**: Cria e gerencia cursos
- **Admin**: Gerencia toda a plataforma

### Módulo de Cursos
- Categorias organizadas por áreas
- Níveis: Iniciante, Intermediário, Avançado
- Sistema de avaliações e reviews
- Progresso do aluno
- Certificados de conclusão

### Módulo de Conteúdo
- **Aulas**: Vídeos, textos, PDFs, apresentações, áudios
- **Módulos/Seções**: Divisão lógica do curso
- **Exercícios**: Questionários e atividades práticas

### Funcionalidades Avançadas
- ✅ Sistema de progresso
- 🔍 Busca e filtros
- 💬 Sistema de comentários
- 🔔 Notificações
- 📱 Design responsivo
- 📴 Download offline

## 🛠️ Tecnologias Utilizadas

- **Backend**: Laravel 12
- **Frontend**: Tailwind CSS, Alpine.js
- **Database**: MySQL/PostgreSQL
- **Autenticação**: Laravel Auth
- **Upload**: Laravel Storage

## 📦 Instalação

### Pré-requisitos
- PHP 8.2+
- Composer
- Node.js & NPM
- MySQL/PostgreSQL

### Passos para instalação

1. **Clone o repositório**
```bash
git clone <repository-url>
cd eduplatform
```

2. **Instale as dependências**
```bash
composer install
npm install
```

3. **Configure o ambiente**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configure o banco de dados**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=eduplatform
DB_USERNAME=root
DB_PASSWORD=
```

5. **Execute as migrações e seeders**
```bash
php artisan migrate
php artisan db:seed
```

6. **Compile os assets**
```bash
npm run build
```

7. **Inicie o servidor**
```bash
php artisan serve
```

## 👥 Usuários de Exemplo

Após executar os seeders, você terá os seguintes usuários:

- **Admin**: admin@eduplatform.com / password
- **Instrutor**: joao@example.com / password  
- **Estudante**: maria@example.com / password

## 🎯 Fluxo do Usuário

1. **Registro/Login** → Escolha do perfil (Aluno/Instrutor)
2. **Browse cursos** → Filtros e busca
3. **Inscrever-se** → Acesso ao conteúdo
4. **Consumir conteúdo** → Vídeos, textos, exercícios
5. **Completar atividades** → Feedback e progresso
6. **Finalizar curso** → Certificado de conclusão
7. **Avaliar experiência** → Reviews e ratings

## 📱 Recursos Adicionais

- 🏆 Sistema de achievements (conquistas)
- 👥 Comunidade: Perfis e seguir usuários
- 📊 Analytics detalhados
- 🔔 Sistema de notificações
- 📱 Aplicativo mobile responsivo

## 🚀 Deploy

### Produção
```bash
# Otimizar para produção
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Compilar assets
npm run build
```

### Docker (Opcional)
```bash
# Usar Laravel Sail
./vendor/bin/sail up -d
```

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 🤝 Contribuição

1. Fork o projeto
2. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

## 📞 Suporte

Para suporte, envie um email para suporte@eduplatform.com ou abra uma issue no GitHub.

---

**EduPlatform** - Transformando vidas através da educação online! 🎓