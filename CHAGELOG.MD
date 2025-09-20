A sua consulta SQL que você forneceu tem um pequeno erro de sintaxe, pois a instrução `SELECT INTO` é usada de forma incorreta. Para realizar uma consulta no banco de dados que busque transações pelo nome e tipo (onde o tipo é selecionado pelo usuário), a consulta seria algo como:

```sql
SELECT nome, valor, tipo, data 
FROM transacoes
WHERE nome = :nome
AND tipo = :tipo;
```

No seu código PHP, você deve fazer a preparação da consulta e passar os parâmetros dinamicamente. A consulta PHP ficaria assim:

```php
// Prepare the SQL query
$stmt = $this->db->prepare("SELECT nome, valor, tipo, data FROM transacoes WHERE nome = :nome AND tipo = :tipo");

// Bind the parameters to the query
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':tipo', $tipo);

// Execute the query
$stmt->execute();

// Fetch results
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
```

Aqui está o que acontece:

* `:nome` e `:tipo` são parâmetros que serão substituídos dinamicamente pelo PHP.
* `$nome` e `$tipo` são as variáveis que você deve passar com os valores que o usuário selecionar.

### Exemplo de como passar os valores

Por exemplo, se você pegar os valores dos inputs do formulário, você poderia fazer algo como:

```php
$nome = $_POST['nome']; // ou qualquer outro método para pegar o valor
$tipo = $_POST['tipo']; // valor selecionado pelo usuário

// Execute a consulta com os valores
$stmt->execute();
```

Isso retornará todas as transações que correspondem ao nome e tipo escolhidos pelo usuário.

Se você precisar de mais alguma coisa ou se tiver outro tipo de questão, me avise!


Para realizar uma busca com um nome que contenha uma parte do texto (ou seja, buscando por nomes que **contêm** o texto informado), você pode usar a cláusula `LIKE` do SQL junto com os caracteres de coringa `%`. O `%` permite que você faça uma busca por qualquer string que contenha o termo informado, independentemente do que esteja antes ou depois do texto.

A consulta SQL ficaria assim:

```sql
SELECT nome, valor, tipo, data 
FROM transacoes 
WHERE nome LIKE :nome AND tipo = :tipo;
```

No seu código PHP, você pode ajustar o parâmetro `:nome` para incluir o `%` antes e depois do valor que o usuário fornecer, assim:

```php
// Prepare the SQL query
$stmt = $this->db->prepare("SELECT nome, valor, tipo, data FROM transacoes WHERE nome LIKE :nome AND tipo = :tipo");

// Adiciona os coringas % ao redor do nome fornecido pelo usuário
$nome = '%' . $nome . '%'; // Aqui você coloca os coringas antes e depois do valor

// Bind the parameters to the query
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':tipo', $tipo);

// Execute the query
$stmt->execute();

// Fetch results
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
```

### O que mudou:

* O parâmetro `:nome` foi ajustado para incluir `%` antes e depois do valor que o usuário fornecer (`$nome = '%' . $nome . '%'`).
* Isso faz com que a consulta busque qualquer transação cujo `nome` contenha o texto fornecido, independentemente do que esteja antes ou depois.

### Exemplos:

1. Se o usuário digitar **"carro"**, a consulta buscará todos os nomes que contenham **"carro"**, como "carro", "carro elétrico", "carro antigo", etc.
2. Se o usuário digitar **"elétrico"**, a consulta buscará todos os nomes que contenham **"elétrico"**, como "carro elétrico", "bicicleta elétrica", etc.

Se precisar de mais algum ajuste ou ajuda, só avisar!
Se a consulta está retornando apenas o valor `1`, pode ser que o problema esteja na maneira como você está lidando com os resultados ou na forma como está executando a consulta. Vamos revisar e corrigir o código de forma mais detalhada para garantir que tudo esteja funcionando corretamente.

Aqui está um passo a passo para depurar e garantir que o processo esteja correto:

### 1. Verifique a execução da consulta

Antes de mais nada, precisamos garantir que a consulta esteja sendo executada corretamente. O valor `1` pode estar relacionado a um erro que não está sendo mostrado.

Tente adicionar algum tratamento de erro no seu código, assim:

