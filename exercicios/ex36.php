<?php
// https://cursos.alura.com.br/forum/topico-quebra-de-linha-com-php_eol-163093
// https://unset.com.br/post/curso-de-php-8/aula-017-os-tipos-de-dados-e-os-tipos-de-retorno-do-php
// https://www.youtube.com/watch?v=RLaS6WDOzyc


  function divisao(Float  $a, Float  $b):Float {
    return $a /$b;
  }
  
	echo soma(7,5.5);
	 
	 echo "\n";
	 
	 function soma(Int $a, Float $b):Int{
    return $a +$b;
  }
  
	echo soma(2,5.5);
	echo PHP_EOL;
	
	 function apresentacao(String $nome):void{
    echo "meu nom e $nome";
  }
	echo apresentacao("maria");

// Quais são os tipos de dados?

// Existem vários tipos de dados que podem ser utilizados. Os principais tipos de dados do PHP incluem:

// Int (inteiro): Representa números inteiros, positivos ou negativos, sem casas decimais. Exemplo: $idade = 25;
// Float (ponto flutuante): Representa números reais, com casas decimais. Exemplo: $preco = 9.99;
// String: Representa uma sequência de caracteres. As strings devem estar entre aspas simples ou duplas. Exemplo: $nome = "Ronaldo";
// Boolean: Representa um valor lógico, que pode ser verdadeiro (true) ou falso (false). Exemplo: $ativo = true;
// Null: Representa a ausência de um valor. É usado quando uma variável não possui nenhum valor atribuído. Exemplo: $endereco = null;
// Mais adiante no curso, veremos outros tipos de dados como:

// Array: Representa uma coleção de elementos, onde cada elemento possui uma chave e um valor associado. Exemplo: $cores = array("vermelho", "azul", "verde");
// Object (objeto): Representa uma instância de uma classe. Os objetos contêm propriedades (variáveis) e métodos (funções) relacionados a essa classe. Exemplo: $pessoa = new Pessoa();
// Quais são os tipos de retorno?

// No PHP, assim como em muitas linguagens de programação, é possível especificar o tipo de retorno de uma função ou método. É possível utilizar a declaração de tipos de retorno para indicar o tipo de dado que uma função ou método deve retornar.

// Os tipos de retorno disponíveis no PHP são os seguintes:

// void: Indica que a função não possui um valor de retorno. Exemplo: function exibirMensagem(): void { echo "Olá!"; }
// Tipos primitivos: É possível especificar tipos de retorno primitivos, como int, float, string, bool. Exemplo: function somar(int $a, int $b): int { return $a + $b; }
// Tipos de classes e interfaces: É possível especificar o nome de uma classe ou interface como tipo de retorno. Isso indica que a função ou método deve retornar uma instância da classe ou uma implementação da interface. Exemplo: function criarObjeto(): MinhaClasse { return new MinhaClasse(); }
// Tipos de retorno nullable: A partir do PHP 8, é possível indicar que o retorno pode ser nulo utilizando o operador de interrogação (?) antes do tipo. Exemplo: function buscarUsuario(int $id): ?Usuario { ... }

//https://celke.com.br/artigo/como-pesquisar-com-php-e-mysqli
//https://celke.com.br/artigo/sistema-de-login-com-php-e-mysqli

?>