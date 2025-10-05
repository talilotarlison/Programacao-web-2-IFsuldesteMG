<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Erro - Algo deu errado</title>
    <style>
        body {
            background: #f8d7da;
            color: #721c24;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .error-container {
            background: #fff;
            border: 2px solid #f5c6cb;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 40px 60px;
            text-align: center;
        }
        .error-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 16px;
        }
        .error-message {
            font-size: 1.2rem;
            margin-bottom: 24px;
        }
        .back-btn {
            background: #f5c6cb;
            color: #721c24;
            border: none;
            padding: 12px 28px;
            border-radius: 6px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.2s;
        }
        .back-btn:hover {
            background: #f1b0b7;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-title">Ops! Algo deu errado.</div>
        <div class="error-message">
            Ocorreu um erro inesperado.<br>
            Por favor, tente novamente mais tarde.
        </div>
        <button class="back-btn" onclick="window.history.back();">Voltar</button>
    </div>
</body>
</html>