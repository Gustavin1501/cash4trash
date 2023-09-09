<?php

	function consultar_marcas($conexao, $categoria) {
		$sql = "select nome from marca where categoria = ? order by nome";
		
		$stmt = mysqli_prepare($conexao, $sql);

		$marcas = [];

		if($stmt) {
			mysqli_stmt_bind_param($stmt, "s", $categoria);

			$executou = mysqli_stmt_execute($stmt);

			if($executou) {
				$resultado = mysqli_stmt_get_result($stmt);

				if($resultado) {
					$i = 0;
					while($linha = mysqli_fetch_assoc($resultado)) {
						$marcas[$i++] = array("nome" => $linha["nome"]);
					}
					mysqli_free_result($resultado);
				}
			}
			mysqli_stmt_close($stmt);
		}
		return $marcas;
	}
?>