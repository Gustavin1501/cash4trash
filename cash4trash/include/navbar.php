<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../imagens/favicon.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Cash4Trash</title>

    <style type="text/css">
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap");

    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        list-style: none;
        text-decoration: none;
    }

    :root{
    --bg-body: rgb(255, 255, 255);
    --color-font: rgb(194, 108, 37);
    --color-card: rgb(64, 128, 106);
    --max-width: 1200px;
    --secondary-color: #ca8a04;
    }

    body{
        font-family: "Poppins", sans-serif;
    }

    .navigation{
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 18px 40px;
    box-shadow: 0 0.1rem 0.5rem #ccc;
    width: 100%;
    background: var(--white);
    transition: all 0.5s;
}

    nav .checkbox {
    display: none;
    }

    .img_logo{
        max-width: 100%;
        display: block;
        height: 7vmin;
        object-fit:contain;
        margin: 0 auto;
    }

    .nav-menu{
        margin-top: 1vh;
    }

    .navigation ul{
        display: flex;
        align-items: center;
        list-style: none;
        gap: 1rem;
        transition: left 0.3s;
    }

    .navigation ul li a{
        color: var(--color-font);
        font-size: 17px;
        font-weight: 600;
        transition: 0.3s;
        text-decoration: none;
        padding: 0.5rem 0.5rem;
        border: 2px solid transparent;
    }

    .navigation ul li a:hover{
        border-top-color: var(--secondary-color);
        border-bottom-color: var(--secondary-color);
        color: rgba(0, 0, 0, 0.771);
    }

    .navigation i{
        cursor: pointer;
        font-size: 1.5rem;
        color: var(--color-font);
    }

    .menu{
        cursor: pointer;
        display: none;
    }

    .menu .bar{
        display: block;
        width: 28px;
        height: 3px;
        border-radius: 3px;
        background: rgba(0, 0, 0, 0.705);
        margin: 5px auto;
        transition: all 0.3s;
    }

    .menu .bar:nth-child(1),
    .menu .bar:nth-child(3){
        background: var(--color-font);
    }

    .sub-menu-wrap{
        position: absolute;
        top: 100%;
        right: 10%;
        width: auto;
    }

    .sub-menu{
        background: #fff;
        padding: 20px;
        margin: 10px;
    }

    .ola{
        color: rgb(208, 140, 14);
        font-size: larger;
        font-weight: 500;
    }

    .olaa{
        color: var(--color-font);
        font-size: larger;
        margin-left: -11px;
        font-weight: 500;
    }

    @media (max-width:785px) {
    .navigation{
        padding: 18px 20px;
    }
    .menu{
        display: block;
    }
    .menu.ativo .bar:nth-child(1){
        transform:  translateY(8px) rotate(45deg);
    }
    .menu.ativo .bar:nth-child(2) {
        opacity: 0;
    }
    .menu.ativo .bar:nth-child(3){
        transform: translateY(-8px) rotate(-45deg);
    }
    .nav-menu{
        position: fixed;
        right: -100%;
        top: 70px;
        width: 100%;
        height: 100%;
        flex-direction: column;
        background: var(--white);
        gap: -10px;
        transition: 0.3s;
    }
    .nav-menu.ativo{
        right: 0;
        background-color: #fff;
        position: absolute;
   }
    .nav-item{
        margin: 16px 0;
    }
}
    </style>
</head>
<body>
    <header>
        <nav class="navigation">
          <a href="../index/index.php" ><img class="img_logo" src="../imagens/logo.jpg" draggable="false" id="logo"></a>
          <ul class="nav-menu">
            <li class="nav-item"><a href="../leiloes/produtos.php">Leilões</a></li>
            <li class="nav-item"><a href="../produto/cadastro_produto.php">Anunciar</a></li>
            <li class="nav-item"><a href="../marketplace/mkplace.php">Marketplace</a></li>
            <li class="nav-item"><a href="#">Contato</a></li>
            <?php
              if(!isset($_SESSION["nome"])){ //SE ESTIVER DESLOGADO 
                  echo "<a href='../login/login.html'><i class='bx bx-user'></i></a>";
              }else{ //SE ESTIVER LOGADO
                  echo "<a href='../usuario/pagina_usuario.php'><i class='bx bx-user'></i></a>";
                  echo"
                      <a href='../usuario/pagina_usuario.php' <p class='olaa'>{$_SESSION['nome']}</p></a>";
              }
              ?>
          </ul>
          </ul> 
            
            
          <div class="menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
          </div>
        </nav>
    </header> 
    <script>
            const menu = document.querySelector('.menu');
            const NavMenu = document.querySelector('.nav-menu');

            menu.addEventListener('click', () => {
                menu.classList.toggle('ativo');
                NavMenu.classList.toggle('ativo');
            })
    </script>
</body>