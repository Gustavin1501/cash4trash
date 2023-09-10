<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="estilo-produto.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />
</head>
<body>
    <header>
        <div class="container">
            <div></div>
            <div id="logo">
                <a href="../index/index.php"><img src="../imagens/logo.svg" id="logo"> </a>
            </div>
            <div>
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
                require "../index/conexao.php";
                $conexao = getConexao();
            
                require "operacoes.php";

                $id = $_GET["id"];

                $data = array("id" => $id); //para usar o id no JS
                $jsonData = json_encode($data);

                $consulta_lote = select_query("select valor_atual, nome, inicio, quantidade, descricao from lote where id='".$id."'", $conexao);
                while ($linha = mysqli_fetch_assoc($consulta_lote)) {
                    $nome=$linha["nome"];
                    $inicio=$linha["inicio"];
                    $qtd=$linha["quantidade"];
                    $valor=$linha["valor_atual"];
                    $descricao=$linha["descricao"];
                    $consulta_lixo = select_query("select imagem, descricao, categoria from lixo where lote='". $id . "' order by lote", $conexao);
                    while ($linha2 = mysqli_fetch_assoc($consulta_lixo)) {
                        echo'<div class="imagem-produto">
                            <img src="../produto/'.$linha2["imagem"].'" id="imagem-produto">
                            </div>';
                        $categoria=$linha2["categoria"];
                    }
                }
                ?>
                
                <div class="infos-produto">
                    <div class="tag-categoria">
                        <!-- Computadores e acessórios -->
                        <p><?php echo $categoria; ?></p>
                    </div>
                    <h3 class="negrito"><?php echo $nome; ?></h3>
                    <p><?php echo $id .' - '. $qtd .' unidades'; ?></p>
                    <h3 class="negrito" id="laranja">Último lance </h3>
                    <h3 class="negrito" id="preco">R$ <?php echo $valor; ?></h3>
                    <div class="lance"> 
                        <form action="recebelance.php" method="post">
                            <center>
                                <button type="button" class="lance-button" onclick="incrementarInput(1)">+1</button>
                                <button type="button" class="lance-button" onclick="incrementarInput(3)">+3</button>
                                <button type="button" class="lance-button" onclick="incrementarInput(5)">+5</button>

                                <input id="lance-input" name="lance" type="number" min="" step="0.01" placeholder="Personalizar oferta" value="" onchange="" >
                                <input type="hidden" id="lote" name="lote" value="<?php echo $id; ?>">
                            </center>
                            <center>
                                <button type="submit" id="lancar" class="w3-button w3-orange">LANÇAR</button>
                            </center>
                        </form>
                    </div>
                </div>
                <div class="area-cronometro">
                    <div class="cronometro">
                        <center class="negrito">
                            TEMPO
                        </center>

                        <?php
                            $resultado = select_query("select duracao from categoria where nome ='". $categoria. "'", $conexao);
                            while ($linha = mysqli_fetch_assoc($resultado)) {
                                $duracao=$linha["duracao"];
                            }
                        ?>
                        
                        <div id="cronometro"></div>

                        <script>
                            // Valor de 'inicio' em segundos
                            var inicio = <?php echo $inicio; ?>;
                            
                            // Duração do lote em segundos (20 dias = 20 * 24 * 60 * 60)
                            //var dias = <?php echo $duracao; ?>;
                            //var duracaoLote = dias * 24 * 60 * 60;

                            // Atualiza o cronômetro
                            function atualizarCronometro() {
                                var agora = Math.floor(Date.now() / 1000); // Obtém o tempo atual em segundos

                                // Calcula o tempo restante em segundos
                                var tempoRestante = inicio - agora;

                                // Verifica se o lote já foi finalizado
                                if (tempoRestante <= 0) {
                                    document.getElementById("cronometro").innerHTML = "Lote finalizado!";
                                    var botaoSubmit = document.getElementById("lancar");
                                    botaoSubmit.disabled = true;
                                    return;
                                }

                                // Converte o tempo restante em dias, horas, minutos e segundos
                                var dias = Math.floor(tempoRestante / (24 * 60 * 60));
                                var horas = Math.floor((tempoRestante % (24 * 60 * 60)) / (60 * 60));
                                var minutos = Math.floor((tempoRestante % (60 * 60)) / 60);
                                var segundos = Math.floor(tempoRestante % 60);

                                // Formata a saída do cronômetro
                                var tempoRestanteFormatado = dias + " dias, " + horas + " h " + minutos + " min " + segundos + " s";

                                // Atualiza o elemento HTML com o tempo restante
                                document.getElementById("cronometro").innerHTML = "Tempo restante: </br>" + tempoRestanteFormatado;
                            }

                            // Atualiza o cronômetro inicialmente e a cada segundo (1000 milissegundos)
                            setInterval(atualizarCronometro, 1000);
                        </script>

                        <center id="tempo">
                            <p id="demo"></p>
                        </center>

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
                        LOTES SEMELHANTES
                    </h4>
                </div>
                <div class="produtos">
                    
                    <?php
                        
                        $consulta_lixo = select_query("select lote from lixo where categoria='". $categoria."' and statu='2' and lote <>'".$id."'  order by lote", $conexao);
                        $id = 0;
                        while ($linha = mysqli_fetch_assoc($consulta_lixo)) {
                            if ($linha["lote"]!=$id){
                                $id=$linha["lote"];
                                $consulta_lote = select_query("select valor_atual, nome from lote where id='". $id."'", $conexao);
                                while ($linha2 = mysqli_fetch_assoc($consulta_lote)) {
                                    
                                    $valor = $linha2["valor_atual"];
                                    $nome = $linha2["nome"];
                                    $consulta_lixo2 = select_query("select imagem from lixo where lote='". $id . "' limit 1", $conexao);
                                    while ($linha3 = mysqli_fetch_assoc($consulta_lixo2)) {
                                        $imagem = $linha3["imagem"];
                                        echo '<div class="produto">
                                        <a href="produto.php?id='. $id .'"><img width="150px" src="../produto/'. $imagem .'">
                                        <p class="nome-produto">'. $nome .'</p>
                                        <p class="preco-produto">R$ '. $valor .' </p></a>
                                        </div>';
                                
                                    }
                                }
                            }
                            
                        }

                        //mysqli_free_result($consulta_lixo);
                        //mysqli_free_result($consulta_lote);

                        //mysqli_close($conexao);
                        
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