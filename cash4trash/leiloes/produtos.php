<?php 
    require "../index/conexao.php";
    $conexao = getConexao();

    require "operacoes.php";

    require "cron/atualizastatuslote.php";

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cash4Trash</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/outroteste.css" />
</head>
<body>
    <header>
<?php
      include_once("../include/navbar.php");
?>
    </header> 
    <script>
            const menuc4t = document.querySelector('.menuc4t');
            const NavMenuc4t = document.querySelector('.nav-menuc4t');

            menuc4t.addEventListener('click', () => {
                menuc4t.classList.toggle('ativo');
                NavMenuc4t.classList.toggle('ativo');
            })
    </script>

    <main>
        <div class="container-produtos">
        <section class="section">
        <?php
                        
            if(isset($_SESSION["email"])){
            echo'
            <!--PRÓXIMOS AO SEU ENDEREÇO-->
            <div class="container">
            <div class="section_header">
            <h3 class="section_title">PRÓXIMOS AO SEU ENDEREÇO</h3>
            </div>
            <!--Swipper-->
            <div class="swiper"> <!--swiper mySwiper-->
            <div class="swiper-wrapper">';
                    
                        //pega cep
                        $cepUsuario = select_query("select cep from usuario where email='". $_SESSION["email"] . "'", $conexao);
                        $cepParceiros = select_query("select cep, nome from usuario where tipo='L'", $conexao);

                        $proximos = maisProximos($cepParceiros, $cepUsuario);// retorna nome dos 5 parceiros mais proximos
                        $lote=01;

                        for ($i=0; $i< count($proximos); $i++){
                            //var_dump($proximos);
                            $consulta_lixo = select_query("select imagem, lote from lixo where parceiro='". $proximos[$i]. "' order by lote", $conexao);
                            while ($linha = mysqli_fetch_assoc($consulta_lixo)) {
                                if ($linha["lote"]!=$lote){
                                    $lote=$linha["lote"];
                                    $img=$linha["imagem"];
                                    $consulta_lote = select_query("select valor_atual, nome from lote where id='". $lote . "' and statu=1", $conexao);
                                    while ($linha = mysqli_fetch_assoc($consulta_lote)) {
                                        echo '
                                        <div class="swiper-slide">
                                            <a href="produto.php?id='. $lote .'">
                                            <div class="card">
                                                <div class="card_top">
                                                    <img src="../produto/'. $img .' ">
                                                </div>
                                                <div class="card_body">
                                                    <h3 class="card_title">'. $linha["nome"] .'</h3>
                                                    <p class="card_price">R$ '. $linha["valor_atual"] .'</p>
                                                </div>
                                            </div>
                                            </a>
                                        </div>';
                                        
                                    }
                                    mysqli_free_result($consulta_lote);
                                    
                                }
                                
                            }
                           
                            
                            mysqli_free_result($consulta_lixo);
                        }

                        
                        

                        //mysqli_close($conexao);
                        
                echo'    
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                </div>
                </div>';
                }
            ?>
        <div class="container">
            <div class="section_header">
                <h3 class="section_title">MELHORES DA SEMANA</h3>
            </div>
            <div class="swiper">
            <div class="swiper-wrapper">
                <?php
                    $consulta_lote = select_query("select id,valor_atual, nome from lote where melhores='1' and statu=1", $conexao);
                    while ($linha = mysqli_fetch_assoc($consulta_lote)) {
                        $id=$linha["id"];
                        $consulta_lixo = select_query("select imagem from lixo where lote='". $id . "' order by lote limit 1", $conexao);
                            while ($linha2 = mysqli_fetch_assoc($consulta_lixo)) {
                            echo '
                            <div class="swiper-slide">
                            <a href="produto.php?id='. $id .'">
                                <div class="card">
                                <div class="card_top">
                                <img src="../produto/'. $linha2["imagem"] .' " class="card_img">
                                </div>
                                <div class="card_body">
                                <h3 class="card_title">'. $linha["nome"] .'</h3>
                                <p class="card_price">R$ '. $linha["valor_atual"] .'</p>
                                </div>  
                            </a>
                            </div>';
                    
                        }
                    }
                    

                    //mysqli_free_result($consulta_lixo);
                    //mysqli_free_result($consulta_lote);

                    //mysqli_close($conexao);
                    
                ?>
                </div>
                <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            </div>
        </div>
        <div class="container">
            <div class="section_header">
                <h3 class="section_title">COMEÇARAM AGORA</h3>
            </div>
            <div class="swiper">
            <div class="swiper-wrapper">
                    <?php
                        //recem add
                        $consulta_lote = select_query("select id,valor_atual, nome from lote where statu=1 order by inicio limit 15", $conexao);
                        while ($linha = mysqli_fetch_assoc($consulta_lote)) {
                            $id=$linha["id"];
                            $consulta_lixo = select_query("select imagem from lixo where lote='". $id . "' order by lote limit 1", $conexao);
                            while ($linha2 = mysqli_fetch_assoc($consulta_lixo)) {
                                echo '
                                <div class="swiper-slide">
                                <a href="produto.php?id='. $id .'">
                                    <div class="card">
                                    <div class="card_top">
                                    <img src="../produto/'. $linha2["imagem"] .' " class="card_img">
                                    </div>
                                    <div class="card_body">
                                    <h3 class="card_title">'. $linha["nome"] .'</h3>
                                    <p class="card_price">R$ '. $linha["valor_atual"] .'</p>
                                    </div>  
                                </a>
                                </div>';
                        
                            }
                        }
                        

                        //mysqli_free_result($consulta_lixo);
                        //mysqli_free_result($consulta_lote);

                        //mysqli_close($conexao);
                        
                    ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <div class="container">
            <div class="section_header">
                <h3 class="section_title">FAÇA O ÚLTIMO LANCE</h3>
            </div>
            <div class="swiper">
            <div class="swiper-wrapper">
                <?php
                    //add ha mais tempo

                    $consulta_lote = select_query("select id,valor_atual, nome from lote where statu=1 order by inicio desc limit 15", $conexao);
                    
                    while ($linha = mysqli_fetch_assoc($consulta_lote)) {
                        $id=$linha["id"];
                        $consulta_lixo = select_query("select imagem from lixo where lote='". $id . "' order by lote limit 1", $conexao);
                        while ($linha2 = mysqli_fetch_assoc($consulta_lixo)) {
                            echo '
                            <div class="swiper-slide">
                            <a href="produto.php?id='. $id .'">
                                <div class="card">
                                <div class="card_top">
                                <img src="../produto/'. $linha2["imagem"] .' " class="card_img">
                                </div>
                                <div class="card_body">
                                <h3 class="card_title">'. $linha["nome"] .'</h3>
                                <p class="card_price">R$ '. $linha["valor_atual"] .'</p>
                                </div>  
                            </a>
                            </div>';
                            
                        }
                        mysqli_free_result($consulta_lixo);
                    }
                    mysqli_free_result($consulta_lote);

                    
                    

                    mysqli_close($conexao);
                ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>

        </div>
    </main>
</body>
</html>