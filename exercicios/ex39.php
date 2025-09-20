<?php
// Para formatar uma data específica em uma única linha em PHP, use a função date_format() com um objeto DateTimeImmutable ou DateTime e a função strtotime() para converter a data desejada em um formato interpretável.
//   Por exemplo, echo date_format(new DateTime('2023-09-10'), 'd/m/Y'); formatará a data '2023-09-10' para '10/09/2023'. 
// Usando DateTimeImmutable e date_format()
// Esta é a maneira recomendada para manipular datas em PHP, pois é mais flexível e segura para evitar modificações acidentais. 
// Crie um objeto DateTimeImmutable: Use new DateTime() para definir a data específica.
// Aplique format(): Use o método format() para especificar o formato de saída desejado.



echo (new DateTimeImmutable('2023-09-10'))->format('d/m/Y'); // Saída: 10/09/2023

// Usando strtotime() e date()
// Para uma abordagem mais rápida com datas em formato texto, você pode usar strtotime() para converter a data em um timestamp e depois formatá-la com date(). 
// Use strtotime(): Converta a data de texto para um timestamp Unix. 
// Use date(): Formate o timestamp usando o código de formato de data desejado. 


echo date('d/m/Y', strtotime('2023-09-10')); // Saída: 10/09/2023

// Códigos de Formato Comuns 
// d: Dia do mês, com dois dígitos (01 a 31)
// m: Mês, com dois dígitos (01 a 12)
// Y: Ano, com quatro dígitos (ex: 2023)
// H: Hora no formato 24 horas (00 a 23)
// i: Minutos com zeros à esquerda (00 a 59)
// s: Segundos com zeros à esquerda (00 a 59)

  ?>
