<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\LeadCaptured;
use App\Mail\LeadConfirmation;
use App\Mail\GuideWelcomeMail;
use App\Mail\EducationValueMail;
use App\Mail\OfferConversionMail;
use App\Mail\ConversionInitialMail;
use App\Mail\ConversionSocialProofMail;
use App\Mail\ConversionScarcityMail;
use App\Mail\ConversionFinalMail;
use App\Models\Lead;
use Carbon\Carbon;

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

                      // Enviar sequência de emails automática
                      try {
                          // Email 1: Imediato - Guia de boas-vindas
                          Mail::to($request->email)->send(new GuideWelcomeMail($lead));
                          \Log::info('Email 1 (Guia) enviado para:', ['email' => $request->email]);
                          
                          // Email 2: +1 dia - Educação e valor
                          $this->scheduleEmail($lead, EducationValueMail::class, Carbon::now()->addDay());
                          
                          // Email 3: +2 dias - Oferta e conversão
                          $this->scheduleEmail($lead, OfferConversionMail::class, Carbon::now()->addDays(2));
                          
                          // Sequência de Conversão (após consumir o bônus)
                          // Email 4: +3 dias - Oferta inicial de conversão
                          $this->scheduleEmail($lead, ConversionInitialMail::class, Carbon::now()->addDays(3));
                          
                          // Email 5: +4 dias - Prova social
                          $this->scheduleEmail($lead, ConversionSocialProofMail::class, Carbon::now()->addDays(4));
                          
                          // Email 6: +5 dias - Escassez
                          $this->scheduleEmail($lead, ConversionScarcityMail::class, Carbon::now()->addDays(5));
                          
                          // Email 7: +7 dias - Última chamada
                          $this->scheduleEmail($lead, ConversionFinalMail::class, Carbon::now()->addDays(7));
                          
                      } catch (\Exception $e) {
                          \Log::error('Erro ao enviar sequência de emails:', ['error' => $e->getMessage()]);
                      }

            // Enviar notificação para admin
            try {
                $adminEmail = config('mail.admin_email', 'contato@leonardogeja.com.br');
                \Log::info('Enviando email para admin:', ['email' => $adminEmail]);
                Mail::to($adminEmail)->send(new LeadCaptured($leadData));
            } catch (\Exception $e) {
                \Log::error('Erro ao enviar notificação para admin:', ['error' => $e->getMessage()]);
            }

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

    /**
     * Agendar email para envio posterior
     */
    private function scheduleEmail($lead, $mailClass, $sendAt)
    {
        try {
            // Para simplificar, vamos usar delay no job
            // Em produção, você pode usar um sistema de filas mais robusto
            Mail::to($lead->email)->later($sendAt, new $mailClass($lead));
            \Log::info('Email agendado:', [
                'email' => $lead->email,
                'class' => $mailClass,
                'send_at' => $sendAt
            ]);
        } catch (\Exception $e) {
            \Log::error('Erro ao agendar email:', [
                'error' => $e->getMessage(),
                'class' => $mailClass
            ]);
        }
    }
}
