<?php
    session_start();
    if(!isset($_SESSION["email"])) {
        header("location: ../login/login.html");
        die();
    }
    
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

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/enviaemail.css">
    <title>Enviar e-mails</title>
</head>

<body>
    <div class="form sign-in-container">
        <header>
            <div class="logo">
                <a href="index.php">
                <img src="../imagens/logo.jpg">
                </a>
            </div>
        </header>

        <form action="processaemails.php" method="post">
            
            <h3>Quantidade de Usuários pendentes:

            <?php

                $resultado = select_query("select id from lote where statu='2'",$conexao);
                $hiddens = "";
                $id = 0;
                while ($linha = mysqli_fetch_assoc($resultado)) {
                    $resultado2 = select_query("select usuario from lance where lote='".$linha["id"]."' order by tempo desc limit 1", $conexao);
                    $linha2 = mysqli_fetch_assoc($resultado2);
                    if ($linha2["usuario"]!= null){
                        $id++;
                        $hiddens = $hiddens . ' <input type="hidden" name="'.$id.'" value="'.$linha2["usuario"].'*'.$linha["id"].'">';
                    }
                    
                }
                echo $id . "</h3>";
                echo  "<input type='hidden' name='quantidade' value='".$id ."'>";
                echo $hiddens;
                mysqli_close($conexao);

            ?>

            <button type="submit">Gerar</button>

        </form>


        
    </div>
    <!--<script src="js/principal.js"></script>
    <noscript>Seu navegador não suporta código em JavaScript</noscript>-->
</body>
</html>