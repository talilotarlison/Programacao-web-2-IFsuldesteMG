<?php
// index.php

// Configuração do banco de dados SQLite
$dbFile = __DIR__ . '/todos.sqlite';
$db = new PDO('sqlite:' . $dbFile);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Cria a tabela se não existir
$db->exec("CREATE TABLE IF NOT EXISTS todos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT NOT NULL,
    done INTEGER NOT NULL DEFAULT 0
)");

// Adiciona novo TODO
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'])) {
    $title = trim($_POST['title']);
    if ($title !== '') {
        $stmt = $db->prepare("INSERT INTO todos (title) VALUES (:title)");
        $stmt->execute([':title' => $title]);
    }
    header('Location: index.php');
    exit;
}

// Marca como concluído
if (isset($_GET['done'])) {
    $id = (int)$_GET['done'];
    $db->prepare("UPDATE todos SET done = 1 WHERE id = :id")->execute([':id' => $id]);
    header('Location: index.php');
    exit;
}

// Remove TODO
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $db->prepare("DELETE FROM todos WHERE id = :id")->execute([':id' => $id]);
    header('Location: index.php');
    exit;
}

// Busca todos os TODOs
$todos = $db->query("SELECT * FROM todos ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Todo List PHP + SQLite</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 420px;
            margin: 40px auto;
            background: #fff;
            padding: 32px 24px 24px 24px;
            border-radius: 8px;
            box-shadow: 0 2px 8px #0001;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 24px;
        }
        form {
            display: flex;
            margin-bottom: 24px;
        }
        input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #bbb;
            border-radius: 4px 0 0 4px;
            font-size: 16px;
        }
        button {
            padding: 10px 18px;
            border: none;
            background: #0078d7;
            color: #fff;
            font-size: 16px;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            background: #f9f9f9;
            margin-bottom: 10px;
            padding: 12px 10px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .done {
            text-decoration: line-through;
            color: #888;
        }
        .actions a {
            margin-left: 10px;
            color: #0078d7;
            text-decoration: none;
            font-size: 15px;
        }
        .actions a.delete {
            color: #d70022;
        }
        .actions a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Todo List</h1>
    <form method="post" autocomplete="off">
        <input type="text" name="title" placeholder="Nova tarefa..." required>
        <button type="submit">Adicionar</button>
    </form>
    <ul>
        <?php foreach ($todos as $todo): ?>
            <li>
                <span class="<?= $todo['done'] ? 'done' : '' ?>">
                    <?= htmlspecialchars($todo['title']) ?>
                </span>
                <span class="actions">
                    <?php if (!$todo['done']): ?>
                        <a href="?done=<?= $todo['id'] ?>">Concluir</a>
                    <?php endif; ?>
                    <a href="?delete=<?= $todo['id'] ?>" class="delete" onclick="return confirm('Remover tarefa?')">Remover</a>
                </span>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>
