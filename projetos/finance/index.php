<?php
session_start();

  if (isset($_SESSION['usuario'])) {
    header('Location: home.php');
  }

// Simulação de usuário (substitua por consulta ao banco de dados)
// Conexão com o banco de dados SQLite
$db = new PDO('sqlite:finance.db');
$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Consulta ao banco de dados
    $stmt = $db->prepare('SELECT * FROM usuarios WHERE email = :email');
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario'] = $usuario['email'];
        header('Location: home.php');
        exit;
    } else {
        $erro = 'E-mail ou senha inválidos.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Finance</title>
    <style>
        body {
            background: #f5f7fa;
            font-family: 'Segoe UI', Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background: #fff;
            padding: 32px 28px;
            border-radius: 10px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            width: 340px;
        }
        h2 {
            text-align: center;
            color: #2d3a4b;
            margin-bottom: 24px;
        }
        label {
            color: #2d3a4b;
            font-weight: 500;
        }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            margin-top: 6px;
            margin-bottom: 18px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 15px;
            background: #f9fafb;
            transition: border 0.2s;
        }
        input[type="email"]:focus, input[type="password"]:focus {
            border: 1.5px solid #4f8cff;
            outline: none;
            background: #fff;
        }
        button[type="submit"], button[type="button"] {
            width: 100%;
            padding: 12px;
            background: #4f8cff;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
            margin-top: 10px;
        }
        button[type="submit"]:hover {
            background: #2563eb;
        }
        .error-message {
            color: #e53e3e;
            background: #fff0f0;
            border: 1px solid #e53e3e;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 18px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if ($erro): ?>
            <div class="error-message"><?= htmlspecialchars($erro) ?></div>
        <?php endif; ?>
        <form method="post" action=<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>>
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" required>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>
            <button type="submit">Entrar</button>
            <button type="button" onclick="window.location.href='cadastroUsuario.php'">Cadastrar</button>
        </form>
    </div>
</body>
</html>