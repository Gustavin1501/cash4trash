<?php

    session_start();
    if(!isset($_SESSION["email"]) && $_SESSION["tipo"]!="M") {
        header("location: ../login/login.html");
        die();
    }
    
    require "../index/conexao.php";

    $conexao = getConexao();
    function select_query($sql, $conexao){

        $resultado = mysqli_query($conexao, $sql);

        if (!$resultado) {
        header("Location: ../cadastros/cadastro_erro.html");
        //echo "Erro na consulta: " . mysqli_error($conexao);
        exit;
        }
        return $resultado;
    }
    
    
    $resultadoC = select_query("select nome from categoria", $conexao);
    

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../produto/estilo.css"/>
    <title>Cash4Trash</title>
</head>
<body>
    <!--HEADER COM LOGO-->
    <header>
        <div class="logo">
            <a href="../index/index.php">
            <img src="../imagens/logowhite.png">
        </a>
        </div>
    </header>

    <!--INPUT FILE-->
    <form action="cadastro_produto.php" id="form" method="post" enctype="multipart/form-data">
    <div class="input_file">
        <label class="picture" for="picture__input" tabindex="0">
            <span class="picture__image"></span>
        </label>
        <input type="file" accept="image/*" name="picture__input" id="picture__input">
        <script src="js/main.js"></script>
    </div>

    <div class="form-box">
        <h2>Cadastrar produto</h2>
        <p>Preencha os dados abaixo do produto que deseja anunciar no Markeplace.</p>

            <select name="categoria" id="categoria" class="form__input" >
                <option value="">Selecione a categoria do produto</option>
                <?php 

                while ($linhaC = mysqli_fetch_assoc($resultadoC)) {
                    echo '<option value="' . $linhaC["nome"] . '">' .$linhaC["nome"] . '</option>';
                }

                mysqli_free_result($resultadoC);
                //mysqli_close($conexao);
                    
                ?>
            </select>

            <select name="marca" id="marca" class="form__input" >
                <option value="">Selecione a marca do produto</option>
            </select>

            <div class="input-group">
                <label for="nome"></label>
                <input type="text" id="nome" name="nome" placeholder="Nome do modelo do produto" required>
            </div>

            <div class="input-group">
                <label for="desc"></label>
                <input type="text" name="desc" id="desc" placeholder="Descrição:" required>
            </div>

            <div class="input-group">
                <label for="valor"></label>
                <input type="number" name="valor" id="valor" placeholder="Valor (em CALULAs):" required>
            </div>

            <div class="input-group">
                <label for="estoque"></label>
                <input type="number" name="estoque" id="estoque" placeholder="Estoque" required>
            </div>
            
            <div class="input-group">
                <button>Cadastrar</button>
            </div>
        
    </div>
    </form>

    <script src="js/principal.js"></script>
        <noscript>
            Seu navegador não suporta código em JavaScript
        </noscript>
</body>
</html>