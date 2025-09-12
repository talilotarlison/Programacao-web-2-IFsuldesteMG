<?php
 # sessao do usuario
  session_start();


  if (!isset($_SESSION['usuario'])) {
        header('Location: index.php');
  }

// index.php - Sistema simples de fluxo de caixa com SQLite

$db = new PDO('sqlite:finance.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Cria a tabela se não existir
$db->exec("CREATE TABLE IF NOT EXISTS transacoes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nome TEXT NOT NULL,
    valor REAL NOT NULL,
    tipo TEXT CHECK(tipo IN ('entrada','saida')) NOT NULL,
    data TEXT NOT NULL
)");

// Remover transação
if (isset($_GET['remover'])) {
    $stmt = $db->prepare("DELETE FROM transacoes WHERE id = ?");
    $stmt->execute([$_GET['remover']]);
    header("Location: index.php");
    exit;
}

// Adicionar transação
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    $valor = $_POST['valor'] ?? '';
    $data = $_POST['data'] ?? '';
    if ($nome && in_array($tipo, ['entrada','saida']) && $data) {
        $stmt = $db->prepare("INSERT INTO transacoes (nome, tipo, valor, data) VALUES (?, ?,?, ?)");
        $stmt->execute([$nome, $tipo, $valor, $data]);
        header("Location: index.php");
        exit;
    }
}

// Listar transações
$transacoes = $db->query("SELECT * FROM transacoes ORDER BY data DESC, id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Fluxo de Caixa</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #f0f0f0; }
        .entrada { color: green; }
        .saida { color: red; }
    </style>
</head>
<body>
    <h1>Fluxo de Caixa</h1>
    <h2>Usuário: <?= htmlspecialchars($_SESSION['usuario'] ?? 'Desconhecido'); ?></h2>
    <a href="sair.php">Sair</a>
    <form method="post">
        <input type="text" name="nome" placeholder="Nome da transação" required>
        <select name="tipo" required>
            <option value="">Tipo</option>
            <option value="entrada">Entrada</option>
            <option value="saida">Saída</option>
        </select>
        <input type="number" step="0.01" name="valor" placeholder="Valor" required>
        <input type="date" name="data" required>
        <button type="submit">Adicionar</button>
    </form>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Valor</th>
            <th>Data</th>
            <th>Ação</th>
        </tr>
        <?php foreach ($transacoes as $t): ?>
        <tr>
            <td><?= htmlspecialchars($t['id']) ?></td>
            <td><?= htmlspecialchars($t['nome']) ?></td>
            <td class="<?= $t['tipo'] ?>"><?= ucfirst($t['tipo']) ?></td>
            <td><?= htmlspecialchars($t['valor']) ?></td>
            <td><?= htmlspecialchars($t['data']) ?></td>
            <td>
                <a href="?remover=<?= $t['id'] ?>" onclick="return confirm('Remover esta transação?')">Remover</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>