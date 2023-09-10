<?php
	require "../index/conexao.php";

	header("Content-Type: application/json");

	$json = '{"erro":true}';

	$conexao = getConexao();

	$query = $_GET["query"];

	if($conexao) {
        $preco = consultar_precos($conexao, $query);
        mysqli_close($conexao);
        $json = json_encode(["valor" => $preco]); // Coloque os dados em um array associativo
    }
    
    echo $json;
    

	function consultar_precos($conexao, $id) {
		$sql = "select valor from lance where lote = ? order by valor desc";
		
		$stmt = mysqli_prepare($conexao, $sql);

		if($stmt) {
			mysqli_stmt_bind_param($stmt, "i", $id);

			$executou = mysqli_stmt_execute($stmt);

			if($executou) {
				$resultado = mysqli_stmt_get_result($stmt);

				if($resultado) {
                    $linha = mysqli_fetch_assoc($resultado);
					$valor = $linha["valor"];
					mysqli_free_result($resultado);
				}
			}
			mysqli_stmt_close($stmt);
		}
		return $valor;
	}
?>
