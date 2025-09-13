<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário - Finance</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(120deg, #f0f4f8 0%, #d9e7fa 100%);
            margin: 0;
            min-height: 100vh;
        }
        h2 {
            text-align: center;
            color: #2d3a4b;
            margin-top: 40px;
            letter-spacing: 1px;
        }
        form {
            background: #fff;
            max-width: 400px;
            margin: 40px auto 40px auto;
            padding: 32px 41px 24px 28px;
            border-radius: 14px;
            box-shadow: 0 4px 24px rgba(44, 62, 80, 0.10), 0 1.5px 4px rgba(44, 62, 80, 0.08);
        }
        label {
            display: block;
            margin-top: 16px;
            color: #34495e;
            font-weight: 500;
        }
        input[type="text"], input[type="email"], input[type="date"], input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            margin-top: 6px;
            border: 1px solid #cfd8dc;
            border-radius: 6px;
            background: #f8fafc;
            font-size: 1rem;
            transition: border 0.2s;
        }
        input[type="text"]:focus, input[type="email"]:focus, input[type="date"]:focus, input[type="password"]:focus {
            border: 1.5px solid #5b9df9;
            outline: none;
            background: #fff;
        }
        button[type="submit"] , button[type="button"] {
            width: 100%;
            background: linear-gradient(90deg, #5b9df9 0%, #3b7ddd 100%);
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 12px 0;
            font-size: 1.1rem;
            font-weight: bold;
            margin-top: 22px;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(91,157,249,0.08);
            transition: background 0.2s;
        }
        button[type="submit"]:hover {
            background: linear-gradient(90deg, #3b7ddd 0%, #5b9df9 100%);
        }
        button[type="button"] {
                    background: #ccc;
                    color: #333;
                }
        button[type="button"]:hover {
            background: #bbb;
        }
        .erro, .sucesso {
            max-width: 400px;
            margin: 24px auto 0 auto;
            padding: 12px 18px;
            border-radius: 6px;
            font-size: 1rem;
            text-align: center;
        }
        .erro {
            background: #ffeaea;
            color: #d32f2f;
            border: 1px solid #f8bcbc;
        }
        .sucesso {
            background: #eaffea;
            color: #388e3c;
            border: 1px solid #b6eab6;
        }
    </style>
</head>
<body>
    <h2>Cadastrar/Finance</h2>
    <?php if ($erro): ?>
        <div class="erro"><?= htmlspecialchars($erro) ?></div>
    <?php elseif ($sucesso): ?>
        <div class="sucesso"><?= htmlspecialchars($sucesso) ?></div>
    <?php endif; ?>
    <form method="post" action="/cadastro">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required value="<?= htmlspecialchars($_POST['nome'] ?? '') ?>">

        <label for="datan">Data de Nascimento:</label>
        <input type="date" name="datan" id="datan" required value="<?= htmlspecialchars($_POST['datan'] ?? '') ?>">

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>

        <label for="confirma">Confirme a Senha:</label>
        <input type="password" name="confirma" id="confirma" required>

        <button type="submit" style="margin-top:15px;">Cadastrar</button>
        <button type="button" onclick="window.location.href='/login'" style="margin-top:10px; background:#ccc; color:#333;">Voltar para Login</button>
    </form>
</body>
</html>