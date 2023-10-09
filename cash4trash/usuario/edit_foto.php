<?php
session_start();
$dir = "img_usuarios";
$email = $_SESSION["email"];

// Verifica se um arquivo foi enviado
if(isset($_FILES["imagefield"])) {
    // Recebe o arquivo enviado via formulário
    $file = $_FILES["imagefield"];
    
    // Verifica se não houve erros durante o upload
    if ($file["error"] === UPLOAD_ERR_OK) {
        // Define o nome da imagem como o timestamp atual com a extensão .jpg
        $nome_img = time() . '.jpg';

        // Move o arquivo da pasta temporária de upload para o diretório de destino
        if (move_uploaded_file($file["tmp_name"], '../cadastros/' . $dir . '/' . $nome_img)) {
            echo "Arquivo enviado com sucesso!";
            
            // Sua lógica para converter a imagem, se necessário...

            $diretorio = $dir . '/' . $nome_img;

            // Conexão com o banco de dados
            require "../index/conexao.php";
            $conexao = getConexao();

            // Verifica a conexão com o banco de dados
            if (!$conexao) {
                die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
            }

            // Atualiza a coluna "diretorio" na tabela "usuario"
            $sql = "UPDATE usuario SET diretorio = '$diretorio' WHERE email = '$email'";

            if (mysqli_query($conexao, $sql)) {
                echo "Registro atualizado com sucesso!";
                header("location:pagina_usuario.php");
            } else {
                echo "Erro ao atualizar o registro: " . mysqli_error($conexao);
            }

            // Fecha a conexão com o banco de dados
            mysqli_close($conexao);
        } else {
            echo "Não foi possível mover o arquivo para o diretório de destino.";
        }
    } else {
        echo "Erro durante o upload do arquivo.";
    }
} else {
    echo "Nenhum arquivo foi enviado.";
}
?>
