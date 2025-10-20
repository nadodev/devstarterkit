<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #3B82F6 0%, #8B5CF6 100%);
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 0 0 10px 10px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding: 20px;
            color: #666;
            font-size: 14px;
        }
        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #3B82F6 0%, #8B5CF6 100%);
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>DevStarter Kit</h1>
        <p>Plataforma de Cursos Online</p>
    </div>
    
    <div class="content">
        <h2>Olá, {{ $name }}!</h2>
        
        <div>
            {!! $content !!}
        </div>
        
        <p style="margin-top: 30px;">
            <strong>Equipe DevStarter Kit</strong><br>
            Transformando vidas através da educação
        </p>
    </div>
    
    <div class="footer">
        <p>Este email foi enviado para {{ $email }}</p>
        <p>Se você não deseja mais receber nossos emails, pode 
            <a href="{{ route('email.unsubscribe', ['email' => $email]) }}" 
               style="color: #3B82F6; text-decoration: underline;">
                cancelar a inscrição
            </a>
        </p>
        <p>&copy; {{ date('Y') }} DevStarter Kit. Todos os direitos reservados.</p>
    </div>
</body>
</html>
