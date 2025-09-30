<?php
    $freteItem = 0;
    $quantidadeItens = 2;

    // uso do if else aninhado

    if($quantidadeItens > 0){
       // tem produtos 
       if($freteItem > 0){
        echo "compra possue frente de R$ {$freteItem} reias\n";
        echo "compra com frete pago ralaziada com sucesso";
       }else{
        // frente gratis
        echo "compra com frete gratis ralaziada com sucesso";
       }
    }else{
        // nao tem
        echo "Nao temos o produto em estoque no momento.";
    }

?>
