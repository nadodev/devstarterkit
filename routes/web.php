<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\Admin\LeadController as AdminLeadController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;

// Rotas públicas
// Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/', function() {
    return view('conversion');
})->name('home');

Route::get('/landing', [HomeController::class, 'landing'])->name('landing');
Route::get('/conversion', function() {
    return view('conversion');
})->name('conversion');
Route::get('/thank-you', function() {
    return view('thank-you');
});
Route::get('/privacy-policy', function() {
    return view('privacy-policy');
})->name('privacy-policy');
Route::get('/help-center', function() {
    return view('help-center');
})->name('help-center');
Route::get('/conversion/documentation', function() {
    return view('documentation');
})->name('documentation');
Route::get('/contact', function() {
    return view('contact');
})->name('contact');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

// Novas páginas
Route::get('/politica', function() {
    return view('politica');
})->name('politica');

Route::get('/suporte', function() {
    return view('suporte');
})->name('suporte');

Route::post('/suporte/ticket', [App\Http\Controllers\SuporteController::class, 'enviarTicket'])->name('suporte.ticket');

// Cookie Consent Routes
Route::post('/cookies/consent', [App\Http\Controllers\CookieController::class, 'saveConsent'])->name('cookies.consent');
Route::get('/cookies/consent', [App\Http\Controllers\CookieController::class, 'getConsent'])->name('cookies.get');
Route::delete('/cookies/consent', [App\Http\Controllers\CookieController::class, 'revokeConsent'])->name('cookies.revoke');

// Analytics Dashboard Routes
Route::middleware('auth')->group(function () {
    Route::get('/admin/analytics', [App\Http\Controllers\AnalyticsController::class, 'dashboard'])->name('analytics.dashboard');
    Route::get('/admin/analytics/api', [App\Http\Controllers\AnalyticsController::class, 'api'])->name('analytics.api');
});

// Analytics Configuration Routes
Route::middleware('auth')->group(function () {
    Route::get('/admin/analytics/config', [App\Http\Controllers\Admin\AnalyticsConfigController::class, 'index'])->name('admin.analytics.config');
    Route::post('/admin/analytics/config', [App\Http\Controllers\Admin\AnalyticsConfigController::class, 'store'])->name('admin.analytics.config.store');
    Route::post('/admin/analytics/config/test', [App\Http\Controllers\Admin\AnalyticsConfigController::class, 'test'])->name('admin.analytics.config.test');
});
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/courses', [HomeController::class, 'courses'])->name('courses.index');
Route::get('/courses/{course}', [HomeController::class, 'showCourse'])->name('courses.show');

// Rotas de Produtos/Serviços
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');
Route::get('/products/category/{category}', [App\Http\Controllers\ProductController::class, 'category'])->name('products.category');

// Rota para envio de mensagem de especialista
Route::post('/specialist/send-message', [App\Http\Controllers\SpecialistController::class, 'sendMessage'])->name('specialist.send-message');

// Rotas de controle de email
Route::get('/email/unsubscribe', [App\Http\Controllers\EmailController::class, 'unsubscribe'])->name('email.unsubscribe');
Route::get('/email/resubscribe', [App\Http\Controllers\EmailController::class, 'resubscribe'])->name('email.resubscribe');

// Sitemap
Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap');

// Rotas de captura de leads
Route::post('/leads', [App\Http\Controllers\LeadController::class, 'store'])->name('leads.store');

