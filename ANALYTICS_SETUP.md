# 📊 Sistema de Analytics - Laravel ProStarter

## 🎯 **Visão Geral**

Sistema completo de analytics e tracking para o Laravel ProStarter, incluindo:
- Google Analytics 4
- Facebook Pixel
- Hotjar (heatmaps)
- Google Tag Manager
- Sistema de cookies LGPD/GDPR compliant

## 🚀 **Configuração Rápida**

### 1. **Configurar IDs no .env**
```env
# Google Analytics 4
GA_MEASUREMENT_ID=G-XXXXXXXXXX
GA_ENABLED=true

# Facebook Pixel
FB_PIXEL_ID=XXXXXXXXXXXXXXX
FB_PIXEL_ENABLED=true

# Hotjar (Opcional)
HOTJAR_SITE_ID=XXXXXXX
HOTJAR_ENABLED=true

# Google Tag Manager (Opcional)
GTM_CONTAINER_ID=GTM-XXXXXXX
GTM_ENABLED=false
```

### 2. **Obter IDs Reais**

#### **Google Analytics 4:**
1. Acesse: https://analytics.google.com/
2. Crie uma propriedade
3. Copie o "ID de medição" (G-XXXXXXXXXX)
4. Cole no `GA_MEASUREMENT_ID`

#### **Facebook Pixel:**
1. Acesse: https://business.facebook.com/events_manager
2. Crie um pixel
3. Copie o "ID do Pixel" (números)
4. Cole no `FB_PIXEL_ID`

#### **Hotjar:**
1. Acesse: https://www.hotjar.com/
2. Crie uma conta
3. Copie o "Site ID" (números)
4. Cole no `HOTJAR_SITE_ID`

## 📈 **Eventos Rastreados**

### **Automáticos:**
- `page_view` - Visualização da página
- `scroll` - Scroll de 50%
- `engagement_time` - 30 segundos na página
- `deep_scroll` - Scroll de 75%
- `time_on_page` - 2 minutos na página

### **Interações:**
- `cta_click` - Clique em botões de compra
- `video_click` - Clique no vídeo
- `faq_interaction` - Expansão de FAQ

### **Conversões:**
- `purchase` - Compra realizada
- `lead` - Lead gerado
- `add_to_cart` - Adicionado ao carrinho

## 🍪 **Sistema de Cookies**

### **Tipos de Cookies:**
1. **Essenciais** - Sempre ativos (funcionamento do site)
2. **Analíticos** - Google Analytics, Hotjar
3. **Marketing** - Facebook Pixel, remarketing

### **Funcionalidades:**
- Banner de consentimento
- Modal de personalização
- Cards clicáveis
- Armazenamento seguro
- Revogação a qualquer momento

## 📊 **Dashboard de Analytics**

### **Acesso:**
```
/admin/analytics
```

### **Métricas Disponíveis:**
- Visitantes únicos
- Taxa de conversão
- Tempo médio na página
- Taxa de rejeição
- Páginas mais visitadas
- Fontes de tráfego
- Funil de conversão
- Eventos rastreados

## 🔧 **Implementação Técnica**

### **Arquivos Criados:**
```
config/analytics.php
app/Http/Controllers/AnalyticsController.php
app/Http/Controllers/CookieController.php
app/Helpers/CookieHelper.php
resources/views/components/cookie-banner.blade.php
resources/views/components/cookie-scripts.blade.php
resources/views/admin/analytics/dashboard.blade.php
```

### **Rotas Adicionadas:**
```php
Route::get('/admin/analytics', [AnalyticsController::class, 'dashboard']);
Route::get('/admin/analytics/api', [AnalyticsController::class, 'api']);
Route::post('/cookies/consent', [CookieController::class, 'saveConsent']);
Route::get('/cookies/consent', [CookieController::class, 'getConsent']);
Route::delete('/cookies/consent', [CookieController::class, 'revokeConsent']);
```

## 🎯 **Como Usar**

### **1. Tracking Manual:**
```javascript
// Rastrear evento personalizado
trackConversion('custom_event', 100.00);

// Rastrear compra
trackConversion('purchase', 97.00);

// Rastrear lead
trackConversion('lead');
```

### **2. Verificar Consentimento:**
```php
// No backend
if (CookieHelper::analyticsAccepted()) {
    // Carregar scripts de analytics
}

if (CookieHelper::marketingAccepted()) {
    // Carregar scripts de marketing
}
```

### **3. Dashboard:**
```php
// Acessar dashboard
return redirect()->route('analytics.dashboard');
```

## 📱 **Responsividade**

- ✅ Mobile-first design
- ✅ Cards clicáveis em touch
- ✅ Banner responsivo
- ✅ Modal adaptável
- ✅ Dashboard responsivo

## 🔒 **Privacidade e LGPD**

### **Conformidade:**
- ✅ LGPD (Lei Geral de Proteção de Dados)
- ✅ GDPR (General Data Protection Regulation)
- ✅ Consentimento explícito
- ✅ Opção de opt-out
- ✅ Transparência total

### **Dados Coletados:**
- Páginas visitadas
- Tempo de permanência
- Origem do tráfego
- Dispositivo usado
- Localização geográfica
- Comportamento de navegação
- Interações com elementos

## 🚀 **Próximos Passos**

### **1. Configurar IDs Reais:**
- Obter IDs do Google Analytics
- Configurar Facebook Pixel
- Ativar Hotjar (opcional)

### **2. Testar Sistema:**
- Verificar banner de cookies
- Testar eventos no console
- Validar dashboard

### **3. Otimizar:**
- Analisar dados coletados
- Ajustar campanhas
- Melhorar conversão

## 📞 **Suporte**

Para dúvidas ou problemas:
- Verifique os logs do Laravel
- Teste no console do navegador
- Valide configurações do .env
- Confirme IDs dos serviços

## 🎉 **Resultado Final**

Com este sistema você terá:
- 📊 Analytics completo
- 🎯 Tracking de conversões
- 🍪 Cookies LGPD compliant
- 📱 Dashboard responsivo
- 🔒 Privacidade garantida
- 🚀 Dados para otimização

**Sistema pronto para produção!** 🎊
