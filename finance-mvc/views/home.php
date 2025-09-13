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
    <a href="/sair">Sair</a>
    <form method="post" action="/home">
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