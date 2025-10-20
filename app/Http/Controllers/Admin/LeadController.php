<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\LeadConfirmation;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::orderBy('created_at', 'desc')->paginate(20);
        $templates = EmailTemplate::active()->get();
        
        $stats = [
            'total' => Lead::count(),
            'pending' => Lead::pendingEmail()->count(),
            'sent' => Lead::emailSent()->count(),
        ];

        return view('admin.leads.index', compact('leads', 'stats', 'templates'));
    }

    public function show(Lead $lead)
    {
        return view('admin.leads.show', compact('lead'));
    }

    public function sendEmail(Request $request, Lead $lead)
    {
        try {
            $leadData = [
                'name' => $lead->name ?? 'Amigo(a)',
                'email' => $lead->email,
            ];

            Mail::to($lead->email)->send(new LeadConfirmation($leadData));

            $lead->update([
                'email_sent' => true,
                'email_sent_at' => now(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Email enviado com sucesso!'
            ]);

        } catch (\Exception $e) {
            \Log::error('Erro ao enviar email para lead: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Erro ao enviar email. Tente novamente.'
            ], 500);
        }
    }

    public function sendBulkEmail(Request $request)
    {
        $request->validate([
            'lead_ids' => 'required|array',
            'lead_ids.*' => 'exists:leads,id',
        ]);

        $leads = Lead::whereIn('id', $request->lead_ids)->get();
        $sent = 0;
        $errors = [];

        foreach ($leads as $lead) {
            try {
                $leadData = [
                    'name' => $lead->name ?? 'Amigo(a)',
                    'email' => $lead->email,
                ];

                Mail::to($lead->email)->send(new LeadConfirmation($leadData));

                $lead->update([
                    'email_sent' => true,
                    'email_sent_at' => now(),
                ]);

                $sent++;

            } catch (\Exception $e) {
                $errors[] = "Erro ao enviar para {$lead->email}: " . $e->getMessage();
                \Log::error("Erro ao enviar email para lead {$lead->id}: " . $e->getMessage());
            }
        }

        return response()->json([
            'success' => true,
            'message' => "Emails enviados: {$sent} de " . count($leads),
            'errors' => $errors
        ]);
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();

        return response()->json([
            'success' => true,
            'message' => 'Lead removido com sucesso!'
        ]);
    }

    public function sendCustomEmail(Request $request, Lead $lead)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        try {
            // Processar variáveis no conteúdo
            $processedContent = $this->processEmailVariables($request->content, $lead);
            $processedSubject = $this->processEmailVariables($request->subject, $lead);
            
            // Criar um email customizado
            $emailData = [
                'name' => $lead->name ?? 'Amigo(a)',
                'email' => $lead->email,
                'subject' => $processedSubject,
                'content' => $processedContent,
            ];

            // Enviar email customizado
            Mail::send('emails.custom-marketing', $emailData, function ($message) use ($emailData, $lead) {
                $message->to($lead->email, $lead->name)
                        ->subject($emailData['subject']);
            });

            $lead->update(['email_sent' => true, 'email_sent_at' => now()]);

            return response()->json(['success' => true, 'message' => 'Email customizado enviado com sucesso!']);

        } catch (\Exception $e) {
            \Log::error('Erro ao enviar email customizado para lead ' . $lead->id . ': ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Erro ao enviar email: ' . $e->getMessage()], 500);
        }
    }

    public function sendTemplateEmail(Request $request, Lead $lead)
    {
        $request->validate([
            'template_id' => 'required|exists:email_templates,id',
        ]);

        try {
            $template = EmailTemplate::findOrFail($request->template_id);
            
            // Processar variáveis no template
            $processedContent = $this->processEmailVariables($template->content, $lead);
            $processedSubject = $this->processEmailVariables($template->subject, $lead);
            
            $emailData = [
                'name' => $lead->name ?? 'Amigo(a)',
                'email' => $lead->email,
                'subject' => $processedSubject,
                'content' => $processedContent,
            ];

            // Enviar email com template
            Mail::send('emails.template-marketing', $emailData, function ($message) use ($emailData, $lead) {
                $message->to($lead->email, $lead->name)
                        ->subject($emailData['subject']);
            });

            $lead->update(['email_sent' => true, 'email_sent_at' => now()]);

            return response()->json(['success' => true, 'message' => 'Email com template enviado com sucesso!']);

        } catch (\Exception $e) {
            \Log::error('Erro ao enviar email com template para lead ' . $lead->id . ': ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Erro ao enviar email: ' . $e->getMessage()], 500);
        }
    }

    public function sendBulkCustomEmail(Request $request)
    {
        $request->validate([
            'lead_ids' => 'required|array',
            'lead_ids.*' => 'exists:leads,id',
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $leads = Lead::whereIn('id', $request->lead_ids)->get();
        $sentCount = 0;

        foreach ($leads as $lead) {
            try {
                // Processar variáveis para cada lead
                $processedContent = $this->processEmailVariables($request->content, $lead);
                $processedSubject = $this->processEmailVariables($request->subject, $lead);
                
                $emailData = [
                    'name' => $lead->name ?? 'Amigo(a)',
                    'email' => $lead->email,
                    'subject' => $processedSubject,
                    'content' => $processedContent,
                ];

                Mail::send('emails.custom-marketing', $emailData, function ($message) use ($emailData, $lead) {
                    $message->to($lead->email, $lead->name)
                            ->subject($emailData['subject']);
                });

                $lead->update(['email_sent' => true, 'email_sent_at' => now()]);
                $sentCount++;

            } catch (\Exception $e) {
                \Log::error('Erro ao enviar email em massa para lead ' . $lead->id . ': ' . $e->getMessage());
            }
        }

        return response()->json(['success' => true, 'message' => "{$sentCount} emails customizados enviados com sucesso!"]);
    }

    public function sendBulkTemplateEmail(Request $request)
    {
        $request->validate([
            'lead_ids' => 'required|array',
            'lead_ids.*' => 'exists:leads,id',
            'template_id' => 'required|exists:email_templates,id',
        ]);

        $template = EmailTemplate::findOrFail($request->template_id);
        $leads = Lead::whereIn('id', $request->lead_ids)->get();
        $sentCount = 0;

        foreach ($leads as $lead) {
            try {
                // Processar variáveis para cada lead
                $processedContent = $this->processEmailVariables($template->content, $lead);
                $processedSubject = $this->processEmailVariables($template->subject, $lead);
                
                $emailData = [
                    'name' => $lead->name ?? 'Amigo(a)',
                    'email' => $lead->email,
                    'subject' => $processedSubject,
                    'content' => $processedContent,
                ];

                Mail::send('emails.template-marketing', $emailData, function ($message) use ($emailData, $lead) {
                    $message->to($lead->email, $lead->name)
                            ->subject($emailData['subject']);
                });

                $lead->update(['email_sent' => true, 'email_sent_at' => now()]);
                $sentCount++;

            } catch (\Exception $e) {
                \Log::error('Erro ao enviar email com template em massa para lead ' . $lead->id . ': ' . $e->getMessage());
            }
        }

        return response()->json(['success' => true, 'message' => "{$sentCount} emails com template enviados com sucesso!"]);
    }

    /**
     * Processar variáveis no conteúdo do email
     */
    private function processEmailVariables($content, $lead)
    {
        $variables = [
            '{{name}}' => $lead->name ?? 'Amigo(a)',
            '{{email}}' => $lead->email,
            '{{whatsapp}}' => $lead->whatsapp ?? 'Não informado',
        ];

        return str_replace(array_keys($variables), array_values($variables), $content);
    }
}