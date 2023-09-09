//exibir senhas
/*function exibirSenhaP() {
  const senhaInputP = document.getElementById('senhaP');
  const senha2InputP = document.getElementById('senha2P');
  const checkboxP = document.getElementById('opcaoP');

  checkboxP.addEventListener('change', function() {
    if (checkboxP.checked) {
      senhaInputP.type = 'text';
      senha2InputP.type = 'text';
    } else {
      senhaInputP.type = 'password';
      senha2InputP.type = 'password';
    }
  });
}*/
function formatCNPJ(cnpj) {
  cnpj = cnpj.replace(/\D/g, ''); // remove qualquer caractere que não seja número
  cnpj = cnpj.substring(0, 14); // limita o CNPJ a 14 dígitos

  if (cnpj.length > 12) {
    cnpj = cnpj.replace(/(\d{2})(\d)/, '$1.$2'); // adiciona um ponto após os primeiros dois dígitos
  }
  if (cnpj.length > 8) {
    cnpj = cnpj.replace(/(\d{3})(\d)/, '$1.$2'); // adiciona outro ponto após os próximos três dígitos
  }
  if (cnpj.length > 5) {
    cnpj = cnpj.replace(/(\d{3})(\d)/, '$1/$2'); // adiciona uma barra após os próximos três dígitos
  }
  if (cnpj.length > 1) {
    cnpj = cnpj.replace(/(\d{4})(\d)/, '$1-$2'); // adiciona um traço após os próximos quatro dígitos
  }

  return cnpj;
}

// exemplo de uso:
const inputCNPJ = document.getElementById('cnpj');

inputCNPJ.addEventListener('input', function(event) {
  event.target.value = formatCNPJ(event.target.value);
});


// exemplo de uso:
const inputCEPP = document.getElementById('cepP');

inputCEPP.addEventListener('input', function(event) {
  event.target.value = formatCEP(event.target.value);
});


//Função para validar o email
function validarEmailP() {
  const emailP = document.getElementById("emailP").value;
  const emailErroP = document.getElementById("emailErroP");

  if (!/\S+@\S+\.\S+/.test(emailP)) {
    emailErroP.innerHTML = "Email inválido";
    return false;
  } else {
    emailErroP.innerHTML = "";
    return true;
  }
}

//Função para validar o CEP
function validarCEPP() {
  const cepP = document.getElementById("cepP").value;
  const cepErroP = document.getElementById("cepErroP");

  if (!/^\d{5}-?\d{3}$/.test(cepP)) {
    cepErroP.innerHTML = "CEP inválido";
    return false;
  } else {
    cepErroP.innerHTML = "";
    return true;
  }
}

//Função para validar as senhas iguais
function validarSenhasP() {
  const senhaP = document.getElementById("senhaP").value;
  const senha2P = document.getElementById("senha2P").value;
  const senhaErroP = document.getElementById("senhaErroP");

  if (senhaP !== senha2P) {
    senhaErroP.innerHTML = "As senhas não são iguais";
    return false;
  } else {
    senhaErroP.innerHTML = "";
    return true;
  }
}

//Função para habilitar o botão de cadastro quando todos os campos estiverem preenchidos corretamente
function validarFormularioP() {
  const cnpj = document.getElementById("cnpj").value;
  const nomeP = document.getElementById("nomeP").value;
  const emailValidoP = validarEmailP();
  const setor = document.getElementById("setor").value;
  const cepValidoP = validarCEPP();
  const senhasValidasP = validarSenhasP();
  const btnCadastroP = document.getElementById("btnCadastroP");

  if (cnpj !== "" && nomeP !== "" && emailValidoP && setor !== "" && cepValidoP && senhasValidasP) {
    //document.getElementById("senha").value = md5(senha);
    btnCadastroP.disabled = false;
  } else {
    btnCadastroP.disabled = true;
  }
}

//Adiciona eventos aos campos do formulário para validação em tempo real
document.getElementById("emailP").addEventListener("keyup", validarEmailP);
document.getElementById("emailP").addEventListener("keyup", validarFormularioP);

document.getElementById("cepP").addEventListener("keyup", validarCEPP);
document.getElementById("cepP").addEventListener("keyup", validarFormularioP);

document.getElementById("senhaP").addEventListener("keyup", validarSenhasP);
document.getElementById("senha2P").addEventListener("keyup", validarSenhasP);

document.getElementById("senhaP").addEventListener("keyup", validarFormularioP);
document.getElementById("senha2P").addEventListener("keyup", validarFormularioP);
document.getElementById("cnpj").addEventListener("keyup", validarFormularioP);
document.getElementById("nomeP").addEventListener("keyup", validarFormularioP);
document.getElementById("setor").addEventListener("change", validarFormularioP);
document.getElementById("tipo").addEventListener("change", validarFormularioP);


//valida cnpj
function validarcnpjP(cnpj) {
  const regex = /^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$/;
  return regex.test(cnpj);
}

// Usando a função de validação de cnpj no campo de entrada correspondente
const cnpjInputP = document.getElementById('cnpj');
const cnpjErroP = document.getElementById('cnpjErroP');
cnpjInputP.addEventListener('blur', function() {
  if (!validarcnpjP(cnpjInputP.value)) {
    cnpjErroP.textContent = "cnpj inválido";
  } else {
    cnpjErroP.textContent = "";
  }
});



//exibirSenhaP();