<?php

    $dir = "img_usuarios";
    $diretorio = $dir . '/semfoto.jpg';
    $nome = $_POST["nome"];
    $nasc = $_POST["nasc"];
	$cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $cep = $_POST["cep"];
    $logradouro = $_POST["logradouro"];
    $numero = $_POST["numero"];
    $complemento = $_POST["complemento"];
    $senha = $_POST["senha"];
    $senha2 = $_POST["senha2"];
    $tipo="U";

    //testando git
    
	$trimsenha=trim($senha);
	$trimcpf = trim($cpf);
	if(!empty($trimcpf) && !empty($trimsenha)) {
		
		require "conexao.php";
		
		$conexao = getConexao();
		
		if($conexao) {
            
            if (!existe($cpf)){
                $sql = "insert into `usuario` (`nome`,`nascimento`,`cpf_cnpj`,`email`,`cep`,`logradouro`,`numero`,`complemento`,`senha`, `tipo`, `diretorio`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";

                $stmt = mysqli_prepare($conexao, $sql);//PreparedStatement
                
                mysqli_stmt_bind_param($stmt, "ssssssissss", $nome, $nasc, $cpf, $email, $cep, $logradouro, $numero, $complemento, $senha, $tipo, $diretorio);//permite vincular os parâmentros da requisição (valores) ao comando que foi preparado ($stmt)
                
                $funcionou = mysqli_stmt_execute($stmt);//permite executar o comando preparadp já com os valores vinculados
                //ainda não devolve o resultado, só executa. devolve true ou false (até nos selects).
    

    
                if($funcionou) {
                    header("location: cadastro_sucesso.html");
                }
                else {
                    header("location: cadastro_erro.html");
                    //echo "Problema na comunicação com o BD: " . mysqli_stmt_error($stmt);
                }
                mysqli_stmt_close($stmt);
                mysqli_close($conexao);
            }else{
                header("location: cadastro_existente.html");
            }

            
			
			
		}
		else {
            header("location: cadastro_erro.html");
			//echo "Problema na conexão: " . mysqli_connect_error();
		}
	}
	else {
		header("location: cadastro_erro.html");
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
            header("location: cadastro_erro.html");
            //echo "Problema na comunicação com o BD: " . mysqli_error($conexao);
            //return true;
        }
    
    }
?>