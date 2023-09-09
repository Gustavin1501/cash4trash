<?php
    session_start();
    if(!isset($_SESSION["email"])) {
        header("location: ../login/login.html");
        die();
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
</head>
<body>
    <h1>
        Olá, Administrador!
    </h1>

    <ul>
        <li><a href="botaolotes.php">Gerar Lotes</a></li>
        <li><a href="melhores.php">Definir melhores lotes</a></li>
        
    </ul>
    
</body>
</html>