```php
try {
    // Prepare the SQL query
    $stmt = $this->db->prepare("SELECT nome, valor, tipo, data FROM transacoes WHERE nome LIKE :nome AND tipo = :tipo");

    // Adiciona os coringas ao redor do nome
    $nome = '%' . $nome . '%'; // Nome do usuário com '%'

    // Bind the parameters to the query
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':tipo', $tipo);

    // Execute the query
    $stmt->execute();

    // Fetch results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Verifica se retornou resultados
    if ($results) {
        echo "<pre>";
        print_r($results); // Isso vai mostrar os dados retornados pela consulta
        echo "</pre>";
    } else {
        echo "Nenhuma transação encontrada!";
    }

} catch (PDOException $e) {
    echo "Erro ao executar a consulta: " . $e->getMessage();
}
```

Isso ajudará a capturar erros e mostrar os dados ou uma mensagem de erro adequada.

### 2. Verifique se há dados correspondentes na tabela

É possível que a consulta não esteja retornando resultados porque não há dados que correspondam ao critério fornecido. Tente rodar a consulta diretamente no seu banco de dados com valores conhecidos para ver se retorna algum resultado. Exemplo:

```sql
SELECT nome, valor, tipo, data FROM transacoes WHERE nome LIKE '%carro%' AND tipo = 'tipo_especifico';
```

Isso ajuda a verificar se o problema está na consulta ou no código PHP.

### 3. Verifique se as variáveis `:nome` e `:tipo` estão corretas

Certifique-se de que as variáveis `$nome` e `$tipo` estão sendo passadas corretamente para a consulta. Por exemplo, se os dados não estão sendo enviados corretamente para o banco de dados, a consulta pode não retornar nenhum valor. Verifique o conteúdo dessas variáveis antes de fazer a consulta:

```php
echo "Nome: " . $nome . "<br>";
echo "Tipo: " . $tipo . "<br>";
```

### 4. Confirmando o método `fetchAll`

O método `fetchAll` deve retornar um array de resultados. Se a consulta não encontrar nada, o retorno será um array vazio. Se `fetchAll` estiver retornando `1`, pode ser que você esteja acessando os dados de forma incorreta.

No código acima, o `print_r($results)` deve exibir os resultados. Se estiver retornando vazio ou com o valor `1`, é possível que a consulta não tenha encontrado correspondência para o nome e tipo que você está passando.

### 5. Depuração adicional

Tente rodar a consulta de forma mais simples para ver se o problema é com o filtro `LIKE`:

```php
$stmt = $this->db->prepare("SELECT nome, valor, tipo, data FROM transacoes WHERE tipo = :tipo");
$stmt->bindParam(':tipo', $tipo);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
```

Isso vai verificar se o filtro de tipo está funcionando corretamente sem o `LIKE`.

### Resumo:

1. Adicione o bloco `try-catch` para capturar e mostrar erros.
2. Verifique se os valores passados para `$nome` e `$tipo` estão corretos.
3. Verifique se há dados correspondentes no banco com a consulta direta.
4. Use `print_r($results)` para visualizar os dados retornados.

Se nada disso funcionar, você pode compartilhar mais detalhes do erro ou do comportamento observado, e eu posso ajudar a depurar mais a fundo!

No SQLite, para usar a cláusula `LIKE` com o operador coringa `%` para buscar uma correspondência parcial no campo `nome`, a sintaxe correta seria a seguinte:

```sql
SELECT id, nome, valor, tipo, data 
FROM transacoes 
WHERE nome LIKE '%leidiane%';
```

Aqui, o `%` antes e depois de `'leidiane'` é o coringa que faz a busca parcial. O SQL irá encontrar todos os registros que tenham o nome contendo "leidiane", independentemente do que venha antes ou depois dessa string.

### Detalhes:

* **`LIKE '%leidiane%'`**: Isso buscará todas as transações onde o campo `nome` contenha a palavra "leidiane" em qualquer parte do nome.
* O `=` não é necessário, pois o `LIKE` já é utilizado para comparar partes de strings.

### Como ficaria no código PHP:

Aqui está um exemplo de como você pode usar essa consulta no seu código PHP:

