<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class SpecialistController extends Controller
{
    public function sendMessage(Request $request)
    {
        // Validação dos dados
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'whatsapp' => 'nullable|string|max:20',
            'subject' => 'required|string|in:duvida-produto,suporte-tecnico,parceria,outros',
            'message' => 'required|string|max:2000',
            'captcha_answer' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Dados inválidos. Verifique os campos obrigatórios.',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Dados do formulário
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'whatsapp' => $request->whatsapp,
                'subject' => $request->subject,
                'message' => $request->message,
                'subject_text' => $this->getSubjectText($request->subject),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'timestamp' => now()->format('d/m/Y H:i:s'),
            ];

            // Log da mensagem
            Log::info('Nova mensagem de especialista recebida', $data);

            // Enviar email para o admin
            Mail::send('emails.specialist-message', $data, function ($message) use ($data) {
                $message->to('admin@devstarterkit.com', 'Admin DevStarter Kit')
                        ->subject('Nova mensagem de especialista: ' . $data['subject_text'])
                        ->replyTo($data['email'], $data['name']);
            });

            // Verificar se é um usuário cadastrado e gerar token se necessário
            $user = User::where('email', $data['email'])->first();
            if ($user && !$user->unsubscribe_token) {
                $user->generateUnsubscribeToken();
            }

            // Enviar email de confirmação para o usuário
            Mail::send('emails.specialist-confirmation', $data, function ($message) use ($data) {
                $message->to($data['email'], $data['name'])
                        ->subject('Mensagem recebida - DevStarter Kit');
            });

            return response()->json([
                'success' => true,
                'message' => 'Mensagem enviada com sucesso! Entraremos em contato em breve.'
            ]);

        } catch (\Exception $e) {
            Log::error('Erro ao enviar mensagem de especialista', [
                'error' => $e->getMessage(),
                'data' => $request->all()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Erro interno. Tente novamente em alguns minutos.'
            ], 500);
        }
    }

    private function getSubjectText($subject)
    {
        $subjects = [
            'duvida-produto' => 'Dúvida sobre produto',
            'suporte-tecnico' => 'Suporte técnico',
            'parceria' => 'Parceria',
            'outros' => 'Outros assuntos'
        ];

        return $subjects[$subject] ?? 'Outros assuntos';
    }
}