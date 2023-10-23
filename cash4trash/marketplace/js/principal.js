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
                //console.log(resposta);
                let dados = JSON.parse(resposta);
                if(!("erro" in dados)) {
                    let select = document.getElementById("marca");
                    atualizarSelect(dados, select);
                }
            }
        }
    }
    

    function atualizarSelect(dados, select) {
        var optgroup = document.getElementById("optgroup");
        if(optgroup != null) {
            optgroup.remove();
        }
        optgroup = criarNoElemento(select, "optgroup");
        criarNoAtributo(optgroup, "id", "optgroup");
        for(let u of dados) {
            let option = criarNoElemento(optgroup, "option");
            //alert(option);
            option.innerHTML = u.nome;
            criarNoAtributo(option, "value", u.nome);
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