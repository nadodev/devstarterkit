# Sistema de Cookies - Laravel ProStarter

## 📋 Visão Geral

Sistema completo de gerenciamento de consentimento de cookies em conformidade com LGPD e GDPR.

## 🚀 Funcionalidades

### ✅ Banner de Consentimento
- **Aparece automaticamente** na primeira visita
- **Design responsivo** com animações suaves
- **Três opções**: Aceitar Todos, Rejeitar, Personalizar

### ⚙️ Modal de Personalização
- **Cookies Essenciais**: Sempre ativos (obrigatórios)
- **Cookies Analíticos**: Para melhorar experiência
- **Cookies de Marketing**: Para personalizar ofertas

### 🔒 Armazenamento Seguro
- **Cookies HTTP**: Armazenados no navegador
- **Validação**: Verificação de integridade
- **Expiração**: 1 ano de validade

## 📁 Arquivos Criados

### Components
- `resources/views/components/cookie-banner.blade.php` - Banner principal
- `resources/views/components/cookie-scripts.blade.php` - Scripts condicionais

### Controllers
- `app/Http/Controllers/CookieController.php` - Gerenciamento de consentimento

### Middleware
- `app/Http/Middleware/CookieConsent.php` - Verificação de consentimento

### Helpers
- `app/Helpers/CookieHelper.php` - Funções auxiliares

## 🛠️ Como Usar

### 1. Verificar Consentimento
```php
use App\Helpers\CookieHelper;

// Verificar se tem consentimento analítico
if (CookieHelper::hasAnalyticsConsent($request)) {
    // Carregar Google Analytics
}

// Verificar se tem consentimento de marketing
if (CookieHelper::hasMarketingConsent($request)) {
    // Carregar Facebook Pixel
}
```

### 2. Scripts Condicionais
```blade
@include('components.cookie-scripts')
```

### 3. Rotas Disponíveis
```php
POST /cookies/consent    // Salvar consentimento
GET /cookies/consent     // Obter consentimento
DELETE /cookies/consent  // Revogar consentimento
```

## 🎨 Personalização

### Cores do Banner
```css
/* Cores principais */
--cookie-primary: #7C3AED;
--cookie-secondary: #1D4ED8;
--cookie-success: #10B981;
--cookie-error: #EF4444;
```

### Textos Personalizáveis
- Edite os textos em `cookie-banner.blade.php`
- Links para política de privacidade
- Mensagens de sucesso/erro

## 🔧 Configuração

### 1. Middleware (Opcional)
```php
// Em app/Http/Kernel.php
protected $middleware = [
    \App\Http\Middleware\CookieConsent::class,
];
```

### 2. Scripts de Terceiros
```blade
{{-- Google Analytics --}}
@if($consent['analytics'] ?? false)
    <!-- Seu código do GA aqui -->
@endif

{{-- Facebook Pixel --}}
@if($consent['marketing'] ?? false)
    <!-- Seu código do Pixel aqui -->
@endif
```

## 📊 Monitoramento

### Logs de Consentimento
```php
// Log quando consentimento é dado
Log::info('Cookie consent given', [
    'analytics' => $consent['analytics'],
    'marketing' => $consent['marketing'],
    'ip' => $request->ip(),
    'user_agent' => $request->userAgent()
]);
```

### Estatísticas
- Total de consentimentos
- Taxa de aceitação por categoria
- Tempo médio de decisão

## 🛡️ Conformidade Legal

### LGPD (Brasil)
- ✅ Consentimento explícito
- ✅ Opção de recusa
- ✅ Informações claras
- ✅ Fácil revogação

### GDPR (Europa)
- ✅ Consentimento granular
- ✅ Cookies não essenciais bloqueados
- ✅ Registro de consentimento
- ✅ Direito ao esquecimento

## 🚀 Próximos Passos

1. **Configurar Google Analytics** com ID real
2. **Configurar Facebook Pixel** com ID real
3. **Personalizar textos** conforme necessário
4. **Testar em diferentes navegadores**
5. **Implementar logs** de consentimento

## 📞 Suporte

Para dúvidas sobre o sistema de cookies:
- Email: suporte@laravelprostarter.com
- WhatsApp: +55 (11) 99999-9999
