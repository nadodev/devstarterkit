# 🧪 **Teste de Emails Agendados - Configuração Rápida**

## ⚙️ **Configuração para Teste (Minutos):**

### **📧 Sequência de Emails para Teste:**
- **Email 1:** Imediato (Guia de boas-vindas)
- **Email 2:** +1 minuto (Educação e valor)
- **Email 3:** +2 minutos (Oferta e conversão)
- **Email 4:** +3 minutos (Oferta inicial)
- **Email 5:** +4 minutos (Prova social)
- **Email 6:** +5 minutos (Escassez)
- **Email 7:** +7 minutos (Última chamada)

## 🚀 **Como Testar:**

### **1. Teste Local (Desenvolvimento):**
```bash
# Terminal 1 - Processar emails
php artisan queue:work --timeout=60

# Terminal 2 - Testar formulário
php artisan serve --port=8000
```

### **2. Teste no Servidor:**
```bash
# Configurar cron job para teste
* * * * * cd /home/u936696961/domains/leonardogeja.com.br/public_html/devstarterkit && php artisan schedule:run >> /dev/null 2>&1
```

## 📊 **Monitoramento do Teste:**

### **1. Verificar Jobs na Fila:**
```bash
php artisan tinker --execute="echo 'Jobs na fila: ' . \DB::table('jobs')->count();"
```

### **2. Verificar Logs:**
```bash
tail -f storage/logs/laravel.log
```

### **3. Verificar Emails Enviados:**
```bash
# Verificar tabela de leads
php artisan tinker --execute="echo 'Leads: ' . \App\Models\Lead::count();"
```

## 🎯 **Passo a Passo do Teste:**

### **1. Preparar o Sistema:**
```bash
# Limpar jobs antigos
php artisan queue:clear

# Limpar cache
php artisan config:clear
```

### **2. Executar Teste:**
1. **Acesse a landing page**
2. **Preencha o formulário** com seu email
3. **Aguarde 1 minuto** - Email 2 deve ser enviado
4. **Aguarde 2 minutos** - Email 3 deve ser enviado
5. **Continue até 7 minutos** - Todos os emails devem ser enviados

### **3. Verificar Resultados:**
- **Dashboard Admin:** `/admin/leads`
- **Logs:** `storage/logs/laravel.log`
- **Caixa de Email:** Verificar recebimento

## 🔄 **Após o Teste - Voltar para Produção:**

### **Restaurar Intervalos Normais:**
```php
// Email 2: +1 dia
$this->scheduleEmail($lead, EducationValueMail::class, Carbon::now()->addDay());

// Email 3: +2 dias  
$this->scheduleEmail($lead, OfferConversionMail::class, Carbon::now()->addDays(2));

// Email 4: +3 dias
$this->scheduleEmail($lead, ConversionInitialMail::class, Carbon::now()->addDays(3));

// Email 5: +4 dias
$this->scheduleEmail($lead, ConversionSocialProofMail::class, Carbon::now()->addDays(4));

// Email 6: +5 dias
$this->scheduleEmail($lead, ConversionScarcityMail::class, Carbon::now()->addDays(5));

// Email 7: +7 dias
$this->scheduleEmail($lead, ConversionFinalMail::class, Carbon::now()->addDays(7));
```

## ⚠️ **Importante:**
- **Teste apenas com seu email** para não spammar outros usuários
- **Após o teste, restaurar** os intervalos normais
- **Limpar jobs antigos** antes de voltar para produção
