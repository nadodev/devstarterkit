<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Course;
use App\Models\User;
use App\Models\Enrollment;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        // Estatísticas gerais
        $stats = [
            'total_users' => User::count(),
            'total_courses' => Course::count(),
            'total_leads' => Lead::count(),
            'total_enrollments' => Enrollment::count(),
            'total_certificates' => Certificate::count(),
        ];

        // Leads por mês (últimos 6 meses)
        $leadsByMonth = Lead::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as count')
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Cursos mais populares
        $popularCourses = Course::withCount('enrollments')
            ->orderBy('enrollments_count', 'desc')
            ->limit(5)
            ->get();

        // Usuários por role
        $usersByRole = User::selectRaw('role, COUNT(*) as count')
            ->groupBy('role')
            ->get();

        // Leads por status
        $leadsByStatus = [
            'pending' => Lead::pendingEmail()->count(),
            'sent' => Lead::emailSent()->count(),
        ];

        // Cursos por status
        $coursesByStatus = [
            'published' => Course::where('is_published', true)->count(),
            'draft' => Course::where('is_published', false)->count(),
        ];

        // Inscrições por mês
        $enrollmentsByMonth = Enrollment::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as count')
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('admin.reports.index', compact(
            'stats',
            'leadsByMonth',
            'popularCourses',
            'usersByRole',
            'leadsByStatus',
            'coursesByStatus',
            'enrollmentsByMonth'
        ));
    }

    public function leads()
    {
        $leads = Lead::orderBy('created_at', 'desc')->paginate(50);
        
        $stats = [
            'total' => Lead::count(),
            'pending' => Lead::pendingEmail()->count(),
            'sent' => Lead::emailSent()->count(),
            'this_month' => Lead::whereMonth('created_at', Carbon::now()->month)->count(),
            'last_month' => Lead::whereMonth('created_at', Carbon::now()->subMonth()->month)->count(),
        ];

        return view('admin.reports.leads', compact('leads', 'stats'));
    }

    public function courses()
    {
        $courses = Course::with(['user', 'category', 'enrollments'])
            ->withCount('enrollments')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $stats = [
            'total' => Course::count(),
            'published' => Course::where('is_published', true)->count(),
            'draft' => Course::where('is_published', false)->count(),
            'total_enrollments' => Enrollment::count(),
            'avg_enrollments' => Course::withCount('enrollments')->avg('enrollments_count'),
        ];

        return view('admin.reports.courses', compact('courses', 'stats'));
    }

    public function users()
    {
        $users = User::withCount(['enrollments', 'certificates'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $stats = [
            'total' => User::count(),
            'students' => User::where('role', 'student')->count(),
            'instructors' => User::where('role', 'instructor')->count(),
            'admins' => User::where('role', 'admin')->count(),
            'active_this_month' => User::whereMonth('created_at', Carbon::now()->month)->count(),
        ];

        return view('admin.reports.users', compact('users', 'stats'));
    }

    public function export(Request $request)
    {
        $type = $request->get('type', 'leads');
        $format = $request->get('format', 'csv');

        switch ($type) {
            case 'leads':
                return $this->exportLeads($format);
            case 'courses':
                return $this->exportCourses($format);
            case 'users':
                return $this->exportUsers($format);
            default:
                return redirect()->back()->with('error', 'Tipo de relatório inválido');
        }
    }

    private function exportLeads($format)
    {
        $leads = Lead::orderBy('created_at', 'desc')->get();
        
        if ($format === 'csv') {
            $filename = 'leads_' . date('Y-m-d_H-i-s') . '.csv';
            
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ];

            $callback = function() use ($leads) {
                $file = fopen('php://output', 'w');
                
                // Cabeçalho
                fputcsv($file, ['ID', 'Nome', 'Email', 'WhatsApp', 'IP', 'Email Enviado', 'Data Envio', 'Criado em']);
                
                // Dados
                foreach ($leads as $lead) {
                    fputcsv($file, [
                        $lead->id,
                        $lead->name,
                        $lead->email,
                        $lead->whatsapp,
                        $lead->ip_address,
                        $lead->email_sent ? 'Sim' : 'Não',
                        $lead->email_sent_at ? $lead->email_sent_at->format('d/m/Y H:i') : '',
                        $lead->created_at->format('d/m/Y H:i')
                    ]);
                }
                
                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        }

        return redirect()->back()->with('error', 'Formato não suportado');
    }

    private function exportCourses($format)
    {
        $courses = Course::with(['user', 'category'])->get();
        
        if ($format === 'csv') {
            $filename = 'cursos_' . date('Y-m-d_H-i-s') . '.csv';
            
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ];

            $callback = function() use ($courses) {
                $file = fopen('php://output', 'w');
                
                // Cabeçalho
                fputcsv($file, ['ID', 'Título', 'Instrutor', 'Categoria', 'Status', 'Duração', 'Inscrições', 'Criado em']);
                
                // Dados
                foreach ($courses as $course) {
                    fputcsv($file, [
                        $course->id,
                        $course->title,
                        $course->user->name,
                        $course->category->name,
                        $course->is_published ? 'Publicado' : 'Rascunho',
                        $course->duration_hours . 'h',
                        $course->enrollments_count ?? 0,
                        $course->created_at->format('d/m/Y H:i')
                    ]);
                }
                
                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        }

        return redirect()->back()->with('error', 'Formato não suportado');
    }

    private function exportUsers($format)
    {
        $users = User::withCount(['enrollments', 'certificates'])->get();
        
        if ($format === 'csv') {
            $filename = 'usuarios_' . date('Y-m-d_H-i-s') . '.csv';
            
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ];

            $callback = function() use ($users) {
                $file = fopen('php://output', 'w');
                
                // Cabeçalho
                fputcsv($file, ['ID', 'Nome', 'Email', 'Role', 'Inscrições', 'Certificados', 'Criado em']);
                
                // Dados
                foreach ($users as $user) {
                    fputcsv($file, [
                        $user->id,
                        $user->name,
                        $user->email,
                        ucfirst($user->role),
                        $user->enrollments_count,
                        $user->certificates_count,
                        $user->created_at->format('d/m/Y H:i')
                    ]);
                }
                
                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        }

        return redirect()->back()->with('error', 'Formato não suportado');
    }
}