<?php
	function getConexao() {
		$host = "localhost";
		$usuario = "lau";
		$senha = "123";
		$bd = "cash4trash";
		$conexao = mysqli_connect($host, $usuario, $senha, $bd);
		mysqli_set_charset($conexao, "utf8");
		return $conexao;
		//teste
	}
?>