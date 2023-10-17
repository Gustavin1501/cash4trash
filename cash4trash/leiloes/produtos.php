<?php 
    require "../index/conexao.php";
    $conexao = getConexao();

    require "operacoes.php";

    require "cron/atualizastatuslote.php";

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cash4Trash</title>
    <link href="estilo.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />
</head>
<body>
    <header>
        <div class="container">
            <div id="logo">
                <a href="../index/index.php"><img src="../imagens/logo.svg" id="logo"></a>
            </div>
        </div>
            
        </div>
    </header>
    <main>
        <div class="container-produtos">
        <?php
                        
            session_start();
            if(isset($_SESSION["email"])){
            echo'
            <div class="bloco">
                <div class="categoria">
                    <h4>
                        MAIS PRÓXIMOS DE VOCÊ
                    </h4>
                </div>
                <div class="produtos">';
                    
                            //pega cep
                        $cepUsuario = select_query("select cep from usuario where email='". $_SESSION["email"] . "'", $conexao);
                        $cepParceiros = select_query("select cep, nome from usuario where tipo='L'", $conexao);

                        $proximos = maisProximos($cepParceiros, $cepUsuario);// retorna nome dos 5 parceiros mais proximos
                        $lote=01;

                        for ($i=0; $i< count($proximos); $i++){
                            //var_dump($proximos);
                            $consulta_lixo = select_query("select imagem, lote from lixo where parceiro='". $proximos[$i]. "' order by lote", $conexao);
                            while ($linha = mysqli_fetch_assoc($consulta_lixo)) {
                                if ($linha["lote"]!=$lote){
                                    $lote=$linha["lote"];
                                    $img=$linha["imagem"];
                                    $consulta_lote = select_query("select valor_atual, nome from lote where id='". $lote . "' and statu='1'", $conexao);
                                    while ($linha = mysqli_fetch_assoc($consulta_lote)) {
                                        echo '<div class="produto">
                                        <a href="produto.php?id='. $lote .'"><img width="150px" src="../produto/'. $img .' ">
                                        <p class="nome-produto">'. $linha["nome"] .'</p>
                                        <p class="preco-produto">R$ '. $linha["valor_atual"] .' </p></a>
                                        </div>';
                                
                                    }

                                    
                                }
                                
                            }
                        }

                        mysqli_free_result($consulta_lixo);
                        mysqli_free_result($consulta_lote);

                        //mysqli_close($conexao);
                        
                echo'    
                </div>
            
                <br/>
                
                </div>';
                }
            ?>
            <div class="bloco">
                <div class="categoria">
                    <h4>
                        MELHORES DA SEMANA
                    </h4>
                </div>
                <div class="produtos">
                    <?php
                        $consulta_lote = select_query("select id,valor_atual, nome from lote where melhores='1' and statu='1'", $conexao);
                        while ($linha = mysqli_fetch_assoc($consulta_lote)) {
                            $id=$linha["id"];
                            $consulta_lixo = select_query("select imagem from lixo where lote='". $id . "' order by lote limit 1", $conexao);
                             while ($linha2 = mysqli_fetch_assoc($consulta_lixo)) {
                                echo '<div class="produto">
                                <a href="produto.php?id='. $id .'"><img width="150px" src="../produto/'. $linha2["imagem"] .' ">
                                <p class="nome-produto">'. $linha["nome"] .'</p>
                                <p class="preco-produto">R$ '. $linha["valor_atual"] .' </p></a>
                                </div>';
                        
                            }
                        }
                        

                        //mysqli_free_result($consulta_lixo);
                        //mysqli_free_result($consulta_lote);

                        //mysqli_close($conexao);
                        
                    ?>
                </div>
                <br/>
                
            </div>
            <div class="bloco">
                <div class="categoria">
                    <h4>
                        COMEÇARAM AGORA
                    </h4>
                </div>
                <div class="produtos">
                    <?php
                        //recem add
                        $consulta_lote = select_query("select id,valor_atual, nome from lote where statu='1' order by inicio limit 15", $conexao);
                        while ($linha = mysqli_fetch_assoc($consulta_lote)) {
                            $id=$linha["id"];
                            $consulta_lixo = select_query("select imagem from lixo where lote='". $id . "' order by lote limit 1", $conexao);
                            while ($linha2 = mysqli_fetch_assoc($consulta_lixo)) {
                                echo '<div class="produto">
                                <a href="produto.php?id='. $id .'"><img width="150px" src="../produto/'. $linha2["imagem"] .' ">
                                <p class="nome-produto">'. $linha["nome"] .'</p>
                                <p class="preco-produto">R$ '. $linha["valor_atual"] .' </p></a>
                                </div>';
                        
                            }
                        }
                        

                        //mysqli_free_result($consulta_lixo);
                        //mysqli_free_result($consulta_lote);

                        //mysqli_close($conexao);
                        
                    ?>
                </div>
            
                <br/>
                
            </div>
            <div class="bloco">
                <div class="categoria">
                    <h4>
                        FAÇA O ÚLTIMO LANCE!
                    </h4>
                </div>
                <div class="produtos">
                    <?php
                        //add ha mais tempo
                        $consulta_lote = select_query("select id,valor_atual, nome from lote where statu='1' order by inicio desc limit 15", $conexao);
                        while ($linha = mysqli_fetch_assoc($consulta_lote)) {
                            $id=$linha["id"];
                            $consulta_lixo = select_query("select imagem from lixo where lote='". $id . "' order by lote limit 1", $conexao);
                            while ($linha2 = mysqli_fetch_assoc($consulta_lixo)) {
                                echo '<div class="produto">
                                <a href="produto.php?id='. $id .'"><img width="150px" src="../produto/'. $linha2["imagem"] .' ">
                                <p class="nome-produto">'. $linha["nome"] .'</p>
                                <p class="preco-produto">R$ '. $linha["valor_atual"] .' </p></a>
                                </div>';
                        
                            }
                        }
                        

                        mysqli_free_result($consulta_lixo);
                        mysqli_free_result($consulta_lote);

                        mysqli_close($conexao);
                    ?>
                </div>
            
                <br/>
                
            </div>

        </div>
    </main>
</body>
</html>