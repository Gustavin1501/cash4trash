<?php
    require "../index/conexao.php";

    $conexao = getConexao();
    function select_query($sql, $conexao){

    $resultado = mysqli_query($conexao, $sql);

    if (!$resultado) {
    echo "Erro na consulta: " . mysqli_error($conexao);
    exit;
    }
    return $resultado;
    }

    $qtd = $_POST["valor_i"];
    //echo $qtd;
    if ($qtd!= 0){
        for ($i=1; $i<=$qtd; $i++){
            
            if(isset($_POST["opcao".$i])){
                $id = $_POST["opcao".$i];
                $resultado = select_query("update lote set melhores = '1' where id ='". $id . "'", $conexao);

            }
        }
    }
    

?>