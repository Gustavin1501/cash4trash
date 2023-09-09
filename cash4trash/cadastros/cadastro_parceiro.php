<?php
    $nome = $_POST["nomeP"];
    $setor = $_POST["setor"];
	$cpf = $_POST["cnpj"];
    $email = $_POST["emailP"];
    $cep = $_POST["cepP"];
    $logradouro = $_POST["logradouroP"];
    $numero = $_POST["numeroP"];
    $complemento = $_POST["complementoP"];
    $senha = $_POST["senhaP"];
    $senha2 = $_POST["senha2P"];
    $tipo = $_POST["tipo"];

    
	$trimsenha=trim($senha);
	$trimcpf = trim($cpf);
	if(!empty($trimcpf) && !empty($trimsenha)) {
		
		require "conexao.php";
		
		$conexao = getConexao();
		
		if($conexao) {
            
            if (!existe($cpf)){
                $sql = "insert into `usuario` (`nome`,`setor`,`cpf_cnpj`,`email`,`cep`,`logradouro`,`numero`,`complemento`,`senha`, `tipo`) VALUES (?,?,?,?,?,?,?,?,?,?)";

                $stmt = mysqli_prepare($conexao, $sql);//PreparedStatement
                
                mysqli_stmt_bind_param($stmt, "ssssssisss", $nome, $setor, $cpf, $email, $cep, $logradouro, $numero, $complemento, $senha, $tipo);//permite vincular os parâmentros da requisição (valores) ao comando que foi preparado ($stmt)
                
                $funcionou = mysqli_stmt_execute($stmt);//permite executar o comando preparadp já com os valores vinculados
                //ainda não devolve o resultado, só executa. devolve true ou false (até nos selects).
    
                
    
                if($funcionou) {
                    echo "Usuário cadastrado com sucesso";
                }
                else {
                    echo "Problema na comunicação com o BD: " . mysqli_stmt_error($stmt);
                }
                mysqli_stmt_close($stmt);
                mysqli_close($conexao);
            }else{
                echo "CNPJ ja existe no banco";
            }

            
			
			
		}
		else {
			echo "Problema na conexão: " . mysqli_connect_error();
		}
	}
	else {
		echo "vazio";
	}

    function existe($cpf){
        $sql = "select count(*) from usuario where cpf_cnpj = ?";

        $conexao = getConexao();
        $stmt = mysqli_prepare($conexao, $sql);
        
        mysqli_stmt_bind_param($stmt, "s", $cpf);
        
        mysqli_stmt_execute($stmt);

        $resultado = mysqli_stmt_get_result($stmt);
        
        if($resultado) {
            if(mysqli_num_rows($resultado) == 1) {
                $linha = mysqli_fetch_row($resultado);
                if($linha[0]==1){
                    return true;
                }else {
                    return false;
                }   
            }
        }
        else {
            echo "Problema na comunicação com o BD: " . mysqli_error($conexao);
            return true;
        }
        
        
    
    }
?>