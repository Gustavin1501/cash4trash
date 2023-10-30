<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace</title>
    <link href="css/estilo-mp-produto.css" rel="stylesheet">
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
            <div>
                <?php
                    require "../index/conexao.php";
                    $conexao = getConexao();
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
        <nav id="nav">
            <a href="../index/index.php" id="home">
                HOME
            </a>
            <a href="produtos.php"  id="produtos">
                PRODUTOS
            </a>
        </nav>
    </header>
    <main>
        <div class="principal">
            <div class="produto-principal">
                <?php
                
            
                require "../leiloes/operacoes.php";

                $id = $_GET["id"];

                $data = array("id" => $id); //para usar o id no JS
                $jsonData = json_encode($data);

                $consulta_lote = select_query("select valorC, nome, estoque, descricao, categoria, imagem from marketplace where id='".$id."'", $conexao);
                while ($linha = mysqli_fetch_assoc($consulta_lote)) {
                    $nome=$linha["nome"];
                    $qtd=$linha["estoque"];
                    $valor=$linha["valorC"];
                    $descricao=$linha["descricao"];
                    $consulta_lixo = select_query("select imagem, descricao, categoria from lixo where lote='". $id . "' order by lote", $conexao);
                    echo'<div class="imagem-produto">
                        <img src="'.$linha["imagem"].'" id="imagem-produto">
                        </div>';
                    $categoria=$linha["categoria"];
                }
                ?>
                
                <div class="infos-produto">
                    <div class="tag-categoria">
                        <!-- Computadores e acessórios -->
                        <p><?php echo $categoria; ?></p>
                    </div>
                    <h3 class="negrito"><?php echo $nome; ?></h3>
                    <p><?php echo  $qtd .' unidades'; ?></p>
                    <h3 class="negrito" id="preco">C$ <?php echo $valor; ?></h3>
                    <div class="lance"> 
                        <form action="recebecompra.php" method="post">
                                <button type="submit" id="comprar" class="w3-button w3-orange">COMPRAR</button>
                        </form>
                    </div>
                </div>
                
            </div>
            <div class="descricao">
                <h5 class="negrito">Descrição:</h5>
                <?php echo $descricao; ?>
            </div>
        </div>
        <div class="sugestoes">
            <hr class="linha">

            <div class="bloco">
                <div class="categoria">
                    <h4>
                        PRODUTOS SEMELHANTES
                    </h4>
                </div>
                <div class="produtos">
                    
                    <?php

                        $sql = "SELECT id, valorC, nome, imagem FROM marketplace WHERE statu = '1' AND categoria = ? AND id != ?";
                        $stmt = mysqli_prepare($conexao, $sql);

                        if ($stmt) {
                            mysqli_stmt_bind_param($stmt, "si", $categoria, $id); // "si" significa que $categoria é uma string e $id é um inteiro
                            mysqli_stmt_execute($stmt);
                            $consulta_mp = mysqli_stmt_get_result($stmt);

                            while ($linha = mysqli_fetch_assoc($consulta_mp)) {
                                echo '<div class="produto">
                                    <a href="produto.php?id=' . $linha["id"] . '"><img width="150px" src="' . $linha["imagem"] . ' ">
                                    <p class="nome-produto">' . $linha["nome"] . '</p>
                                    <p class="preco-produto">C$ ' . $linha["valorC"] . ' </p></a>
                                    </div>';
                            }

                            mysqli_stmt_close($stmt);
                        } else {
                            echo "Erro na preparação da consulta: " . mysqli_error($conexao);
                        }

                        mysqli_free_result($consulta_mp);
                        mysqli_close($conexao);



                        
                    ?>

                </div>
            </div>
        </div>
    </main>

    <br>

    <footer>
        <center>
            Copyright © 2022 BloomyBits. Todos os direitos reservados. 
        </center>
    </footer>
    
    <script>
        function pegaID(){
            var jsonData = <?php echo $jsonData; ?>;
            var id = parseInt(jsonData.id);
            //console.log(typeof id);

            return id;
        }
    
    </script>
    <script>
        function incrementarInput(incremento) {
        var h3Element = document.getElementById("preco");
        var valorAtualH3 = parseFloat(h3Element.textContent.replace("R$ ", ""));
        var inputElement = document.getElementById("lance-input");
        var valorAtualInput = parseFloat(inputElement.value);
        var novoValor = valorAtualH3 + incremento;
        inputElement.value = novoValor.toFixed(2);
        //atualizaBotaoSubmit(novoValor);  // Atualiza o botão de envio conforme o novo valor
    }


    </script>
    <script  src="js/lance.js"></script>

</body>
</html>