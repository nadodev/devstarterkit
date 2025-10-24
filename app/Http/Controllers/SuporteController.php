<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SuporteController extends Controller
{
    public function enviarTicket(Request $request)
    {
        // Validação dos dados
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'assunto' => 'required|string|max:255',
            'prioridade' => 'required|string|in:Baixa,Média,Alta,Urgente',
            'descricao' => 'required|string|max:2000'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Dados do ticket
            $dados = [
                'nome' => $request->nome,
                'email' => $request->email,
                'assunto' => $request->assunto,
                'prioridade' => $request->prioridade,
                'descricao' => $request->descricao,
                'data' => now()->format('d/m/Y H:i:s')
            ];

            // Email de destino (do .env)
            $emailDestino = env('MAIL_SUPPORT_EMAIL', env('MAIL_FROM_ADDRESS', 'suporte@laravelprostarter.com'));

            // Enviar email
            Mail::send('emails.ticket-suporte', $dados, function ($message) use ($dados, $emailDestino) {
                $message->to($emailDestino)
                    ->subject('[Ticket] ' . $dados['assunto'] . ' - ' . $dados['prioridade'])
                    ->replyTo($dados['email'], $dados['nome']);
            });

            return redirect()->back()->with('success', 'Ticket enviado com sucesso! Responderemos em até 24 horas.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Erro ao enviar ticket. Tente novamente ou entre em contato por email.')
                ->withInput();
        }
    }
}
