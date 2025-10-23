<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validação dos dados
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
            'privacy' => 'required|accepted'
        ], [
            'name.required' => 'O nome é obrigatório.',
            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'Por favor, insira um e-mail válido.',
            'subject.required' => 'Por favor, selecione um assunto.',
            'message.required' => 'A mensagem é obrigatória.',
            'message.max' => 'A mensagem não pode ter mais de 2000 caracteres.',
            'privacy.required' => 'Você deve aceitar a política de privacidade.',
            'privacy.accepted' => 'Você deve aceitar a política de privacidade.'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Dados do formulário
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message,
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'timestamp' => now()->format('d/m/Y H:i:s')
            ];

            // Enviar e-mail para o administrador
            Mail::send('emails.contact', $data, function ($message) use ($data) {
                $message->to(env('MAIL_FROM_ADDRESS', 'contato@devstarterkit.com'))
                        ->subject('Nova mensagem de contato - ' . $data['subject'])
                        ->replyTo($data['email'], $data['name']);
            });

            // E-mail de confirmação para o usuário
            Mail::send('emails.contact-confirmation', $data, function ($message) use ($data) {
                $message->to($data['email'], $data['name'])
                        ->subject('Recebemos sua mensagem - DevStarter Kit');
            });

            return response()->json([
                'success' => true,
                'message' => 'Mensagem enviada com sucesso! Entraremos em contato em breve.'
            ]);

        } catch (\Exception $e) {
            \Log::error('Erro ao enviar e-mail de contato: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Erro ao enviar mensagem. Tente novamente ou entre em contato por e-mail.'
            ], 500);
        }
    }
}
