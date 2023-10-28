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
    <title>Enviar e-mails</title>
</head>

<body>
    <div class="form sign-in-container">
        

        <form action="atualizasaldo.php" method="post">
            
            <h1>Quantidade de Usuários pendentes 

            <?php

                $resultado = select_query("select id, valor_atual from lote where statu='3'",$conexao);
                $hiddens = "";
                $id = 0;
                
                while ($linha = mysqli_fetch_assoc($resultado)) {
                    $id++;
                    $resultado2 = select_query("select usuario from lixo where lote='".$linha["id"]."'", $conexao);
                    
                    $qtdusuarios = mysqli_num_rows($resultado2);
                    $valor = $linha["valor_atual"] / $qtdusuarios; //valor em reais
                    $valor = $valor * 12.4; // conversão para calula

                    while ($linha2 = mysqli_fetch_assoc($resultado2)){
                        $hiddens = $hiddens . ' <input type="hidden" name="'.$id.'" value="'.$linha2["usuario"].'*'.$valor.'*'.$linha["id"].'">';
                    
                    }

                }
                echo $id . "</h1>";
                echo  "<input type='hidden' name='quantidade' value='".$id ."'>";
                echo $hiddens;

            ?>

            <button type="submit">Atualizar saldo</button>

        </form>


        
    </div>
    <!--<script src="js/principal.js"></script>
    <noscript>Seu navegador não suporta código em JavaScript</noscript>-->
</body>
</html>