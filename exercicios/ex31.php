
<?php

  function apresenta(string $nome, int $ano, callable $calIdade): void {
  $idade = $calIdade($ano);
  echo "Bem vindo " . $nome . ", você tem " . $idade . " anos.";
  }
  
  $calcular = function (int $ano): int|float {
  return 2024 - $ano;
  };
  
  apresenta(nome: "Maria", ano: 1993,calIdade: $calcular);
  
  function sum(int ...$numbers):int {
      $acc = 0;
      foreach ($numbers as $n) {
          $acc += $n;
      }
      return $acc;
  }
  
  echo sum(1, 2, 3, 4);
  
  # https://www.php.net/manual/pt_BR/functions.arguments.php
  
  function quadrado($num):int|float
  {
      return $num * $num;
  }
  echo quadrado(num: 4); // imprime '16'.
  
  # https://www.php.net/manual/pt_BR/functions.returning-values.php
  
   function quadradoSoma($num):mixed
  {
      return $num + $num;
  }
  
  echo quadradoSoma(num: 9);
?>