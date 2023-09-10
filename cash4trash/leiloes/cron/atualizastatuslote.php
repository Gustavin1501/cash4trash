<?php
// Conecte-se ao banco de dados
//require "../../index/conexao.php";
$conexao = getConexao();

// Verifique se a conexão foi bem-sucedida
if (!$conexao) {
    echo "Erro na conexão com o banco de dados: " . mysqli_connect_error();
    exit;
}

// Verifique os leilões expirados
$sql = "SELECT id, inicio FROM lote WHERE statu='1'";
$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
    echo "Erro na consulta: " . mysqli_error($conexao);
    exit;
}

$sql2 = "UPDATE lote SET statu = '2' WHERE id = '0'"; // Inicialize a consulta de atualização

while ($linha = mysqli_fetch_assoc($resultado)) {
    $id = mysqli_real_escape_string($conexao, $linha["id"]);
    $segundos = $linha["inicio"];
    
    // Adicione uma margem de segurança de 60 segundos (por exemplo)
    if ($segundos + 60 <= time()) {
        $sql2 .= " OR id = '$id'";
    }
}

// Atualize o status dos lotes no banco de dados
$resultado = mysqli_query($conexao, $sql2);

if (!$resultado) {
    echo "Erro na consulta de atualização: " . mysqli_error($conexao);
    exit;
}

// Feche a conexão com o banco de dados
//mysqli_close($conexao);
?>
