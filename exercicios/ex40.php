<?php
// Para formatar datas em PHP, use a função date() para a data e hora atuais, ou o objeto DateTime (ou DateTimeImmutable) com o método format() para datas específicas, 
// ou ainda strftime() para datas por extenso no idioma local. O primeiro argumento é uma string de formato que indica como a data deve ser exibida, usando letras como d (dia), m (mês) e Y (ano). 


// Formatando a data e hora atuais
echo "Data atual (dd/mm/aaaa): " . date('d/m/Y') . "<br>"; // Saída: 20/09/2025

// Usando o objeto DateTime para uma data específica
$dataEspecifica = new DateTime('2023-10-25');
echo "Data específica: " . $dataEspecifica->format('Y-m-d') . "<br>"; // Saída: 2023-10-25

// Usando strftime para formato por extenso (requer configuração de locale)
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese'); // Configura o locale
echo "Data por extenso: " . strftime('%A, %d de %B de %Y', strtotime('today')) . "<br>";
// Saída (exemplo): Sábado, 20 de Setembro de 2025

// Funções e Objetos Principais

// date(string $format): Retorna a data e hora atuais no formato especificado. 
// Exemplo: date('d/m/Y') formata como dia/mês/ano (ex: 20/09/2025). 
// DateTimeImmutable / DateTime: Cria um objeto de data e hora que pode ser formatado. 
// Método format(string $format): Formata o objeto de data e hora para uma string. 
// Exemplo: (new DateTime('2023-10-25'))->format('Y-m-d') retorna 2023-10-25. 
// strftime(string $format, ?int $timestamp = null): Formata uma data/hora local de acordo com o locale do sistema. 
// Exemplo: strftime('%A, %d de %B de %Y') retorna a data completa por extenso, como "Sábado, 20 de Setembro de 2025", após a configuração do locale. 
// Caracteres de Formato Comuns 
// d: Dia do mês (com dois dígitos).
// m: Mês (com dois dígitos).
// Y: Ano (com quatro dígitos).
// y: Ano (com dois dígitos).
// H: Hora (formato de 24 horas).
// i: Minutos.
// s: Segundos.
// l (L minúsculo): Nome do dia da semana por extenso.
// F (F maiúsculo): Nome do mês por extenso.
// ParaDatas Específicas
// Para converter uma data de um formato (como do banco de dados) para outro, você pode usar strtotime() para convertê-la em um timestamp ou criar um objeto DateTime e depois formatá-la. 


$data_banco = '2024-01-15'; // Data vinda de um banco de dados
$data_objeto = new DateTime($data_banco);
echo $data_objeto->format('d/m/Y'); // Saída: 15/01/2024

?>
