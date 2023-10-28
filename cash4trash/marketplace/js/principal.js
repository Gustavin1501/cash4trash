"use strict";

window.onload = function() {
    var cat = document.getElementById("categoria");
    cat.onchange = function(){
        //pega valor de cat
        let categoria = cat.value;
        //consulta marcas relacionadas
        consultar(categoria);
    }

    function consultar(categoria) {
        let query = "query="+categoria;
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "../produto/consultamarca.php?"+query, true);
        xhttp.send();
        xhttp.onreadystatechange = function() {
            if(xhttp.readyState == 4 && xhttp.status == 200) {
                let resposta = xhttp.responseText;
                console.log(resposta);
                let dados = JSON.parse(resposta);
                if(!("erro" in dados)) {
                    let select = document.getElementById("marca");
                    atualizarSelect(dados, select);
                }
            }
        }
    }
    

    function atualizarSelect(dados, select) {
        // Limpar qualquer opção anterior
        select.innerHTML = '';
    
        let nomePendente = null;
        for (let u of dados) {
            if (nomePendente !== null && u.id !== undefined) {
                let option = document.createElement("option");
                option.value = u.id;
                option.innerHTML = nomePendente; // Usar o nome pendente
                select.appendChild(option);
                nomePendente = null; // Reiniciar o nome pendente
            }
            
            if (u.nome !== undefined) {
                nomePendente = u.nome; // Armazenar o nome pendente
            }
        }
    }
  
    
    

    function criarNoElemento(pai, nomeElemento) {
        //completar aqui
        var elemento = document.createElement(nomeElemento);
        pai.appendChild(elemento);
        return elemento;
    }
    
    //função responsável pela criação de um nó atributo (associado a um elemento)
    function criarNoAtributo(elemento, nomeAtributo, valorAtributo) {
        //completar aqui
        var atributo = document.createAttribute(nomeAtributo);
        atributo.nodeValue = valorAtributo;
        elemento.setAttributeNode(atributo);
    }
};