```php
// Preparando a consulta SQL com LIKE para buscar por nome parcialmente
$stmt = $this->db->prepare("SELECT id, nome, valor, tipo, data FROM transacoes WHERE nome LIKE :nome");

// Adicionando os coringas ao redor do nome para a busca parcial
$nome = '%' . $nome . '%'; // Adiciona '%' antes e depois do nome

// Bind do parâmetro
$stmt->bindParam(':nome', $nome);

// Executando a consulta
$stmt->execute();

// Pegando os resultados
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Verificando se há resultados
if ($results) {
    echo "<pre>";
    print_r($results); // Mostra os dados retornados pela consulta
    echo "</pre>";
} else {
    echo "Nenhuma transação encontrada!";
}
```

No código acima:

* A variável `$nome` é modificada para incluir `%` antes e depois da string, permitindo uma busca parcial.
* A consulta SQL agora usa `LIKE :nome` para buscar qualquer transação cujo nome contenha o valor de `$nome`.

### Teste com `LIKE` no SQLite:

Você pode rodar a consulta diretamente no SQLite da seguinte forma:

```sql
SELECT id, nome, valor, tipo, data 
FROM transacoes 
WHERE nome LIKE '%leidiane%';
```

Isso deve retornar todas as transações onde o campo `nome` contenha "leidiane".

Se ainda tiver algum problema ou se precisar de mais detalhes, me avise!
A consulta que você escreveu tem um pequeno erro de sintaxe. No SQL, quando você usa o operador `LIKE`, não deve repetir a coluna `nome` duas vezes. O correto seria utilizar apenas `nome LIKE :nome`.

Aqui está o código corrigido:

```php
$stmt = $this->db->prepare("SELECT id, nome, valor, tipo, data FROM transacoes WHERE nome LIKE :nome");
```

Além disso, você precisa garantir que o parâmetro `:nome` seja passado corretamente com os coringas `%` para a busca parcial. Veja como o código completo ficaria:

### Código corrigido completo:

```php
// Adicionando os coringas '%' ao redor do nome para busca parcial
$nome = '%' . $nome . '%';

// Preparando a consulta SQL com LIKE
$stmt = $this->db->prepare("SELECT id, nome, valor, tipo, data FROM transacoes WHERE nome LIKE :nome");

// Associando o valor do parâmetro
$stmt->bindParam(':nome', $nome);

// Executando a consulta
$stmt->execute();

// Obtendo os resultados
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Verificando se há resultados
if ($results) {
    echo "<pre>";
    print_r($results); // Mostra os dados retornados pela consulta
    echo "</pre>";
} else {
    echo "Nenhuma transação encontrada!";
}
```

### O que mudou:

* **`nome LIKE :nome`**: Agora o `LIKE` é usado corretamente para buscar partes do nome.
* **`$nome = '%' . $nome . '%'`**: Aqui, os coringas `%` são adicionados antes e depois do nome, permitindo buscar qualquer nome que contenha a string fornecida.

### Resumo:

* **`LIKE`** é usado para buscar correspondências parciais.
* Você só precisa usar **`nome LIKE :nome`**, sem repetir a coluna `nome`.

Se precisar de mais ajuda ou quiser fazer outros ajustes, é só avisar!

A sua consulta:

```sql
SELECT id, nome, valor, tipo, data FROM transacoes WHERE valor LIKE '88'
```

está **sintaticamente correta**, mas o uso de `LIKE` só faz sentido quando você está lidando com **strings** e quer fazer **busca parcial ou com curingas**, como:

```sql
valor LIKE '%88%'
```

### 👉 Se o campo `valor` é **numérico**, você **não deve usar `LIKE`**, mas sim uma comparação direta:

```sql
-- Busca valores exatamente iguais a 88
SELECT id, nome, valor, tipo, data 
FROM transacoes 
WHERE valor = 88;
```

### 👉 Se você quiser encontrar valores que **contenham 88** dentro (como 188, 880, 2880), **só faz sentido se o campo `valor` for texto**:

```sql
-- Apenas se 'valor' for um campo de texto (VARCHAR, TEXT)
SELECT id, nome, valor, tipo, data 
FROM transacoes 
WHERE valor LIKE '%88%';
```

---

### ✅ Recomendações:

