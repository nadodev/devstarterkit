#!/bin/bash

# Script para configurar o sistema de emails agendados no servidor
# Execute este script no servidor de produção

echo "🚀 Configurando DevStarter Kit no servidor..."

# Navegar para o diretório do projeto
cd /home/u936696961/domains/leonardogeja.com.br/public_html/devstarterkit

# Instalar dependências
echo "📦 Instalando dependências..."
composer install --no-dev --optimize-autoloader

# Configurar permissões
echo "🔐 Configurando permissões..."
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

# Executar migrations
echo "🗄️ Executando migrations..."
php artisan migrate --force

# Limpar cache
echo "🧹 Limpando cache..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Configurar crontab
echo "⏰ Configurando crontab..."
(crontab -l 2>/dev/null; echo "* * * * * cd /home/u936696961/domains/leonardogeja.com.br/public_html/devstarterkit && php artisan schedule:run >> /dev/null 2>&1") | crontab -
(crontab -l 2>/dev/null; echo "* * * * * cd /home/u936696961/domains/leonardogeja.com.br/public_html/devstarterkit && php artisan queue:work --timeout=60 --sleep=3 --tries=3 >> /dev/null 2>&1") | crontab -

echo "✅ Configuração concluída!"
echo "📧 Sistema de emails agendados ativo!"
echo "🔍 Para monitorar: tail -f storage/logs/laravel.log"
