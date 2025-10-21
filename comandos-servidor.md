# 🚀 Comandos para Configurar no Servidor

## 📁 Acessar o Servidor:
```bash
ssh usuario@leonardogeja.com.br
cd /home/u936696961/domains/leonardogeja.com.br/public_html/devstarterkit
```

## ⚙️ Configurações Iniciais:

### 1. Instalar Dependências:
```bash
composer install --no-dev --optimize-autoloader
```

### 2. Configurar Permissões:
```bash
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### 3. Executar Migrations:
```bash
php artisan migrate --force
```

### 4. Limpar Cache:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 📧 Configurar Sistema de Emails:

### 1. Configurar Crontab:
```bash
# Editar crontab
crontab -e

# Adicionar estas linhas:
* * * * * cd /home/u936696961/domains/leonardogeja.com.br/public_html/devstarterkit && php artisan schedule:run >> /dev/null 2>&1
* * * * * cd /home/u936696961/domains/leonardogeja.com.br/public_html/devstarterkit && php artisan queue:work --timeout=60 --sleep=3 --tries=3 >> /dev/null 2>&1
```

### 2. Configurar .env:
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://leonardogeja.com.br/devstarterkit

MAIL_MAILER=smtp
MAIL_HOST=seu-servidor-smtp.com
MAIL_PORT=587
MAIL_USERNAME=seu-email@leonardogeja.com.br
MAIL_PASSWORD=sua-senha
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="contato@leonardogeja.com.br"
MAIL_FROM_NAME="DevStarter Kit"

QUEUE_CONNECTION=database
```

## 🔍 Monitoramento:

### 1. Verificar Jobs na Fila:
```bash
php artisan tinker --execute="echo 'Jobs na fila: ' . \DB::table('jobs')->count();"
```

### 2. Verificar Logs:
```bash
tail -f storage/logs/laravel.log
```

### 3. Processar Jobs Manualmente:
```bash
php artisan queue:work --once
```

### 4. Verificar Status do Crontab:
```bash
crontab -l
```

## 🎯 Teste do Sistema:

### 1. Testar Formulário:
- Acesse: https://leonardogeja.com.br/devstarterkit
- Preencha o formulário
- Verifique se o lead aparece no admin

### 2. Verificar Emails:
- Primeiro email deve ser enviado imediatamente
- Emails agendados aparecem na tabela `jobs`
- Worker processa os emails automaticamente

## 🚨 Troubleshooting:

### Se os emails não estão sendo enviados:
```bash
# Verificar se o worker está rodando
ps aux | grep "queue:work"

# Reiniciar o worker
pkill -f "queue:work"
php artisan queue:work --daemon &
```

### Se o crontab não está funcionando:
```bash
# Verificar logs do sistema
tail -f /var/log/cron

# Testar comando manualmente
cd /home/u936696961/domains/leonardogeja.com.br/public_html/devstarterkit && php artisan schedule:run
```
