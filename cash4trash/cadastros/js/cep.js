function buscaCep(){
    let cep = document.getElementById('cep').value;
    if (cep !== ""){
        let url = "https://brasilapi.com.br/api/cep/v1/" + cep;
        
        let req = new XMLHttpRequest();
        req.open("GET", url);
        req.send();

        req.onload - function(){
            if(req.status === 200){
                let endereco = JSON.parse(req.response);
                document.getElementById("logradouro").value = endereco.street;
                document.getElementById("cidade").value = endereco.city;
            }
            else if(req.status === 404){
                alert("CEP inválido");
            }
            else{
                alert("Erro ao fazer requisição");
            }
        }
    }
}

window.onload = function(){
    let cep = document.getElementById("cep");
    cep.addEventListener("blur", buscaCep);
}

