<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmailController extends Controller
{
    public function unsubscribe(Request $request)
    {
        $token = $request->get('token');
        $email = $request->get('email');

        if (!$token && !$email) {
            return view('emails.unsubscribe-error', [
                'message' => 'Link inválido. Token ou email não fornecido.'
            ]);
        }

        try {
            $user = null;
            $lead = null;

            // Debug logs
            Log::info('Tentativa de unsubscribe', [
                'token' => $token,
                'email' => $email,
                'request_all' => $request->all()
            ]);

            if ($token) {
                // Buscar por token (usuário cadastrado)
                $user = User::where('unsubscribe_token', $token)->first();
                Log::info('Busca por token', ['user_found' => $user ? 'sim' : 'não']);
            } else {
                // Buscar por email (pode ser usuário ou lead)
                $user = User::where('email', $email)->first();
                Log::info('Busca por email - usuário', ['user_found' => $user ? 'sim' : 'não']);
                
                if (!$user) {
                    // Se não for usuário, buscar como lead
                    $lead = Lead::where('email', $email)->first();
                    Log::info('Busca por email - lead', ['lead_found' => $lead ? 'sim' : 'não']);
                }
            }

            if (!$user && !$lead) {
                Log::info('Nenhum usuário ou lead encontrado', [
                    'email' => $email,
                    'token' => $token
                ]);
                return view('emails.unsubscribe-error', [
                    'message' => 'Email não encontrado em nossa base de dados. Verifique se o link está correto.'
                ]);
            }

            // Se for usuário cadastrado
            if ($user) {
                $user->unsubscribe();
                
                Log::info('Usuário desinscrito de emails', [
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'method' => $token ? 'token' : 'email'
                ]);

                return view('emails.unsubscribe-success', [
                    'user' => $user,
                    'resubscribe_token' => $user->generateUnsubscribeToken()
                ]);
            }

            // Se for lead (não cadastrado)
            if ($lead) {
                // Marcar lead como desinscrito
                $lead->update(['email_sent' => false]);
                
                Log::info('Lead desinscrito de emails', [
                    'lead_id' => $lead->id,
                    'email' => $lead->email,
                    'method' => 'email'
                ]);

                return view('emails.unsubscribe-success', [
                    'user' => (object) [
                        'name' => $lead->name ?? 'Amigo(a)',
                        'email' => $lead->email
                    ],
                    'resubscribe_token' => null,
                    'is_lead' => true
                ]);
            }

        } catch (\Exception $e) {
            Log::error('Erro ao processar unsubscribe', [
                'error' => $e->getMessage(),
                'token' => $token,
                'email' => $email
            ]);

            return view('emails.unsubscribe-error', [
                'message' => 'Erro interno. Tente novamente mais tarde.'
            ]);
        }
    }

    public function resubscribe(Request $request)
    {
        $token = $request->get('token');
        $email = $request->get('email');

        if (!$token && !$email) {
            return view('emails.resubscribe-error', [
                'message' => 'Link inválido. Token ou email não fornecido.'
            ]);
        }

        try {
            $user = null;
            $lead = null;

            if ($token) {
                // Buscar por token (usuário cadastrado)
                $user = User::where('unsubscribe_token', $token)->first();
            } else {
                // Buscar por email (pode ser usuário ou lead)
                $user = User::where('email', $email)->first();
                if (!$user) {
                    // Se não for usuário, buscar como lead
                    $lead = Lead::where('email', $email)->first();
                }
            }

            if (!$user && !$lead) {
                return view('emails.resubscribe-error', [
                    'message' => 'Email não encontrado em nossa base de dados. Verifique se o link está correto.'
                ]);
            }

            // Se for usuário cadastrado
            if ($user) {
                $user->resubscribe();
                
                Log::info('Usuário reativou emails', [
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'method' => $token ? 'token' : 'email'
                ]);

                return view('emails.resubscribe-success', [
                    'user' => $user
                ]);
            }

            // Se for lead (não cadastrado)
            if ($lead) {
                // Reativar lead para receber emails
                $lead->update(['email_sent' => true]);
                
                Log::info('Lead reativou emails', [
                    'lead_id' => $lead->id,
                    'email' => $lead->email,
                    'method' => 'email'
                ]);

                return view('emails.resubscribe-success', [
                    'user' => (object) [
                        'name' => $lead->name ?? 'Amigo(a)',
                        'email' => $lead->email
                    ],
                    'is_lead' => true
                ]);
            }

        } catch (\Exception $e) {
            Log::error('Erro ao processar resubscribe', [
                'error' => $e->getMessage(),
                'token' => $token,
                'email' => $email
            ]);

            return view('emails.resubscribe-error', [
                'message' => 'Erro interno. Tente novamente mais tarde.'
            ]);
        }
    }
}