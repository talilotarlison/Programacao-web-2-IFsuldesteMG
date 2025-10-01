<?php
    
    // Apresenta dados
    function msgExibir($msg): void {
        echo $msg;
    }
    
    // Calcula o frete
    // Se o frete for 0, oferece frete grátis. Caso contrário, calcula o frete.

    function calculaFrete(float $freteItem): string {
        if ($freteItem == 0) {
            // Frete grátis
            return "Compra com frete grátis realizada com sucesso!";
        }
        // Paga o frete
        return "Compra possui frete de R$ " . number_format($freteItem, 2, ',', '.') . " reais. Compra com frete pago realizada com sucesso.";
    }
    
    // Processa a compra
    function processaComprar(int $quantidadeItens, float $freteItem): void {
        if ($quantidadeItens > 0) {
            // Tem produtos disponíveis
            $valorFreteCalculado = calculaFrete($freteItem);
            // Exibe dados da compra
            msgExibir($valorFreteCalculado);
        } else {
            // Não tem produto disponível
            msgExibir("Não temos o produto em estoque no momento. Tente mais tarde.");
        }
    }
    
    // Função principal
    function main(): void {
        // Dados de entrada do usuário
        $freteItem = 5; // Valor do frete
        $quantidadeItens = 10; // Quantidade de itens

        // Processa a compra
        processaComprar($quantidadeItens, $freteItem);
    }

    // Chamada da função principal
    main();

?>
