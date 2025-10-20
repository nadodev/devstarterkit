<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\LeadConfirmation;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::orderBy('created_at', 'desc')->paginate(20);
        
        $stats = [
            'total' => Lead::count(),
            'pending' => Lead::pendingEmail()->count(),
            'sent' => Lead::emailSent()->count(),
        ];

        return view('admin.leads.index', compact('leads', 'stats'));
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
}