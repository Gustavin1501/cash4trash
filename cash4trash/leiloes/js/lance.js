"use strict";

function preencherInput(valor) {
    document.getElementById("lance-input").value = valor;
}

var intervalID;  // Armazena o ID do intervalo para parar posteriormente

function iniciarAtualizacoesPreco() {
    intervalID = setInterval(function() {
        var id = pegaID();
        consultaPreco(id);
    }, 5000); // Mudar para 5000 para 5 segundos
}

function pararAtualizacoesPreco() {
    clearInterval(intervalID);
}

function consultaPreco(id) {
    let query = "query=" + id;

    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "consultapreco.php?" + query, true);
    xhttp.send();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4) {
            if (xhttp.status === 200) {
                let resposta = xhttp.responseText;
                let dados = JSON.parse(resposta);
                //console.log(dados.valor.toFixed(2));
                if ("valor" in dados && dados.valor !== null) {
                    let h3Element = document.getElementById("preco");
                    let valornoH3 = parseFloat(h3Element.textContent.replace("R$ ", ""));
                    if (dados.valor.toFixed(2)!==valornoH3){
                        atualizapreco(dados.valor.toFixed(2), "preco");
                        atualizaInput(dados.valor.toFixed(2));
                    }
                    atualizaBotaoSubmit(dados.valor.toFixed(2));
                }
            } else {
                console.error("Erro ao buscar preço:", xhttp.statusText);
            }
        }
    };
}

function atualizapreco(valor, h3) {
    var h3Element = document.getElementById(h3);
    if (h3Element) {
        h3Element.textContent = "R$ " + valor;
    }
}

function atualizaBotaoSubmit(valorLote) {
    var inputValor = parseFloat(document.getElementById("lance-input").value);
    var botaoSubmit = document.getElementById("lancar");
    valorLote = parseFloat(valorLote)+0.01;
    //console.log(valorLote+0.01);
    if (inputValor >= valorLote.toFixed(2)) {
        botaoSubmit.disabled = false;
    } else {
        botaoSubmit.disabled = true;
    }
}


function limitarCasasDecimais(valor, casasDecimais) {
    return parseFloat(valor).toFixed(casasDecimais);
}

function atualizaInput(valorLote) {
    var inputElement = document.getElementById("lance-input");
    var valorFormatado = limitarCasasDecimais(valorLote, 2); // Limita para 2 casas decimais
    //inputElement.value = valorFormatado;
    inputElement.min = valorFormatado;  // Define o mínimo como o novo valor
}





// Chame esta função para começar a buscar e atualizar os preços
iniciarAtualizacoesPreco();

// Adicionar um evento de escuta para atualizar o botão quando o valor do input mudar
var inputElement = document.getElementById("lance-input");

inputElement.addEventListener('input', function() {
    const value = inputElement.value;
    const regex = /^\d+(\.\d{0,2})?$/; // Regex para validar até 2 casas decimais

    if (!regex.test(value)) {
        inputElement.value = value.slice(0, -1); // Remove o último caractere inválido
    }

    var id = pegaID();
    consultaPreco(id);
});


