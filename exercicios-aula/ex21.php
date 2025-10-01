<?php
    $kmMaximoPermtido = 60;
    $velocidadeVeiculo = 75;


    if($velocidadeVeiculo >= 100){
        // maior que 100km
        // margem de erro de 7%
        $margem = 0.07; // 7% na velocidade maxima
        // calculo da velocidade com margem
        $velocidadeVeiculoComMargem = ($kmMaximoPermtido *  $margem) + $kmMaximoPermtido;

        if($velocidadeVeiculo >= $velocidadeVeiculoComMargem ){

            //gravidade da multa
            $marge20 = ($kmMaximoPermtido * 0.2) + $kmMaximoPermtido;
            echo "Você foi mutado, velocidade permitida: KM {$velocidadeVeiculoComMargem}\nSua velocidade estava:  KM {$velocidadeVeiculo}"; 
        }else{
           echo "Você não foi mutado, velocidade permitida: KM {$velocidadeVeiculoComMargem}\nSua velocidade estava:  KM {$velocidadeVeiculo}";         
        }
    }else{
        //menor que 100km 
        // margem de erro de 7km
        $margemKm = 7; //  7 km
        $velocidadeVeiculoComMargemKm = $kmMaximoPermtido +$margemKm;

        if($velocidadeVeiculo >= $velocidadeVeiculoComMargemKm ){
            // mutado
            echo "Você foi mutado, velocidade permitida: KM {$velocidadeVeiculoComMargemKm}\nSua velocidade estava:  KM {$velocidadeVeiculo}"; 
        }else{
            // nao levou muta
             echo "Você não foi mutado, velocidade permitida: KM {$velocidadeVeiculoComMargemKm}\nSua velocidade estava:  KM {$velocidadeVeiculo}";
        }      
    }
    
?>