<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\LeadCaptured;

class TestEmail extends Command
{
    protected $signature = 'test:email';
    protected $description = 'Test email sending';

    public function handle()
    {
        $leadData = [
            'name' => 'Teste',
            'email' => 'teste@example.com',
            'whatsapp' => '11999999999',
            'ip_address' => '127.0.0.1',
            'user_agent' => 'Test',
            'created_at' => now(),
        ];

        try {
            $this->info('Enviando email de teste...');
            Mail::to('admin@devstarterkit.com')->send(new LeadCaptured($leadData));
            $this->info('Email enviado com sucesso!');
        } catch (\Exception $e) {
            $this->error('Erro ao enviar email: ' . $e->getMessage());
        }
    }
}