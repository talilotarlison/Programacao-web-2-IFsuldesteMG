<?php
    $freteItem = 5;
    $quantidadeItens = 0;

    if($quantidadeItens > 0){
       // tem produtos 
       if($freteItem == 0){
        // frente gratis
        echo "compra com frete gratis ralaziada com sucesso";
        return;
       }
       // paga frete
        echo "compra possue frente de R$ {$freteItem} reias\n";
        echo "compra com frete pago ralaziada com sucesso";
        return;
    }
    
    // nao tem produto
    echo "Nao temos o produto em estoque no momento.";
  

?>
