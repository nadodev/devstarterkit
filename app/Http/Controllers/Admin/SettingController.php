<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        $settings = [
            'site_name' => config('app.name', 'DevStarter Kit'),
            'site_description' => 'Plataforma de cursos online',
            'admin_email' => config('mail.admin_email', 'contato@leonardogeja.com.br'),
            'mail_from_name' => config('mail.from.name', 'DevStarter Kit'),
            'mail_from_address' => config('mail.from.address', 'contato@leonardogeja.com.br'),
            'mail_host' => config('mail.mailers.smtp.host', 'smtp.hostinger.com'),
            'mail_port' => config('mail.mailers.smtp.port', 587),
            'mail_username' => config('mail.mailers.smtp.username', 'contato@leonardogeja.com.br'),
            'mail_encryption' => config('mail.mailers.smtp.encryption', 'tls'),
        ];

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'required|string|max:500',
            'admin_email' => 'required|email|max:255',
            'mail_from_name' => 'required|string|max:255',
            'mail_from_address' => 'required|email|max:255',
            'mail_host' => 'required|string|max:255',
            'mail_port' => 'required|integer|min:1|max:65535',
            'mail_username' => 'required|string|max:255',
            'mail_password' => 'nullable|string|max:255',
            'mail_encryption' => 'required|in:tls,ssl,none',
        ]);

        try {
            // Atualizar arquivo .env
            $envPath = base_path('.env');
            $envContent = File::get($envPath);

            $updates = [
                'APP_NAME' => $request->site_name,
                'MAIL_FROM_NAME' => $request->mail_from_name,
                'MAIL_FROM_ADDRESS' => $request->mail_from_address,
                'MAIL_HOST' => $request->mail_host,
                'MAIL_PORT' => $request->mail_port,
                'MAIL_USERNAME' => $request->mail_username,
                'MAIL_ENCRYPTION' => $request->mail_encryption,
                'MAIL_ADMIN_EMAIL' => $request->admin_email,
            ];

            if ($request->filled('mail_password')) {
                $updates['MAIL_PASSWORD'] = $request->mail_password;
            }

            foreach ($updates as $key => $value) {
                $pattern = "/^{$key}=.*/m";
                $replacement = "{$key}={$value}";
                
                if (preg_match($pattern, $envContent)) {
                    $envContent = preg_replace($pattern, $replacement, $envContent);
                } else {
                    $envContent .= "\n{$replacement}";
                }
            }

            File::put($envPath, $envContent);

            // Limpar cache
            \Artisan::call('config:clear');
            \Artisan::call('cache:clear');

            return redirect()->back()->with('success', 'Configurações atualizadas com sucesso!');

        } catch (\Exception $e) {
            \Log::error('Erro ao atualizar configurações: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erro ao atualizar configurações: ' . $e->getMessage());
        }
    }

    public function testEmail(Request $request)
    {
        $request->validate([
            'test_email' => 'required|email',
        ]);

        try {
            $testData = [
                'name' => 'Teste',
                'email' => $request->test_email,
                'whatsapp' => '11999999999',
                'ip_address' => $request->ip(),
                'user_agent' => 'Teste de Email',
                'created_at' => now(),
            ];

            \Mail::to($request->test_email)->send(new \App\Mail\LeadConfirmation($testData));

            return response()->json([
                'success' => true,
                'message' => 'Email de teste enviado com sucesso!'
            ]);

        } catch (\Exception $e) {
            \Log::error('Erro ao enviar email de teste: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Erro ao enviar email: ' . $e->getMessage()
            ], 500);
        }
    }

    public function backup()
    {
        try {
            $backupPath = storage_path('backups');
            if (!File::exists($backupPath)) {
                File::makeDirectory($backupPath, 0755, true);
            }

            $filename = 'backup_' . date('Y-m-d_H-i-s') . '.sql';
            $filepath = $backupPath . '/' . $filename;

            // Comando mysqldump
            $command = sprintf(
                'mysqldump --user=%s --password=%s --host=%s %s > %s',
                config('database.connections.mysql.username'),
                config('database.connections.mysql.password'),
                config('database.connections.mysql.host'),
                config('database.connections.mysql.database'),
                $filepath
            );

            exec($command, $output, $returnCode);

            if ($returnCode === 0) {
                return response()->download($filepath, $filename)->deleteFileAfterSend(true);
            } else {
                return redirect()->back()->with('error', 'Erro ao criar backup do banco de dados');
            }

        } catch (\Exception $e) {
            \Log::error('Erro ao criar backup: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erro ao criar backup: ' . $e->getMessage());
        }
    }

    public function clearCache()
    {
        try {
            \Artisan::call('config:clear');
            \Artisan::call('cache:clear');
            \Artisan::call('route:clear');
            \Artisan::call('view:clear');

            return redirect()->back()->with('success', 'Cache limpo com sucesso!');

        } catch (\Exception $e) {
            \Log::error('Erro ao limpar cache: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erro ao limpar cache: ' . $e->getMessage());
        }
    }

    public function systemInfo()
    {
        $info = [
            'php_version' => PHP_VERSION,
            'laravel_version' => app()->version(),
            'server_software' => $_SERVER['SERVER_SOFTWARE'] ?? 'N/A',
            'database_driver' => config('database.default'),
            'cache_driver' => config('cache.default'),
            'queue_driver' => config('queue.default'),
            'disk_free_space' => $this->formatBytes(disk_free_space(storage_path())),
            'memory_limit' => ini_get('memory_limit'),
            'max_execution_time' => ini_get('max_execution_time'),
            'upload_max_filesize' => ini_get('upload_max_filesize'),
            'post_max_size' => ini_get('post_max_size'),
        ];

        return view('admin.settings.system', compact('info'));
    }

    private function formatBytes($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, $precision) . ' ' . $units[$i];
    }
}