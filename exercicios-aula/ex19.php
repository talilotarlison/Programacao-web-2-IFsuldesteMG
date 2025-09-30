<?php
    
    // apresenta dados
    function msgExibir($msg){
        echo $msg;
    }
    
    // calcula frete
    function calculaFrete(float $freteItem ):string {
        if($freteItem == 0){
            // frente gratis
           return "compra com frete gratis ralaziada com sucesso";
          }
       // paga frete
        return "compra possue frente de R$ {$freteItem} reias\nCompra com frete pago ralaziada com sucesso";
    }
    
    // processa a comprar
    function processaComprar(int $quantidadeItens, float $freteItem): void{
        if($quantidadeItens > 0){
           // tem produtos disposivel
           // calcula Frete do produto
            $valorFreteCalculado = calculaFrete($freteItem);
            //exibe dados da compra
            msgExibir($valorFreteCalculado);
            return;
        }
        
        // nao tem produto disposivel
        msgExibir("Nao temos o produto em estoque no momento.Tente mais tarde.");
    }
    
    // https://www.php.net/manual/en/language.types.declarations.php
    function main(): void{
        // dados entrada usuario
        $freteItem = 5;
        $quantidadeItens = 10;
        
        processaComprar($quantidadeItens,$freteItem);
    }

    // chamada funcao princiapal
    main();

?>