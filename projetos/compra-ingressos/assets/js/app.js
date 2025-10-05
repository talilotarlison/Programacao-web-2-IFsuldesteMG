// valores ingresso do filme meia
let valorIngressoMeia = document.getElementById("valor-meia");
// valores ingresso do filme inteira
let valorIngressoInteira = document.getElementById('valor-inteira');

// quantidade de ingressos comprados inteira
let quantidadeIngressosInteira = document.getElementById("qtd_ingressos_inteira");
// quantidade de ingressos comprados meia
let quantidadeIngressosMeia = document.getElementById("qtd_ingressos_meia");

// tipo de pagamento inteira
let quantidadeParcelasIngressosInteira = document.getElementById("parcelamento_inteira");
// tipo de pagamento meia
let quantidadeParcelasIngressosMeia = document.getElementById("parcelamento_meia");

// exibir resultado inteira
let valorTotalInteiraShow = document.getElementById("valor_total_inteira");


// exibir resultado meia
let valorTotalMeiaShow = document.getElementById("valor_meia");

function totalPagamentoInteiraAvista(quantidade, valor, desconto) {
    let totalPagamento = (quantidade * valor);
    let totalDesconto = (quantidade * valor) * desconto;
    return totalPagamento - totalDesconto;
}

function totalPagamentoInteiraParcelado(quantidade, valor, taxa) {
    let totalPagamento = (quantidade * valor);
    let totalJuros = (quantidade * valor) * taxa;
    return totalPagamento + totalJuros;
}

let pagamentoAvisto = {
    desconto: 0.08
}

let pagamentoParcelado = {
    taxaEm2x: 0.08,
    taxaEm3x: 0.10,
    taxaEm4x: 0.12
}


// funcao calcula dados da compra
function calcularDadosDaCompra(valorIngresso, quantidadeIngressosComprado, quantidadeParcelasIngressos, valorTotalShow) {
    quantidadeParcelasIngressos.addEventListener("change", () => {
        // console.log(valorIngresso.dataset.preco, quantidadeIngressosComprado.value, quantidadeParcelasIngressos.value, valorTotalShow);

        let quantidadeIngressos = parseFloat(quantidadeIngressosComprado.value);
        let valorIngressoConvertido = parseFloat(valorIngresso.dataset.preco);

        let tipoDeParcelamento = quantidadeParcelasIngressos.value;

        if (tipoDeParcelamento == 1) {
            // pagemento avista
            let descontoAplicado = pagamentoAvisto.desconto;
            let totalPagar = totalPagamentoInteiraAvista(quantidadeIngressos, valorIngressoConvertido, descontoAplicado);
            valorTotalShow.value = `${totalPagar.toFixed(2)}`
        } else if (tipoDeParcelamento == 2) {
            // aplicar desconto em parcelamento
            let taxa = pagamentoParcelado.taxaEm2x;
            let totalPagar = totalPagamentoInteiraParcelado(quantidadeIngressos, valorIngressoConvertido, taxa);
            let resultadoParcelamento = `${tipoDeParcelamento} x ${(totalPagar / tipoDeParcelamento).toFixed(2)} = ${totalPagar.toFixed(2)}`;
            valorTotalShow.value = resultadoParcelamento.toString();
        } else if (tipoDeParcelamento == 3) {
            // aplicar desconto em parcelamento
            let taxa = pagamentoParcelado.taxaEm3x;
            let totalPagar = totalPagamentoInteiraParcelado(quantidadeIngressos, valorIngressoConvertido, taxa);
            let resultadoParcelamento = `${tipoDeParcelamento} x ${(totalPagar / tipoDeParcelamento).toFixed(2)} = ${totalPagar.toFixed(2)}`;
            valorTotalShow.value = resultadoParcelamento.toString(2);
        } else {
            let taxa = pagamentoParcelado.taxaEm3x;
            let totalPagar = totalPagamentoInteiraParcelado(quantidadeIngressos, valorIngressoConvertido, taxa);
            let resultadoParcelamento = `${tipoDeParcelamento} x ${(totalPagar / tipoDeParcelamento).toFixed(2)} = ${totalPagar.toFixed(2)}`;
            valorTotalShow.value = resultadoParcelamento.toString(2);
        }


    })
}

// calcular inteira
calcularDadosDaCompra(valorIngressoInteira, quantidadeIngressosInteira, quantidadeParcelasIngressosInteira, valorTotalInteiraShow)
// calcular meia
calcularDadosDaCompra(valorIngressoMeia, quantidadeIngressosMeia, quantidadeParcelasIngressosMeia, valorTotalMeiaShow)