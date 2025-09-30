<?php
    $numero1 = 10;
    $numero2 = 5;
    $operador = 1;  // Definindo o operador (1 = soma, 2 = subtração, 3 = multiplicação, 4 = divisão)

    // operadores : 
    // 1 - Soma
    // 2 - subtracao
    // 3 - Multiplicação
    // 4 - Divisão
    
    
    // crie uma estrutura de condição aqui:

    // Estrutura de condição para verificar a operação
    switch ($operador) {
        case 1:
            // Soma
            $resultado = $numero1 + $numero2;
            echo "A soma de {$numero1} e {$numero2} é {$resultado}.<br>";
            break;

        case 2:
            // Subtração
            $resultado = $numero1 - $numero2;
            echo "A subtração de {$numero1} e {$numero2} é {$resultado}.<br>";
            break;

        case 3:
            // Multiplicação
            $resultado = $numero1 * $numero2;
            echo "A multiplicação de {$numero1} e {$numero2} é {$resultado}.<br>";
            break;

        case 4:
            // Divisão
            if ($numero2 != 0) {
                $resultado = $numero1 / $numero2;
                echo "A divisão de {$numero1} por {$numero2} é {$resultado}.<br>";
            } else {
                echo "Erro: Divisão por zero não permitida.<br>";
            }
            break;

        default:
            echo "Operador inválido. Por favor, escolha entre 1 (soma), 2 (subtração), 3 (multiplicação) ou 4 (divisão).<br>";
    }
?>
