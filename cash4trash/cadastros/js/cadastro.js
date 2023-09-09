//exibir senhas
/*function exibirSenha() {
    const senhaInput = document.getElementById('senha');
    const senha2Input = document.getElementById('senha2');
    const checkbox = document.getElementById('opcao');
  
    checkbox.addEventListener('change', function() {
      if (checkbox.checked) {
        senhaInput.type = 'text';
        senha2Input.type = 'text';
      } else {
        senhaInput.type = 'password';
        senha2Input.type = 'password';
      }
    });
  }*/

  function formatCEP(cep) {
    cep = cep.replace(/\D/g, ''); // remove qualquer caractere que não seja número
    cep = cep.substring(0, 8); // limita o CEP a 8 dígitos
  
    if (cep.length > 5) {
      cep = cep.replace(/(\d{5})(\d)/, '$1-$2'); // adiciona um traço após os primeiros cinco dígitos
    }
  
    return cep;
  }
  
  // exemplo de uso:
  const inputCEP = document.getElementById('cep');
  
  inputCEP.addEventListener('input', function(event) {
    event.target.value = formatCEP(event.target.value);
  });
  
  
  function formatCPF(cpf) {
    cpf = cpf.replace(/\D/g, ''); // remove qualquer caractere que não seja número
    cpf = cpf.substring(0, 11); // limita o CPF a 11 dígitos
  
    if (cpf.length > 9) {
      cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // adiciona um ponto após os primeiros três dígitos
    }
    if (cpf.length > 6) {
      cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // adiciona outro ponto após os próximos três dígitos
    }
    if (cpf.length > 3) {
      cpf = cpf.replace(/(\d{3})(\d)/, '$1-$2'); // adiciona um traço após os próximos três dígitos
    }
  
    return cpf;
  }
  
  // exemplo de uso:
  const inputCPF = document.getElementById('cpf');
  
  inputCPF.addEventListener('input', function(event) {
    event.target.value = formatCPF(event.target.value);
  });
  

//Função para validar o email
function validarEmail() {
    const email = document.getElementById("email").value;
    const emailErro = document.getElementById("emailErro");
  
    if (!/\S+@\S+\.\S+/.test(email)) {
      emailErro.innerHTML = "Email inválido";
      return false;
    } else {
      emailErro.innerHTML = "";
      return true;
    }
  }
  
  //Função para validar o CEP
  function validarCEP() {
    const cep = document.getElementById("cep").value;
    const cepErro = document.getElementById("cepErro");
  
    if (!/^\d{5}-?\d{3}$/.test(cep)) {
      cepErro.innerHTML = "CEP inválido";
      return false;
    } else {
      cepErro.innerHTML = "";
      return true;
    }
  }
  
  //Função para validar as senhas iguais
  function validarSenhas() {
    const senha = document.getElementById("senha").value;
    const senha2 = document.getElementById("senha2").value;
    const senhaErro = document.getElementById("senhaErro");
  
    if (senha !== senha2) {
      senhaErro.innerHTML = "As senhas não são iguais";
      return false;
    } else {
      senhaErro.innerHTML = "";
      return true;
    }
  }
  
  //Função para habilitar o botão de cadastro quando todos os campos estiverem preenchidos corretamente
  function validarFormulario() {
    const cpf = document.getElementById("cpf").value;
    const nome = document.getElementById("nome").value;
    const emailValido = validarEmail();
    const nasc = document.getElementById("nasc").value;
    const cepValido = validarCEP();
    const senhasValidas = validarSenhas();
    const btnCadastro = document.getElementById("btnCadastro");
  
    if (cpf !== "" && nome !== "" && emailValido && nasc !== "" && cepValido && senhasValidas) {
      //document.getElementById("senha").value = md5(senha);
      btnCadastro.disabled = false;
    } else {
      btnCadastro.disabled = true;
    }
  }
  
  //Adiciona eventos aos campos do formulário para validação em tempo real
  document.getElementById("email").addEventListener("keyup", validarEmail);
  document.getElementById("email").addEventListener("keyup", validarFormulario);

  document.getElementById("cep").addEventListener("keyup", validarCEP);
  document.getElementById("cep").addEventListener("keyup", validarFormulario);

  document.getElementById("senha").addEventListener("keyup", validarSenhas);
  document.getElementById("senha").addEventListener("keyup", validarFormulario);

  document.getElementById("senha2").addEventListener("keyup", validarSenhas);
  document.getElementById("senha2").addEventListener("keyup", validarFormulario);

  document.getElementById("cpf").addEventListener("keyup", validarFormulario);
  document.getElementById("nome").addEventListener("keyup", validarFormulario);
  document.getElementById("nasc").addEventListener("change", validarFormulario);

//valida cpf
  function validarCPF(cpf) {
    cpf = cpf.replace(/[^\d]+/g,'');
    if(cpf == '') return false;
    // Elimina CPFs invalidos conhecidos
    if (cpf.length != 11 || 
        cpf == "00000000000" || 
        cpf == "11111111111" || 
        cpf == "22222222222" || 
        cpf == "33333333333" || 
        cpf == "44444444444" || 
        cpf == "55555555555" || 
        cpf == "66666666666" || 
        cpf == "77777777777" || 
        cpf == "88888888888" || 
        cpf == "99999999999")
            return false;
    // Valida 1o digito
    add = 0;
    for (i=0; i < 9; i ++)
        add += parseInt(cpf.charAt(i)) * (10 - i);
        rev = 11 - (add % 11);
        if (rev == 10 || rev == 11)
            rev = 0;
        if (rev != parseInt(cpf.charAt(9)))
            return false;
    // Valida 2o digito
    add = 0;
    for (i = 0; i < 10; i ++)
        add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(10)))
        return false;
    return true;
  }
  
  // Usando a função de validação de CPF no campo de entrada correspondente
  const cpfInput = document.getElementById('cpf');
  const cpfErro = document.getElementById('cpfErro');
  cpfInput.addEventListener('blur', function() {
    if (!validarCPF(cpfInput.value)) {
      cpfErro.textContent = "CPF inválido";
    } else {
      cpfErro.textContent = "";
    }
  });
  
  

  //exibirSenha();
