<?php

	$email = $_POST["email"];
    $senha = $_POST["senha"];
	
	$trimsenha=trim($senha);
	$trimemail = trim($email);
	if(!empty($trimemail) && !empty($trimsenha)) {
		
		require "../index/conexao.php";
		
		$conexao = getConexao();
		
		if($conexao) {
		
			//$senha = md5($senha);
			
			$sql = "select email, nome, tipo, logradouro, numero from usuario where email = ? and senha = ?";

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
					$usuario = mysqli_fetch_assoc($resultado);
					$email_usuario = $usuario["email"];
					$nome_usuario = $usuario["nome"];
					$tipo_usuario = $usuario["tipo"];
					$logradouro_usuario = $usuario["logradouro"];
					$num_usuario = $usuario["numero"];

					session_start();
					$_SESSION["email"] = $email_usuario;
					$_SESSION["nome"] = $nome_usuario;
					$_SESSION["senha"] = $senha;
					$_SESSION["tipo"] = $tipo_usuario;
					$_SESSION['endereco'][0] = $logradouro_usuario;
					$_SESSION['endereco'][1] = $num_usuario;

					if ($_SESSION["tipo"]=="A"){
						header("location: ../adm/index.php");
					}else if ($_SESSION["tipo"]=="L"){
						header("location: ../index/indexL.php");
					}else if ($_SESSION["tipo"]=="G"){
						header("location: ../index/indexG.php");
					}else if ($_SESSION["tipo"]=="M"){
						header("location: ../index/indexM.php");
					}else{
						header("location: ../index/index.php");
					}
				}
				else {

					echo "nao cadastrado";
				}
				mysqli_free_result($resultado);
			}
			else {
				echo "Problema na comunicação com o BD: " . mysqli_error($conexao);
			}
			mysqli_close($conexao);
		}
		else {
			echo "Problema na conexão: " . mysqli_connect_error();
		}
	}
	else {
		echo"erro na conexao";
	}
?>