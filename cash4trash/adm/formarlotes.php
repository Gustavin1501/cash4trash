<?php
require "../index/conexao.php";
$conexao = getConexao();

$categoria = $_POST["categoria"];
$qtd = $_POST["quantidade"];

$gerados = 0;

// Chama a função passando a categoria X e a quantidade Y de produtos do lote dela
$nomeLote = pegaDados($categoria, $qtd, $conexao);

while ($nomeLote !== "0") {

    $descricao = pegaDescricao($categoria, $qtd, $conexao);

    $valor = pegaValor($categoria, $conexao);
    $inicio = time();

    $duracao = pegaDuracao($categoria, $conexao);

    $fim = $inicio + $duracao * 60 * 60 * 24;
    // Envia dados para tabela lote
    if (criaLote($nomeLote, $valor, $qtd, $fim, $descricao, $conexao)) {
        $gerados++;
    } else {
        echo "Erro ao criar lote.";
    }

    $idLote = pegaIdLote($conexao);

    // Atualiza tabela lixo
    atualizaLixo($categoria, $qtd, $idLote, $conexao);

    $nomeLote = pegaDados($categoria, $qtd, $conexao);
}

echo "Quantidade de Lotes Gerados: " . $gerados;

// Funções:

function pegaDados($categoria, $qtd, $conexao) {
    $sql = "SELECT `marca`, `nome` FROM `lixo` WHERE `categoria` = ? AND `statu` = 1 ORDER BY `marca`, `nome`, `id` LIMIT ?";
    //$sql2 = "SELECT `marca`, `nome` FROM `lixo` WHERE `categoria` = '$categoria' AND `statu` = 1 ORDER BY `marca`, `nome`, `id` LIMIT $qtd";
    //var_dump($sql2);
    
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $categoria, $qtd);
        $executou = mysqli_stmt_execute($stmt);

            if ($executou){
                $resultado = mysqli_stmt_get_result($stmt);
                $numLinhas = mysqli_num_rows($resultado);

                $n = "";
                $m = "";
                if ($numLinhas == $qtd) {
                    while ($linha = mysqli_fetch_assoc($resultado)) {
                        $marca = $linha["marca"];
                        $nome = $linha["nome"];
                        if ((($nome == $n) && ($marca == $m)) ||(($n == "") && ($m = ""))){
                            $dadosConcatenados = $categoria . " - " . $marca . " - " . $nome . "\n";
                        }else if ((($nome != $n) && ($marca == $m))){
                            $dadosConcatenados = $categoria . " - " . $marca . "\n";
                        }else{
                            $dadosConcatenados = $categoria;
                        }
                        $n = $nome;
                        $m = $marca;
                    }
                } else {
                    // Número de elementos retornados é inferior a $qtd
                    $dadosConcatenados = "0";
                    
                }
        }

        

        mysqli_stmt_close($stmt);
    }

    return $dadosConcatenados;
}

function atualizaLixo($categoria, $qtd, $idLote, $conexao) {
    $sql = "UPDATE `lixo` SET `statu` = 2, `lote` = ? WHERE `categoria` = ? AND `statu` = 1 ORDER BY `marca`, `nome`, `id` LIMIT ?";
    
    //$sql2 = "UPDATE `lixo` SET `statu` = 2 WHERE (`marca`, `nome`) IN (SELECT `marca`, `nome` FROM `lixo` WHERE `categoria` = '$categoria' AND `statu` = 1 ORDER BY `marca`, `nome`, `id` LIMIT 3)";
    //var_dump($sql2);
    $stmt = mysqli_prepare($conexao, $sql);

    $lixos = false;

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "isi", $idLote, $categoria, $qtd);
        mysqli_stmt_execute($stmt);
        $lixos = true;
        mysqli_stmt_close($stmt);
    }

    return $lixos;
}

function criaLote($nomeLote, $valor, $qtd, $fim, $descricao, $conexao) {
    $statu = "1";
    $sql = "INSERT INTO `lote` (`nome`, `valor_inicial`, `valor_atual`, `quantidade`, `statu`, `inicio`, `descricao`) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sddisis", $nomeLote, $valor, $valor, $qtd, $statu, $fim, $descricao);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return true;
    } else {
        return false;
    }
}

function pegaValor($categoria, $conexao) {
    $sql = "SELECT `valor_inicial` FROM `categoria` WHERE `nome` = ?";
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $categoria);
        $executou = mysqli_stmt_execute($stmt);

        if ($executou) {
            $resultado = mysqli_stmt_get_result($stmt);
            $linha = mysqli_fetch_assoc($resultado);

            if ($linha) {
                $valorInicial = $linha['valor_inicial'];
                mysqli_free_result($resultado);
                mysqli_stmt_close($stmt);
                return $valorInicial;
            }
        }

        mysqli_stmt_close($stmt);
    }

    return null;
}

function pegaIdLote($conexao){
    $sql = "SELECT `id` FROM `lote` ORDER BY `id` DESC LIMIT 1";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        $row = mysqli_fetch_assoc($resultado);
        $id = $row["id"];
        return $id;
    }

    return null;
}

function pegaDuracao($categoria, $conexao){
    $sql = "SELECT `duracao` FROM `categoria` WHERE `nome` = '".$categoria."'";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        $row = mysqli_fetch_assoc($resultado);
        $duracao = $row["duracao"];
        return $duracao;
    }

    return null;
}
//-- 

function pegaDescricao($categoria, $qtd, $conexao) {
    $sql = "SELECT `marca`, `nome`, `descricao` FROM `lixo` WHERE `categoria` = ? AND `statu` = 1 ORDER BY `marca`, `nome`, `id` LIMIT ?";

    echo "SELECT `marca`, `nome`, `descricao` FROM `lixo` WHERE `categoria` = $categoria ";
    
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $categoria, $qtd);
        $executou = mysqli_stmt_execute($stmt);

            if ($executou){
                $resultado = mysqli_stmt_get_result($stmt);
                $numLinhas = mysqli_num_rows($resultado);
                $dadosConcatenados = "";

                if ($numLinhas == $qtd) {
                    while ($linha = mysqli_fetch_assoc($resultado)) {
                        $marca = $linha["marca"];
                        $nome = $linha["nome"];
                        $descricao = $marca ." - ". $nome ." - ". $linha["descricao"] ."</br>";
                        $dadosConcatenados += $descricao;
                    }
                } else {
                    // Número de elementos retornados é inferior a $qtd
                    $dadosConcatenados = "0";
                    
                }
        }

        mysqli_stmt_close($stmt);
    }

    return $dadosConcatenados;
}


?>