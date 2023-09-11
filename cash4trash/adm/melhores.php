<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerar lote</title>
    <style>
        .produto{
            background-color: #fcc;
            margin: 2%;
            padding: 1%;
            display: flex;
            flex-direction: rox;
            justify-content: space-around;
        }

        .switch {
        position: relative;
        display: inline-block;
        width: 80px;
        height: 40px;
        }

        .switch input[type="checkbox"] {
        display: none;
        }

        .slider {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 20px;
        background-color: #ccc;
        cursor: pointer;
        transition: background-color 0.4s;
        }

        .slider:before {
        position: absolute;
        content: "";
        height: 30px;
        width: 30px;
        top: 5px;
        left: 5px;
        border-radius: 50%;
        background-color: white;
        transition: transform 0.4s;
        }

        .switch input[type="checkbox"]:checked + .slider {
        background-color: #2196F3;
        }

        .switch input[type="checkbox"]:checked + .slider:before {
        transform: translateX(40px);
        }

        .label-sim,
        .label-nao {
        display: inline-block;
        vertical-align: middle;
        margin: 0 5px;
        }
    </style>
</head>

<body>
    <div class="form sign-in-container">
        <header>
        <?php
            include_once("../include/navbar.php");
        ?>
        </header>

        <?php
            /*if ($_SESSION["tipo"]=="A"){
                header("location: ../login/login.html");
                die();
            }*/
            
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

        <form action="atualizarmelhores.php" method="post">
            
            <h1>Defina os melhores lotes do momento</h1>

            <div id="container">

            <?php
                $consulta_lote = select_query("select id,valor_atual, nome, melhores from lote where statu='1'", $conexao);
                $i=0;
                while ($linha = mysqli_fetch_assoc($consulta_lote)) {
                    $id=$linha["id"];
                    $consulta_lixo = select_query("select imagem from lixo where lote='". $id . "' order by lote limit 1", $conexao);
                    while ($linha2 = mysqli_fetch_assoc($consulta_lixo)) {
                        $i++;
                        echo 
                        '<div class="produto">
                        <div>
                            <img width="150px" src="../produto/'. $linha2["imagem"] .'.png ">
                        </div>
                        <div>
                            <p class="nome-produto">'. $linha["nome"] .'</p>
                            <p class="preco-produto">R$ '. $linha["valor_atual"] .' </p>
                        </div>
                        <div>
                            <label class="switch">
                            <input type="checkbox" id="'.$id.'" name="opcao'.$i.'" value="'.$id.'" ';

                            if ($linha["melhores"]=="1"){
                                echo " checked ";
                            }

                            echo'>
                            <div class="slider"></div>
                            </label>
                        </div>
                        </div>';
                    }
                }

                mysqli_free_result($consulta_lixo);
                mysqli_free_result($consulta_lote);

                mysqli_close($conexao);
            ?>

            <input type="hidden" name="valor_i" value="<?php echo $i; ?>">
            </div>
            <button type="submit">Atualizar</button>

        </form>
        
        
    </div>
    <script src="js/principal.js"></script>
    <noscript>Seu navegador não suporta código em JavaScript</noscript>
</body>
</html>