<?php
	require "../index/conexao.php";
	require "operacoes.php";

	header("Content-Type: application/json");

	$json = '{"erro":true}';

	$conexao = getConexao();

	$query = $_GET["query"];



	if($conexao) {
		$marca = consultar_marcas($conexao, $query);
		mysqli_close($conexao);
		//$json = json_encode($marca);
		$json = json_encode($marca, JSON_UNESCAPED_UNICODE);
	}

	echo $json;
?>