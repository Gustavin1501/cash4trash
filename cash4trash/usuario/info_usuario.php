<?php 
require "../index/conexao.php";
	
function exibirLixo(){
$conexao = getConexao();

    $email = $_SESSION['email'];

    $sql = "SELECT * FROM lixo WHERE usuario = ?"; 
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    
    $lixos = mysqli_fetch_all($resultado);

if(mysqli_num_rows($resultado) >= 1)
    {return $lixos;}
else
    {
    $lixos = false;
    return $lixos;
    }
}

function exibirLote(){
    $conexao = getConexao();
    
        $email = $_SESSION['email'];
    
        $sql = "SELECT * FROM lote WHERE usuario = ?"; 
        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        
        $lotes = mysqli_fetch_all($resultado);
    
    if(mysqli_num_rows($resultado) >= 1)
        {return $lotes;}
    else
        {
        $lotes = false;
        return $lotes;
        }
    }
?>