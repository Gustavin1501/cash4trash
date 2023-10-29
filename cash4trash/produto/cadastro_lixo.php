<?php
session_start();
//upload da imagem
$dir = "img_lixos";

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
    $coleta = $_POST["ponto"];
    $categoria = $_POST["categoria"];
    $marca = $_POST["marca"];

    $status = "1";
    $usuario = $_SESSION["email"];
    $diretorio = $dir . '/' . $nome_img;

    require "../index/conexao.php";

    $conexao = getConexao();

    if ($conexao) {
        $sql = "INSERT INTO lixo (nome, descricao, statu, usuario, parceiro, imagem, marca, categoria) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
        $stmt = mysqli_prepare($conexao, $sql); // PreparedStatement

        mysqli_stmt_bind_param($stmt, "ssssssss", $nome, $desc, $status, $usuario, $coleta, $diretorio, $marca, $categoria); // Vincular parâmetros
    
        $funcionou = mysqli_stmt_execute($stmt); // Executar inserção

        if ($funcionou) {
            header("location: ../cadastros/cadastro_produto.html");
        } else {
            echo "Problema na comunicação com o BD: " . mysqli_stmt_error($stmt);
        }
    
        mysqli_stmt_close($stmt); // Fechar declaração preparada
        mysqli_close($conexao); // Fechar conexão com o banco de dados
    } else {
        echo "Problema na conexão: " . mysqli_connect_error();
    }
} else {
    header("Location: ../cadastros/cadastro_erro.html"); 
}
?>
