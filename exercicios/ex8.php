<?php
// Exemplo de função com parâmetros padrão

function soma($a, $b = 10) {
    return $a + $b;
}

echo soma(5); // Exibe: 15
echo "<br>";
echo soma(5, 3); // Exibe: 8


/*
A diferença entre função e procedimento em programação está relacionada principalmente ao seu propósito e ao modo como retornam valores.

1. **Função**:
- Uma função é um bloco de código que executa uma tarefa específica e pode retornar um valor. O retorno pode ser usado em expressões ou atribuições. 
É comum em linguagens de programação que suportam a programação funcional. Funções são frequentemente usadas para encapsular cálculos ou operações 
que podem ser reutilizadas em diferentes partes do programa.

- Exemplo: `int somar(int a, int b) { return a + b; }`

2. **Procedimento**:
- Um procedimento, por outro lado, é semelhante a uma função, mas não retorna um valor. Ele realiza uma ação ou um conjunto de ações,
 mas seu resultado não é retornado explicitamente. Em algumas linguagens, procedimentos podem ser chamados de "sub-rotinas" ou "métodos"
  (em contextos orientados a objetos).
  
- Exemplo: `void exibirMensagem() { printf("Olá, mundo!"); }`

Resumindo, a principal diferença é que funções retornam um valor e procedimentos não.
*/

?>
