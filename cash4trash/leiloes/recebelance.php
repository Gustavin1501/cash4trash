<?php
session_start();

if(!isset($_SESSION["email"])) {
    header("location: ../login/login.html");
    die();
}else{
    
$lote = $_POST["lote"];
$lance = $_POST["lance"];
$usuario = $_SESSION["email"];
$tempo = time();

require "../index/conexao.php";

$conexao = getConexao();

if ($conexao) {
    $sql = "INSERT INTO lance (lote, valor, usuario, tempo) VALUES (?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conexao, $sql); // PreparedStatement

    mysqli_stmt_bind_param($stmt, "idsi", $lote, $lance, $usuario, $tempo); // Vincular parâmetros
    
    $funcionou = mysqli_stmt_execute($stmt); // Executar inserção

    if ($funcionou) {
        // Atualizar o valor_atual na tabela lote
        $updateSql = "UPDATE lote SET valor_atual = ? WHERE id = ?";
        $updateStmt = mysqli_prepare($conexao, $updateSql);
        mysqli_stmt_bind_param($updateStmt, "di", $lance, $lote);
        mysqli_stmt_execute($updateStmt);

        mysqli_stmt_close($updateStmt);

        header("location: produto.php?id=" . $lote);
    } else {
        echo "Problema na comunicação com o BD: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt); // Fechar declaração preparada
    mysqli_close($conexao); // Fechar conexão com o banco de dados
} else {
    echo "Problema na conexão: " . mysqli_connect_error();
}
}

?>
