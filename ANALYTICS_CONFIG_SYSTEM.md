# ⚙️ Sistema de Configuração de Analytics

## ✅ **Sistema Implementado:**

### **1. Página de Configuração Admin:**
- ✅ Interface amigável para configurar IDs
- ✅ Checkboxes para ativar/desativar serviços
- ✅ Teste de configurações em tempo real
- ✅ Validação de dados
- ✅ Persistência em arquivo JSON

### **2. Serviços Suportados:**
- ✅ **Google Analytics 4**: ID de medição (G-XXXXXXXXXX)
- ✅ **Facebook Pixel**: ID do pixel
- ✅ **Google Tag Manager**: ID do container (GTM-XXXXXXX)
- ✅ **Hotjar**: Site ID

### **3. Funcionalidades:**
- ✅ **Configuração via Admin**: Sem editar código
- ✅ **Ativação/Desativação**: Toggle individual
- ✅ **Teste de Configurações**: Verificar se IDs estão corretos
- ✅ **Persistência**: Salva em `storage/app/analytics_config.json`
- ✅ **Fallback**: Usa .env se não houver configuração admin

## 🧪 **Como Usar:**

### **1. Acessar Configuração:**
```
1. Acesse o painel admin
2. No sidebar, clique em "Config Analytics"
3. Ou acesse: /admin/analytics/config
```

### **2. Configurar IDs:**
```
1. Preencha os IDs dos serviços
2. Marque os checkboxes para ativar
3. Clique em "Salvar Configurações"
```

### **3. Testar Configurações:**
```
1. Clique em "Testar Configurações"
2. Verifique os resultados
3. Corrija se necessário
```

## 🔧 **IDs Necessários:**

### **1. Google Analytics 4:**
- **Onde obter**: https://analytics.google.com/
- **Formato**: G-XXXXXXXXXX
- **Exemplo**: G-ABC123DEF4

### **2. Facebook Pixel:**
- **Onde obter**: https://business.facebook.com/events_manager
- **Formato**: Números
- **Exemplo**: 123456789012345

### **3. Google Tag Manager:**
- **Onde obter**: https://tagmanager.google.com/
- **Formato**: GTM-XXXXXXX
- **Exemplo**: GTM-ABC1234

### **4. Hotjar:**
- **Onde obter**: https://www.hotjar.com/
- **Formato**: Números
- **Exemplo**: 1234567

## 🚀 **Estrutura do Sistema:**

### **1. Controller:**
```
app/Http/Controllers/Admin/AnalyticsConfigController.php
- index(): Exibir página de configuração
- store(): Salvar configurações
- test(): Testar configurações
```

### **2. Helper:**
```
app/Helpers/AnalyticsConfigHelper.php
- getConfig(): Obter configurações
- isGoogleAnalyticsEnabled(): Verificar se GA está ativo
- isFacebookPixelEnabled(): Verificar se FB está ativo
- isGTMEnabled(): Verificar se GTM está ativo
- isHotjarEnabled(): Verificar se Hotjar está ativo
```

### **3. View:**
```
resources/views/admin/analytics/config.blade.php
- Interface de configuração
- Formulário com validação
- Teste de configurações
```

### **4. Rotas:**
```
/admin/analytics/config (GET) - Exibir configuração
/admin/analytics/config (POST) - Salvar configuração
/admin/analytics/config/test (POST) - Testar configuração
```

## 📊 **Integração com Cookies:**

### **1. Scripts Condicionais:**
- ✅ **Analytics**: Google Analytics, Hotjar
- ✅ **Marketing**: Facebook Pixel, GTM
- ✅ **Consentimento**: Respeita preferências do usuário

### **2. Fallback:**
- ✅ **Admin Config**: Prioridade máxima
- ✅ **.env**: Fallback se não houver configuração admin
- ✅ **Padrão**: Desabilitado se não configurado

## 🎯 **Resultado Final:**

- ✅ **Configuração Fácil**: Interface amigável no admin
- ✅ **Sem Código**: Não precisa editar arquivos
- ✅ **Teste em Tempo Real**: Verificar se IDs estão corretos
- ✅ **Persistência**: Configurações salvas permanentemente
- ✅ **Integração**: Funciona com sistema de cookies
- ✅ **Fallback**: Sistema robusto com múltiplas opções

**Agora você pode configurar todos os IDs de analytics pelo admin!** 🎉
