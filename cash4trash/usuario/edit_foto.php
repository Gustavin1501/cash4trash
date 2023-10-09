<?php
$dir = "img_usuarios";

if(isset($FILES["picture_input"])) {
    // O campo de entrada de arquivo foi preenchido com uma imagem
    //upload da imagem

    // recebendo o arquivo multipart 
    $file = $FILES["picture_input"];

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
        
        $diretorio = $dir . '/' . $nome_img;
    }else{
        echo "nao houve upload da imagem";
    }
} else {
    // O campo de entrada de arquivo está vazio ou não contém uma imagem JPEG
    $diretorio = $dir . '/semfoto.jpg';
}
?>