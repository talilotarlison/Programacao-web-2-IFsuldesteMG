<?php
// Exemplo de estrutura switch

$dia = "segunda-feira";

switch ($dia) {
    case "segunda-feira":
        echo "Início da semana!";
        break;
    case "quarta-feira":
        echo "Meio da semana!";
        break;
    case "sexta-feira":
        echo "Fim de semana chegando!";
        break;
    default:
        echo "Dia comum!";
}
?>
