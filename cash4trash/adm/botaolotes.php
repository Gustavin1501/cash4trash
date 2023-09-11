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
    $resultadoC = select_query("select nome from categoria", $conexao);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerar lote</title>
</head>

<body>
    <div class="form sign-in-container">
        <header>
            <div class="logo">
                <a href="../index.php">
                <img src="../imgs/cash4trash.png">
                </a>
            </div>
        </header>

        <form action="formarlotes.php" method="post">
            
            <h1>Especifique o lote que será gerado</h1>

            <select name="categoria" id="categoria" class="form__input" >
                <option value="">Selecione a categoria do e-lixo</option>
                <?php 

                while ($linhaC = mysqli_fetch_assoc($resultadoC)) {
                    echo '<option value="' . $linhaC["nome"] . '">' .$linhaC["nome"] . '</option>';
                }

                mysqli_free_result($resultadoC);
                //mysqli_close($conexao);
                    
                ?>
            </select>

            
            <div class="">
                <input type="number" min="1" name="quantidade" placeholder="Produtos por lote">
            </div>

            <button type="submit">Gerar</button>
        </form>
        

        <div>
            <table>
                <thead>
                    <tr>
                        <td>Categoria</td>
                        <td>Quantidade de produtos</td>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            echo"<tr>";
                            $resultado = select_query("select nome from categoria", $conexao);
                            while ($linha = mysqli_fetch_assoc($resultado)) {
                                echo "<td>".$linha["nome"]."</td>";
                                $resultado2 = select_query("select * from lixo where categoria = '". $linha["nome"]."' and statu='1'", $conexao);
                                echo "<td>".mysqli_num_rows($resultado2)."</td>";
                                echo "</tr>";
                            }
                            
                        
                        ?>
                </tbody>
            </table>
        </div>

        
    </div>
    <script src="js/principal.js"></script>
    <noscript>Seu navegador não suporta código em JavaScript</noscript>
</body>
</html>