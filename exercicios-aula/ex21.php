<?php
    $kmMaximoPermtido = 100;
    $velocidadeVeiculo = 180;


    if($velocidadeVeiculo >= $kmMaximoPermtido){
        //leva muta
        $margem = 0.07;
        $velocidadeVeiculoComMargem = ($velocidadeVeiculo *  $margem) + $velocidadeVeiculo;
        if($velocidadeVeiculoComMargem <= $kmMaximoPermtido ){
           echo "Você foi mutado, velocidade permitida: KM {$velocidadeVeiculoComMargem}\nSua velocidade estava:  KM {$velocidadeVeiculo}"; 
        }else{
           echo "Você não foi mutado, velocidade permitida: KM {$velocidadeVeiculoComMargem}\nSua velocidade estava:  KM {$velocidadeVeiculo}";         
        }
    }else{
        //nao leva muta
         echo "Você não foi mutado, velocidade permitida: KM {$kmMaximoPermtido}\nSua velocidade estava:  KM {$velocidadeVeiculo}";
    }
    
?>
