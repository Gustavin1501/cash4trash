<?php 
    require "../index/conexao.php";
    $conexao = getConexao();

    require "../leiloes/operacoes.php";

    //require "cron/atualizastatusmp.php";

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace</title>
    <link href="css/estilo-mp.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />
    <style>
    .saldo{
        color: white; /* Define a cor do texto como branca */
        font-weight: bold; /* Define o estilo de fonte como negrito */
        padding-right: 15px; /* Define o espaço interno de 10 pixels ao redor do texto */

    }
    </style>

</head>
<body>
    <header>
        <div class="container">
            <div></div>
            <div id="logo">
                <a href="../index/index.php"><img src="../imagens/logo.svg" id="logo"> </a>
            </div>
            <div >
            <?php
                    session_start();
                    if (isset($_SESSION["email"])){
                        $sql = "SELECT saldo FROM usuario WHERE email = ?";
                        $stmt = mysqli_prepare($conexao, $sql);

                        if ($stmt) {
                            mysqli_stmt_bind_param($stmt, "s", $_SESSION["email"]); // "si" significa que $categoria é uma string e $id é um inteiro
                            mysqli_stmt_execute($stmt);
                            $consulta_mp = mysqli_stmt_get_result($stmt);

                            while ($linha = mysqli_fetch_assoc($consulta_mp)) {
                                echo "<h5 class='saldo' >R$".$linha["saldo"]."</h5>";
                            }

                            mysqli_stmt_close($stmt);
                        } else {
                            echo "Erro na preparação da consulta: " . mysqli_error($conexao);
                        }

                        mysqli_free_result($consulta_mp);

                    }
                    
                ?>
                
            </div>
        </div>

        <img src="../imagens/mkplace_header.png" alt="gaste aqui suas calulas!" id="mk-header">


    </header>
    <main>
        <div id="divBusca">
            <div id="divbar">
                <input  id="search-bar" type="text" placeholder=" Pesquise pelo produto que procura">
            </div>
            <a href="#" id="divicon"> 
                <div ><img id="search-icon" src="../imagens/search3.png"></div>
            </a>
            
        </div>
        <div class="container-produtos">
        
        <div class="">
            <div class="bloco">
                <div class="produtos">
                    <?php
                    $i=0;
                        $consulta_mp = select_query("select id,valorC, nome, imagem from marketplace where statu='1'", $conexao);
                        while ($linha = mysqli_fetch_assoc($consulta_mp)) {
                            $i++;
                            echo '<div class="produto">
                                <a href="produto.php?id='. $linha["id"] .'"><img width="150px" src="'. $linha["imagem"] .' ">
                                <p class="nome-produto">'. $linha["nome"] .'</p>
                                <p class="preco-produto">C$ '. $linha["valorC"] .' </p></a>
                                </div>';
                            if ($i==5){
                                $i=1;
                            }
                        }
                        

                        mysqli_free_result($consulta_mp);

                        mysqli_close($conexao);
                        
                    ?>
                </div>
                <br/>
                
            </div>
        </div>
    </main>
</body>
</html>