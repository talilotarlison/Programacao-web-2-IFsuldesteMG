<?php
    $kmMaximoPermtido = 110;
    $velocidadeVeiculo = 60;

 
    if($kmMaximoPermtido >= 100){
        // maior que 100km
        // margem de erro de 7%
        $margem = 0.07; // 7% na velocidade maxima
        // calculo da velocidade com margem
        $velocidadeVeiculoComMargem = ($kmMaximoPermtido *  $margem) + $kmMaximoPermtido;

        if($velocidadeVeiculo >= $velocidadeVeiculoComMargem ){

            //gravidade da multa
            $marge20 = ($kmMaximoPermtido * 0.2) + $kmMaximoPermtido;
            $marge50 = ($kmMaximoPermtido * 0.5) + $kmMaximoPermtido;
            
            if($velocidadeVeiculo <= $marge20){
                echo "Infração media, R$ 130.00 de multa, 4 pontos na carteira.\n";
            }
            
            if(($velocidadeVeiculo > $marge20)&& ($velocidadeVeiculo < $marge50)){
                echo "Infração grave, R$ 195.00 de multa, 5 pontos na carteira.\n";
            }
            
            if($velocidadeVeiculo > $marge50){
                echo "Infração media, R$ 880.00 de multa, 7 pontos na carteira\n";
            }
            
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
            
                        //gravidade da multa
            $marge20 = ($kmMaximoPermtido * 0.2) + $kmMaximoPermtido;
            $marge50 = ($kmMaximoPermtido * 0.5) + $kmMaximoPermtido;
            
            if($velocidadeVeiculo <= $marge20){
                echo "Infração media, R$ 130.00 de multa, 4 pontos na carteira.\n";
            }
            
            if(($velocidadeVeiculo > $marge20)&& ($velocidadeVeiculo < $marge50)){
                echo "Infração grave, R$ 195.00 de multa, 5 pontos na carteira.\n";
            }
            
            if($velocidadeVeiculo > $marge50){
                echo "Infração media, R$ 880.00 de multa, 7 pontos na carteira\n";
            }
            
            echo "Você foi mutado, velocidade permitida: KM {$velocidadeVeiculoComMargemKm}\nSua velocidade estava:  KM {$velocidadeVeiculo}"; 
        }else{
            // nao levou muta
             echo "Você não foi mutado, velocidade permitida: KM {$velocidadeVeiculoComMargemKm}\nSua velocidade estava:  KM {$velocidadeVeiculo}";
        }      
    }
    
?>
