
function calcularPagamento() {
    const quantidade = parseInt(document.getElementById('quantidade').value);
    const totalCompra = parseFloat(document.getElementById('totalCompra').value);
    const parcelamento = document.getElementById('parcelamento').value;
    const tipoCliente = document.getElementById('tipoCliente').value;

    if (isNaN(quantidade) || isNaN(totalCompra) || quantidade <= 0 || totalCompra <= 0) {
        alert("Por favor, preencha todos os campos corretamente.");
        return;
    }

    let desconto = 0;

    // Descontos baseados no tipo de cliente
    switch (tipoCliente) {
        case 'novo':
            desconto = 0; // Sem desconto para novo cliente
            break;
        case 'volta':
            desconto = 0.05; // 5% de desconto
            break;
        case 'genteBoa':
            desconto = 0.10; // 10% de desconto
            break;
        case 'supremo':
            desconto = 0.15; // 15% de desconto
            break;
    }

    let valorFinal = totalCompra * (1 - desconto);

    if (parcelamento === '10x') {
        // Acrescentando juros para parcelamento em 10 vezes
        valorFinal = valorFinal * 1.15; // 15% de juros
    }

    const valorParcelado = parcelamento === '10x' ? valorFinal / 10 : valorFinal;

    let resultadoText = `Total da Compra: R$ ${totalCompra.toFixed(2)}<br>`;
    resultadoText += `Desconto Aplicado: ${desconto * 100}%<br>`;
    resultadoText += `Valor Final: R$ ${valorFinal.toFixed(2)}<br>`;

    if (parcelamento === 'vista') {
        resultadoText += `Valor à vista: R$ ${valorFinal.toFixed(2)}<br>`;
    } else {
        resultadoText += `Parcelamento em 10x: R$ ${valorParcelado.toFixed(2)} por parcela.<br>`;
    }

    document.getElementById('result').innerHTML = resultadoText;
}
