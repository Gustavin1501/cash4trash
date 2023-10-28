<?php

require "../index/conexao.php";
$conexao = getConexao();

$quantidade = $_POST['quantidade'];

for ($id = 1; $id <= $quantidade; $id++) {
    $dados = explode('*', $_POST[$id]);
    $usuario = $dados[0];
    $valor = $dados[1];
    $idLote = $dados[2];


    // altera saldo
    $atualizarSaldo = "UPDATE usuario SET saldo = saldo + ". $valor ." WHERE email = '$usuario'";
    
    $resultado1 = mysqli_query($conexao, $atualizarSaldo);

    if ($resultado1){
        // Após enviar com sucesso, atualize o status do lote para '3'
        $atualizarStatus = "UPDATE lote SET statu = '4' WHERE id = '$idLote' and statu = '3'";

        $resultado2 = mysqli_query($conexao, $atualizarStatus);
        if ($resultado2){
            echo "CALULAs enviadas e lotes atualizados com sucesso!";
        }else{
            echo "Erro ao atualizar status do lote.";
        }
    }else{
        echo "Erro ao atualizar saldo: " . mysqli_error($conexao) . "\n";
    }

}

?>