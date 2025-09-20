<?php
// Para formatar um número com duas casas decimais em PHP, a maneira mais comum é usar a função number_format(), que permite definir o número de casas decimais e os separadores de milhares e de decimais. 
// Outra opção é a função sprintf(), que formata um número com um especificador %.2f para indicar duas casas decimais. 
// Usando number_format()
// Esta é a função mais recomendada para formatação de números em PHP, especialmente para valores monetários. 



$numero = 1234.56789;
$numero_formatado = number_format($numero, 2, ',', '.'); // 2 casas, vírgula como decimal, ponto como milhar
echo $numero_formatado; // Saída: 1.234,57

// Primeiro parâmetro: O número que você deseja formatar. 
// Segundo parâmetro: O número de casas decimais desejadas (neste caso, 2). 
// Terceiro parâmetro: O separador de decimal (por exemplo, , para o formato brasileiro). 
// Quarto parâmetro: O separador de milhar (por exemplo, . para o formato brasileiro). 
// Usando sprintf()
// A função sprintf() é útil para formatação de strings e pode ser usada para formatar números com casas decimais. 

$numero = 1234.56789;
$numero_formatado = sprintf("%.2f", $numero); // Formata com 2 casas decimais
echo $numero_formatado; // Saída: 1234.57

// Especificador %.2f: Indica que o número deve ser formatado como um ponto flutuante (f) com duas casas decimais (.2). 
// Diferença entre as funções
// number_format(): Ideal para formatos de números específicos, como moeda, permitindo a definição de separadores de milhar e decimais. 
// sprintf(): Mais flexível para formatação de strings complexas e não manipula separadores de milhares por padrão.

?>
