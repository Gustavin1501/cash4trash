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
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <title>Administrador</title>
</head>
<body> 
    <!-- <div class="card text-center">
    <div class="card-body">
        <h5 class="card-title">Olá, administrador!</h5>
        <p class="card-text">Funções do administrador:</p>
        <a href="botaolotes.php" class="btn btn-primary">Gerar lotes</a>
        <a href="melhores.php" class="btn btn-primary">Melhores lotes</a>
        <a href="enviaemail.php" class="btn btn-primary">Enviar e-mail</a>
    </div>
    </div> -->
    <main>
      <section class="home">
        <div class="home-text">
          <h4 class="text-h4">Bem-vindo(a) administador(a)</h4>
          <p>Funções do(a) administador(a):</p>
            <a href="botaolotes.php" class="btn btn-primary">Gerar lotes</a>
            <a href="melhores.php" class="btn btn-primary">Melhores lotes</a>
            <a href="enviaemail.php" class="btn btn-primary">Enviar e-mail</a>
            <a href="../index/logout.php"><i class="logout ri-logout-box-r-line"></i></a>
        </div>
        <div class="home-img">
          <img src="../imagens/adm.svg" alt="Homem branco de óculos e cabelo cacheado com calça cinza, camiseta e sapatos laranja em cima de um patinete. No fundo há árvores e prédios.">
        </div>
      </section>
</body>
</html>