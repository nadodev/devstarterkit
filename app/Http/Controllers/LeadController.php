<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\LeadCaptured;
use App\Mail\LeadConfirmation;
use App\Models\Lead;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        \Log::info('Lead recebido:', $request->all());
        
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'whatsapp' => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            \Log::error('Validação falhou:', $validator->errors()->toArray());
            return response()->json([
                'success' => false,
                'message' => 'Dados inválidos. Verifique os campos e tente novamente.',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Salvar lead no banco de dados
            $lead = Lead::create([
                'name' => $request->name,
                'email' => $request->email,
                'whatsapp' => $request->whatsapp,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            $leadData = [
                'name' => $request->name,
                'email' => $request->email,
                'whatsapp' => $request->whatsapp,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'created_at' => now(),
            ];

            \Log::info('Lead salvo no banco:', ['lead_id' => $lead->id]);

            // Enviar email para o admin
            $adminEmail = config('mail.admin_email', 'contato@leonardogeja.com.br');
            \Log::info('Enviando email para admin:', ['email' => $adminEmail]);
            Mail::to($adminEmail)->send(new LeadCaptured($leadData));

            // Enviar email de confirmação para o lead
            \Log::info('Enviando email de confirmação para:', ['email' => $request->email]);
            Mail::to($request->email)->send(new LeadConfirmation($leadData));

            \Log::info('Lead processado com sucesso');

            return response()->json([
                'success' => true,
                'message' => 'Obrigado! Confira seu email para acessar o guia completo do DevStarter Kit.'
            ]);

        } catch (\Exception $e) {
            \Log::error('Erro ao processar lead: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'success' => false,
                'message' => 'Erro interno. Tente novamente em alguns minutos.'
            ], 500);
        }
    }
}
