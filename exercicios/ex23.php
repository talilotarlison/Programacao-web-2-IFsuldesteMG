<?php
  // variavel global acesso fora do escopo
  $c = 13;
  function mostar(){
     	global $c;
     	echo $c;
  }
  
  mostar();
 
   // funcao anonimas com php 
  $factor = 10;
    $multiply = function($x) use ($factor) {
    return $x * $factor;
  };

  echo $multiply(5); // Outputs: 50
  
  //  arraw funntion em php
  $factor = 10;
  $multiply = fn($x) => $x * $factor;
  
  echo $multiply(5); // Outputs: 50

  // funcao de callback
  
  function apresentacao($nome,$ano, $calculaIdade){
   $idade = $calculaIdade($ano);
    echo " Seu nomee é {$nome}, sua idade é {$idade}";
  }
  
  apresentacao("joao",1984,fn($idade)=>2024-$idade);
    
  // funcao normal
  
  function apresentacaoNome($nome){
     echo " Seu nomee é {$nome}, sua idade é 12";
  }
  
  apresentacaoNome("joao")
?>