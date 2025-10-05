let form = document.querySelector("form");

form.addEventListener("submit", function(event) {
    event.preventDefault(); // Impede o envio padrão do formulário

    let nome = document.getElementById("nome").value;
    let telefone = document.getElementById("telefone").value;
    let data_nascimento = document.getElementById("data_nascimento").value;
    let rua = document.getElementById("rua").value;
    let cidade = document.getElementById("cidade").value;
    let mensagem = document.getElementById("mensagem").value;

    // Aqui você pode adicionar a lógica para processar os dados do formulário
    var dadosForm = {
        nome: nome,
        telefone: telefone,
        data_nascimento: data_nascimento,
        rua: rua,
        cidade: cidade,
        mensagem: mensagem
    };

    var myJSON = JSON.stringify(dadosForm);
    // Exemplo de feedback ao usuário

    // https://stackoverflow.com/questions/50075818/api-call-using-fetch-with-method-get

    fetch("salve.php?dados=" + encodeURIComponent(myJSON), {
        method: 'GET',
        headers: {
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'custom-security': 'XXXX',
            'Purchase-Code': 'XXXXXXX',
            'Content-Type': 'application/json',
            'Cache-Control': 'max-age=640000'
        }
    })
        .then((response) => response.json())
        .then((responseJson) => {
            console.log(responseJson);
        })
        .catch((error) => {
            console.error(error);
        });

    window.location = "salve.php?dados=" + encodeURIComponent(myJSON)

    // alert("Formulário enviado com sucesso!");
});