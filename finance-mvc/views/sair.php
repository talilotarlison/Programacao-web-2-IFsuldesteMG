<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Saindo...</title>
    <style>
        body {
            background: #f5f6fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .logout-container {
            background: #fff;
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.08);
            text-align: center;
        }
        .logout-container h1 {
            color: #2d3436;
            margin-bottom: 10px;
        }
        .logout-container p {
            color: #636e72;
            margin-bottom: 20px;
        }
        .logout-container a {
            display: inline-block;
            padding: 10px 24px;
            background: #0984e3;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.2s;
        }
        .logout-container a:hover {
            background: #74b9ff;
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <h1>Você saiu do sistema</h1>
        <p>Obrigado por utilizar nosso serviço.</p>
        <a href="/login">Entrar novamente</a>
    </div>
</body>
</html>
