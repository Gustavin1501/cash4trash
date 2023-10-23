<?php
session_start();
//upload da imagem
$dir = "img_mp";

// recebendo o arquivo multipart 
$file = $_FILES["picture__input"];

$nome_img = time() . '.jpg'; // Nome da imagem em formato JPG

// Move o arquivo da pasta temporária de upload para a pasta de destino 
if (move_uploaded_file($file["tmp_name"], $dir . '/' . $nome_img)) {
    echo "Arquivo enviado com sucesso!";

    // Verifica a extensão da imagem
    $extensao = strtolower(pathinfo($nome_img, PATHINFO_EXTENSION));

    // Converte para JPEG usando Imagick
    if ($extensao !== 'jpg' && $extensao !== 'jpeg') {
        $imagePath = $dir . '/' . $nome_img;
        $imagick = new \Imagick($imagePath);
        $imagick->setImageFormat('jpeg');
        $imagick->setImageCompressionQuality(90); // Qualidade do JPEG (0-100)
        $imagick->writeImage($imagePath);
    }

    //salvando no banco
    $nome = $_POST["nome"];
    $desc = $_POST["desc"];
    $categoria = $_POST["categoria"];
    $marca = $_POST["marca"];
    $valor = intval($_POST["valor"]);
    $estoque = intval($_POST["estoque"]);


    $status = "1";
    $usuario = $_SESSION["email"];
    $diretorio = $dir . '/' . $nome_img;

    require "../index/conexao.php";

    $conexao = getConexao();

    if ($conexao) {
        $sql = "insert into marketplace (nome, descricao, statu, anunciador, imagem, marca, categoria, valorC, estoque) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
        $stmt = mysqli_prepare($conexao, $sql); // PreparedStatement

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


        mysqli_stmt_bind_param($stmt, "sssssssii", $nome, $desc, $status, $usuario, $diretorio, $marca, $categoria, $valor, $estoque); // Vincular parâmetros
    
        $funcionou = mysqli_stmt_execute($stmt); // Executar inserção

        if ($funcionou) {
            //header("location: sucesso_cad_produto.html");
            echo "produto cadastrado com sucesso";
        } else {
            echo "Problema na comunicação com o BD: " . mysqli_stmt_error($stmt);
        }
    
        mysqli_stmt_close($stmt); // Fechar declaração preparada
        mysqli_close($conexao); // Fechar conexão com o banco de dados
    } else {
        echo "Problema na conexão: " . mysqli_connect_error();
    }
} else {
    echo "Erro, o arquivo não pode ser enviado.";
}
?>
