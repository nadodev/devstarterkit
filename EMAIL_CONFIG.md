# Configuração de E-mail - DevStarter Kit

## Configurações Necessárias no .env

Adicione as seguintes configurações ao seu arquivo `.env`:

```env
# Configurações de E-mail
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=seu_email@gmail.com
MAIL_PASSWORD=sua_senha_de_app
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=contato@devstarterkit.com
MAIL_FROM_NAME="DevStarter Kit"

# E-mail para receber mensagens de contato
CONTACT_EMAIL=contato@devstarterkit.com
```

## Configuração para Gmail

1. **Ative a autenticação de 2 fatores** na sua conta Google
2. **Gere uma senha de app**:
   - Vá para: Configurações da Conta > Segurança
   - Clique em "Senhas de app"
   - Gere uma nova senha para "Mail"
   - Use esta senha no campo `MAIL_PASSWORD`

## Configuração para Outros Provedores

### Outlook/Hotmail
```env
MAIL_HOST=smtp-mail.outlook.com
MAIL_PORT=587
MAIL_ENCRYPTION=tls
```

### Yahoo
```env
MAIL_HOST=smtp.mail.yahoo.com
MAIL_PORT=587
MAIL_ENCRYPTION=tls
```

### SendGrid
```env
MAIL_HOST=smtp.sendgrid.net
MAIL_PORT=587
MAIL_USERNAME=apikey
MAIL_PASSWORD=sua_api_key_do_sendgrid
```

## Testando a Configuração

Execute o comando para testar o envio de e-mails:

```bash
php artisan tinker
```

```php
Mail::raw('Teste de e-mail', function ($message) {
    $message->to('seu_email@exemplo.com')->subject('Teste');
});
```

## Funcionalidades do Sistema de Contato

- ✅ **Validação completa** dos campos
- ✅ **E-mail para administrador** com todos os detalhes
- ✅ **E-mail de confirmação** para o usuário
- ✅ **Tratamento de erros** e logs
- ✅ **Interface responsiva** com feedback visual
- ✅ **Proteção CSRF** integrada
- ✅ **Templates HTML** profissionais

## Estrutura dos E-mails

### E-mail para Administrador
- Nome, e-mail, telefone do usuário
- Assunto e mensagem completa
- Data/hora e IP do usuário
- Link direto para responder

### E-mail de Confirmação
- Confirmação de recebimento
- Resumo da mensagem
- Links úteis (Central de Ajuda, Documentação)
- Outras formas de contato
- Tempo estimado de resposta