// Rotas de autenticação
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rotas protegidas
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Rotas de perfil
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Rotas de inscrição
    Route::post('/courses/{course}/enroll', [EnrollmentController::class, 'enroll'])->name('courses.enroll');
    Route::delete('/courses/{course}/unenroll', [EnrollmentController::class, 'unenroll'])->name('courses.unenroll');
    
    // Rotas para estudantes - meus cursos
    Route::get('/my-courses', [StudentCourseController::class, 'index'])->name('student.courses.index');
    Route::get('/my-courses/{course}', [StudentCourseController::class, 'show'])->name('student.courses.show');
    Route::get('/my-courses/{course}/lesson/{lesson}', [StudentCourseController::class, 'lesson'])->name('student.courses.lesson');
    Route::post('/my-courses/{course}/lesson/{lesson}/complete', [StudentCourseController::class, 'markComplete'])->name('student.courses.complete');
    
    // Quiz routes
    Route::get('/my-courses/{course}/lesson/{lesson}/quiz/{quiz}', [QuizController::class, 'show'])->name('quiz.show');
    Route::post('/my-courses/{course}/lesson/{lesson}/quiz/{quiz}/submit', [QuizController::class, 'submit'])->name('quiz.submit');
    Route::post('/my-courses/{course}/lesson/{lesson}/quiz/{quiz}/choose', [QuizController::class, 'chooseResult'])->name('quiz.choose');
    
    // Rotas de comentários
    Route::get('/my-courses/{course}/lesson/{lesson}/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::post('/my-courses/{course}/lesson/{lesson}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/my-courses/{course}/lesson/{lesson}/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    
// Certificate routes
Route::get('/certificates', [App\Http\Controllers\CertificateController::class, 'index'])->name('certificates.index');
Route::get('/certificates/{certificate}', [App\Http\Controllers\CertificateController::class, 'show'])->name('certificates.show');
Route::post('/courses/{course}/generate-certificate', [App\Http\Controllers\CertificateController::class, 'generate'])->name('certificates.generate');
Route::get('/certificates/{certificate}/download', [App\Http\Controllers\CertificateController::class, 'download'])->name('certificates.download');
Route::get('/validate-certificate', [App\Http\Controllers\CertificateController::class, 'validateCertificate'])->name('certificates.validate');
    
    // Rotas de cursos para instrutores (temporariamente sem middleware de role)
    Route::resource('instructor/courses', CourseController::class)->names([
        'index' => 'instructor.courses.index',
        'create' => 'instructor.courses.create',
        'store' => 'instructor.courses.store',
        'show' => 'instructor.courses.show',
        'edit' => 'instructor.courses.edit',
        'update' => 'instructor.courses.update',
        'destroy' => 'instructor.courses.destroy',
    ]);

    // Rotas de módulos
    Route::get('/instructor/courses/{course}/modules/create', [ModuleController::class, 'create'])->name('instructor.modules.create');
    Route::post('/instructor/courses/{course}/modules', [ModuleController::class, 'store'])->name('instructor.modules.store');
    Route::get('/instructor/courses/{course}/modules/{module}/edit', [ModuleController::class, 'edit'])->name('instructor.modules.edit');
    Route::put('/instructor/courses/{course}/modules/{module}', [ModuleController::class, 'update'])->name('instructor.modules.update');
    Route::delete('/instructor/courses/{course}/modules/{module}', [ModuleController::class, 'destroy'])->name('instructor.modules.destroy');

    // Rotas de aulas
    Route::get('/instructor/courses/{course}/modules/{module}/lessons/create', [LessonController::class, 'create'])->name('instructor.lessons.create');
    Route::post('/instructor/courses/{course}/modules/{module}/lessons', [LessonController::class, 'store'])->name('instructor.lessons.store');
    Route::get('/instructor/courses/{course}/modules/{module}/lessons/{lesson}/edit', [LessonController::class, 'edit'])->name('instructor.lessons.edit');
    Route::put('/instructor/courses/{course}/modules/{module}/lessons/{lesson}', [LessonController::class, 'update'])->name('instructor.lessons.update');
    Route::delete('/instructor/courses/{course}/modules/{module}/lessons/{lesson}', [LessonController::class, 'destroy'])->name('instructor.lessons.destroy');
    
    // Rota para download de arquivos de aulas
    Route::get('/lesson-files/{lesson}', [LessonController::class, 'downloadFile'])->name('lesson.file.download');
});

// Rotas do Admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Gerenciamento de Leads
    Route::get('/leads', [AdminLeadController::class, 'index'])->name('leads.index');
    Route::get('/leads/{lead}', [AdminLeadController::class, 'show'])->name('leads.show');
    Route::post('/leads/{lead}/send-email', [AdminLeadController::class, 'sendEmail'])->name('leads.send-email');
    Route::post('/leads/{lead}/send-custom-email', [AdminLeadController::class, 'sendCustomEmail'])->name('leads.send-custom-email');
    Route::post('/leads/{lead}/send-template-email', [AdminLeadController::class, 'sendTemplateEmail'])->name('leads.send-template-email');
    Route::post('/leads/send-bulk-email', [AdminLeadController::class, 'sendBulkEmail'])->name('leads.send-bulk-email');
    Route::post('/leads/send-bulk-custom-email', [AdminLeadController::class, 'sendBulkCustomEmail'])->name('leads.send-bulk-custom-email');
    Route::post('/leads/send-bulk-template-email', [AdminLeadController::class, 'sendBulkTemplateEmail'])->name('leads.send-bulk-template-email');
    Route::delete('/leads/{lead}', [AdminLeadController::class, 'destroy'])->name('leads.destroy');
    
    // Gerenciamento de Templates de Email
    Route::get('/email-templates', [App\Http\Controllers\Admin\EmailTemplateController::class, 'index'])->name('email-templates.index');
    Route::get('/email-templates/create', [App\Http\Controllers\Admin\EmailTemplateController::class, 'create'])->name('email-templates.create');
    Route::post('/email-templates', [App\Http\Controllers\Admin\EmailTemplateController::class, 'store'])->name('email-templates.store');
    Route::get('/email-templates/{emailTemplate}/edit', [App\Http\Controllers\Admin\EmailTemplateController::class, 'edit'])->name('email-templates.edit');
    Route::put('/email-templates/{emailTemplate}', [App\Http\Controllers\Admin\EmailTemplateController::class, 'update'])->name('email-templates.update');
    Route::delete('/email-templates/{emailTemplate}', [App\Http\Controllers\Admin\EmailTemplateController::class, 'destroy'])->name('email-templates.destroy');
    
    // Gerenciamento de Produtos/Serviços
    Route::get('/products', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('products.destroy');
    
    // Relatórios
    Route::get('/reports', [AdminReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/leads', [AdminReportController::class, 'leads'])->name('reports.leads');
    Route::get('/reports/courses', [AdminReportController::class, 'courses'])->name('reports.courses');
    Route::get('/reports/users', [AdminReportController::class, 'users'])->name('reports.users');
    Route::get('/reports/export', [AdminReportController::class, 'export'])->name('reports.export');
    
    // Configurações
    Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [AdminSettingController::class, 'update'])->name('settings.update');
    Route::post('/settings/test-email', [AdminSettingController::class, 'testEmail'])->name('settings.test-email');
    Route::get('/settings/backup', [AdminSettingController::class, 'backup'])->name('settings.backup');
    Route::post('/settings/clear-cache', [AdminSettingController::class, 'clearCache'])->name('settings.clear-cache');
    Route::get('/settings/system', [AdminSettingController::class, 'systemInfo'])->name('settings.system');
});

// Demo Routes
require __DIR__.'/demo.php';
