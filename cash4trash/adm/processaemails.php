<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

// Configuração do servidor SMTP (para o Gmail)
$mail = new PHPMailer();

// Adicione esta linha para habilitar a depuração do servidor SMTP
$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'c4t2023@gmail.com'; // Seu e-mail
$mail->Password = 'C@LuL@2023'; // Sua senha
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

// Configurações de e-mail
$mail->setFrom('c4t2023@gmail.com', 'Cash4Trash'); // Seu e-mail e nome
$mail->isHTML(true); // Define o formato do e-mail como HTML

// Lista de destinatários e links dos leilões
$quantidade = $_POST['quantidade'];

// Atualize o status dos lotes no banco de dados
for ($id = 1; $id <= $quantidade; $id++) {
    $dados = explode('*', $_POST[$id]);
    $emailUsuario = $dados[0];
    $idLote = $dados[1];
    
    // Construa o link para o leilão
    $linkLeilao = 'http://localhost:8080/cash4trash/leiloes/produto.php?id=' . $idLote;
    
    // Configura o destinatário e o conteúdo do e-mail
    $mail->addAddress($emailUsuario);
    $mail->Subject = 'Parabéns! Você foi contemplado em um leilão.';
    $mail->Body = 'Você foi contemplado em um leilão. Clique no link abaixo para conferir o leilão:<br><a href="' . $linkLeilao . '">Clique aqui</a>';

    if ($mail->send()) {
        echo "E-mail enviado para $emailUsuario\n";

        // Após enviar com sucesso, atualize o status do lote para '3'
        $atualizarStatus = "UPDATE lote SET statu = '3' WHERE id = '$idLote'";
        $resultadoUpdate = mysqli_query($conexao, $atualizarStatus);

        if (!$resultadoUpdate) {
            echo "Erro ao atualizar o status do lote: " . mysqli_error($conexao) . "\n";
        }
    } else {
        echo "Erro ao enviar e-mail para $emailUsuario: " . $mail->ErrorInfo . "\n";
    }

    $mail->clearAddresses(); // Limpa os destinatários para o próximo e-mail
}



// Redirecione para a página anterior ou faça qualquer outra ação necessária após o envio dos e-mails
//header("Location: enviaemail.php");
//exit;
?>