1. **Se `valor` é numérico (provável em transações)**:

   * Use `=` ou operadores como `>`, `<`, `BETWEEN`, etc.
   * Exemplo:

     ```sql
     SELECT * FROM transacoes WHERE valor = 88;
     ```

2. **Se `valor` é texto (não recomendado para números)**:

   * Use `LIKE '%88%'` se quiser buscar onde o número aparece como parte da string.

---

Se você não tem certeza se o campo `valor` é `TEXT` ou `NUMERIC`, use este comando no SQLite para checar a estrutura da tabela:

```sql
PRAGMA table_info(transacoes);
```

Isso vai mostrar os nomes dos campos e seus tipos.

Se quiser ajuda para adaptar a busca conforme o tipo real da coluna, posso te ajudar com isso também.


```php
 if ($busca && $tipo) {
                    if (empty($busca)) {
                        $error = "Dados da transação é obrigatório.";
                    } elseif (empty($tipo) || !in_array($tipo, ['nome', 'valor', 'tipo'])) {
                        $error = "O tipo de transação é inválido.";
                    }

                    if($tipo == 'nome'){
                        try {
                            $results = $buscaModel->buscaTransacaoNome($busca);
                            if ($results) {
                                $buscaTransacao = $results; // Isso vai mostrar os dados retornados pela consulta
                            } else {
                                $error = "Nenhuma transação encontrada!";
                            }
                         }catch (PDOException $e) {
                            echo "Erro ao executar a consulta: " . $e->getMessage();
                         }
                    }else if($tipo == 'tipo'){
                        try {
                            $results = $buscaModel->buscaTransacaoTipo($busca);
                            if ($results) {
                                $buscaTransacao = $results; // Isso vai mostrar os dados retornados pela consulta
                            } else {
                                $error = "Nenhuma transação encontrada!";
                            }
                         }catch (PDOException $e) {
                            echo "Erro ao executar a consulta: " . $e->getMessage();
                         }
                    }else if($tipo == 'valor'){
                        try {
                            $results = $buscaModel->buscaTransacaoValor($busca);
                            if ($results) {
                                $buscaTransacao = $results; // Isso vai mostrar os dados retornados pela consulta
                            } else {
                                $error = "Nenhuma transação encontrada!";
                            }
                         }catch (PDOException $e) {
                            echo "Erro ao executar a consulta: " . $e->getMessage();
                         }
                    }
                }
            } 
```

Claro! Seu código está funcional, mas pode ser **refatorado para reduzir duplicação**, **melhorar a legibilidade** e **organizar melhor os blocos condicionais**. Aqui está uma sugestão de refatoração:

---

### ✅ Refatoração:

```php
if ($busca && $tipo) {
    // Validação de entrada
    if (empty($busca)) {
        $error = "Dados da transação são obrigatórios.";
    } elseif (!in_array($tipo, ['nome', 'valor', 'tipo'])) {
        $error = "O tipo de transação é inválido.";
    } else {
        // Mapeia os métodos disponíveis por tipo
        $metodosBusca = [
            'nome'  => 'buscaTransacaoNome',
            'tipo'  => 'buscaTransacaoTipo',
            'valor' => 'buscaTransacaoValor'
        ];

        // Verifica se existe um método correspondente
        if (array_key_exists($tipo, $metodosBusca)) {
            try {
                $metodo = $metodosBusca[$tipo];
                $results = $buscaModel->$metodo($busca);

                if ($results) {
                    $buscaTransacao = $results;
                } else {
                    $error = "Nenhuma transação encontrada!";
                }
            } catch (PDOException $e) {
                echo "Erro ao executar a consulta: " . $e->getMessage();
            }
        }
    }
}
```

---

### ✅ Melhorias aplicadas:

* **Evita repetição de código** (`try/catch`, `if ($results)`, etc.).
* **Organiza os métodos em um array associativo** para facilitar a manutenção e reduzir `if`/`else`.
* **Clareza na validação dos parâmetros**.
* **Uso correto de `array_key_exists`** para garantir que o método exista.

---

Se quiser deixar ainda mais elegante, pode mover a validação para fora do `if ($busca && $tipo)` e colocar tudo de forma sequencial.

Se quiser, posso também sugerir como fazer isso com **Switch**, **Factory Pattern** ou **Polimorfismo** se estiver usando POO.

Deseja uma dessas versões também?
