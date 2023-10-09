<?php

    require "../index/conexao.php";
    $conexao = getConexao();

    session_start();


    $nome = $_POST["nome"];
    $nasc = $_POST["nasc"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
    $logradouro = $_POST["logradouro"];
    $cep = $_POST["cep"];
    $numero = $_POST["numero"];
    $complemento = $_POST["complemento"];
    $novasenha = $_POST["novasenha"];
    $senha = $_POST["senha"];



    if ($novasenha==""){
        $novasenha = $senha;
    }

    if (senhacerta($_SESSION["email"], $senha, $conexao)) {
        // Verificar se o CPF já existe no banco de dados
        //if (cpfvalido($cpf, $email, $conexao)) {
            // Conectar ao banco de dados (substitua "nome_do_banco", "nome_de_usuario" e "senha_do_usuario" pelas suas próprias informações)
            
            // Verificar se a conexão foi estabelecida corretamente
            if (!$conexao) {
                die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
            }
    
            $sql = "UPDATE usuario SET nome = ?, nascimento = ?, email = ?, cpf_cnpj = ?, cep = ?, logradouro = ?, numero = ?, complemento = ?, senha = ? WHERE email = ?";
    
            $stmt = mysqli_prepare($conexao, $sql);
    
            mysqli_stmt_bind_param($stmt, "ssssssisss", $nome, $nasc, $email, $cpf, $cep, $logradouro, $numero, $complemento, $novasenha, $_SESSION["email"]);
    
            $funcionou = mysqli_stmt_execute($stmt);

            var_dump($stmt);
    
            if ($funcionou) {
                
                $_SESSION["email"] = $email;
                $_SESSION["nome"] = $nome;
                $_SESSION["senha"] = $novasenha;
                $_SESSION['endereco'][0] = $logradouro;
                $_SESSION['endereco'][1] = $numero;

                header("location: pagina_usuario.php");

            } else {
                header("Location: ../cadastros/cadastro_erro.html");
                //echo "Problema na comunicação com o BD: " . mysqli_stmt_error($stmt);
            }
    
            mysqli_stmt_close($stmt);
            mysqli_close($conexao);
       //} else {
            //header("Location: ../cadastros/cadastro_existente.html");
            //echo "CPF já existe no banco.";
        //}
    } else {
        header("Location: ../cadastros/cadastro_erro.html");
        //echo "Senha incorreta.";
    }
    


    function senhacerta($email, $senha, $conexao){
        if($conexao) {
			
			$sql = "select * from usuario where email = ? and senha = ?";

			$stmt = mysqli_prepare($conexao, $sql);//PreparedStatement
			
			mysqli_stmt_bind_param($stmt, "ss", $email, $senha);//permite vincular os parâmentros da requisição (valores) ao comando que foi preparado ($stmt)
			
			mysqli_stmt_execute($stmt);//permite executar o comando preparadp já com os valores vinculados
			//ainda não devolve o resultado, só executa. devolve true ou false (até nos selects).

			$resultado = mysqli_stmt_get_result($stmt);//devolve o resultado de selects e similares (ex: show tables)
			//função APENAS para comandos preparados (PreparedStatement)
			// não executado corretamente = false
			// comando não é select/similar = false

			mysqli_stmt_close($stmt);

			if($resultado) {
				if(mysqli_num_rows($resultado) == 1) {
				    mysqli_free_result($resultado);
					return true;				
                }else {
				    mysqli_free_result($resultado);
                    return false;
				}
			}
			else {
                header("Location: cadastros/cadastro_erro.html");
				//echo "Problema na comunicação com o BD: " . mysqli_error($conexao);
			}
			mysqli_close($conexao);
		}
		else {
            header("Location: cadastros/cadastro_erro.html");
			//echo "Problema na conexão: " . mysqli_connect_error();
		}
    }

    function cpfvalido($cpf, $email, $conexao){
        $sql = "select email from usuario where cpf_cnpj = ?";

        $stmt = mysqli_prepare($conexao, $sql);
        
        mysqli_stmt_bind_param($stmt, "s", $cpf);
        
        mysqli_stmt_execute($stmt);

        $resultado = mysqli_stmt_get_result($stmt);
        
        if($resultado) {
            if(mysqli_num_rows($resultado) == 0) {
                    return true; //nenhum usuario tem esse cpf
            }else{
                $linha = mysqli_fetch_assoc($resultado);
                if ($email == $linha["email"]){
                    return true; //o proprio usuario tem esse cpf (não alterou)
                }else{
                    return false; //outro usuário tem esse cpf
                }
                
            }
        }
        else {
            header("Location: cadastros/cadastro_erro.html");
            //echo "Problema na comunicação com o BD: " . mysqli_error($conexao);
            return false;
        }   
    }
?>