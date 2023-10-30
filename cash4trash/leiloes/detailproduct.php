<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/detailproduct.css">
    <title>Cash4Trash</title>
</head>
<body>
<?php
    include_once("../include/navbar.php");
?>

    <section class="container sproduct my-5 pt-2">
        <div class="row mt-5">
            <div class="col-lg-5 col-md-12 col-12">
            <img class="img-fluid w-100 pb-1" src="../imagens/produto.svg" id="MainImg" alt="Imagem 1">

            <div class="small-img-group"><!--talvez não use-->
                <div class="small-img-col">
                    <img src="../imagens/produto.svg" width="100%" class="small-img" alt="Imagem 1 pequena">
                </div>
                <div class="small-img-col">
                    <img src="../imagens/anunciar.svg" width="100%" class="small-img" alt="Imagem 1 pequena">
                </div>
                <div class="small-img-col">
                    <img src="../imagens/desenho.png" width="100%" class="small-img" alt="Imagem 1 pequena">
                </div>
                <div class="small-img-col">
                    <img src="../imagens/leiloes.svg" width="100%" class="small-img" alt="Imagem 1 pequena">
                </div>
            </div>
        </div>

            <div class="col-lg-6 col-md-12 col-12">
                <div class="lance">
                    <h3 class="py-4">Leilão</h3>
                    <h2>R$100</h2>
                    <button type="button" class="lance-button">+1</button>
                    <button type="button" class="lance-button">+3</button>
                    <button type="button" class="lance-button">+5</button>
                    <input  id="lance-input" type="number" placeholder="Personalizar oferta">
                </div>
                <button class="buy-btn mt-5">LANÇAR</button>
                <h4 class="mt-5 mb-3">Descrição</h4>
                <span>Upgrade gratuito para o Windows 11 quando disponível. Conferir O samsung notebook flash é um dispositivo de estilo único que dá um up no seu look, esteja em suas mãos ou na sua mesa; construído para encaixar em sua rotina e projetado com atenção aos detalhes. Monte o seu look com o notebook flash</span>
            </div>
        </div>
    </section>

    <!--Lotes semelhantes-->
    <section class="section_lotes">
    <div class="container">
            <div class="section_header">
                <h3 class="section_title">LOTES SEMELHANTES</h3>
            </div>
            <div class="swiper">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <div class="card">
                        <div class="card_top">
                            <img src="imagens/item-1.jpg" class="card_img">
                        </div>
                        <div class="card_body">
                            <h3 class="card_title">Lixo</h3>
                            <p class="card_price">R$ 100</p>
                        </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="card">
                        <div class="card_top">
                            <img src="imagens/item-2.jpg" class="card_img">
                        </div>
                        <div class="card_body">
                            <h3 class="card_title">Lixo</h3>
                            <p class="card_price">R$ 100</p>
                        </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="card">
                        <div class="card_top">
                            <img src="imagens/item-3.jpg" class="card_img">
                        </div>
                        <div class="card_body">
                            <h3 class="card_title">Lixo</h3>
                            <p class="card_price">R$ 100</p>
                        </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="card">
                        <div class="card_top">
                            <img src="imagens/item-4.jpg" class="card_img">
                        </div>
                        <div class="card_body">
                            <h3 class="card_title">Lixo</h3>
                            <p class="card_price">R$ 100</p>
                        </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="card">
                        <div class="card_top">
                            <img src="imagens/item-6.jpg" class="card_img">
                        </div>
                        <div class="card_body">
                            <h3 class="card_title">Lixo</h3>
                            <p class="card_price">R$ 100</p>
                        </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="card">
                        <div class="card_top">
                            <img src="imagens/item-7.jpg" class="card_img">
                        </div>
                        <div class="card_body">
                            <h3 class="card_title">Lixo</h3>
                            <p class="card_price">R$ 100</p>
                        </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="card">
                        <div class="card_top">
                            <img src="imagens/item-8.jpg" class="card_img">
                        </div>
                        <div class="card_body">
                            <h3 class="card_title">Lixo</h3>
                            <p class="card_price">R$ 100</p>
                        </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="card">
                        <div class="card_top">
                            <img src="imagens/item-9.jpg" class="card_img">
                        </div>
                        <div class="card_body">
                            <h3 class="card_title">Lixo</h3>
                            <p class="card_price">R$ 100</p>
                        </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="card">
                        <div class="card_top">
                            <img src="imagens/item-10.jpg" class="card_img">
                        </div>
                        <div class="card_body">
                            <h3 class="card_title">Lixo</h3>
                            <p class="card_price">R$ 100</p>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
              </div>
        </div>
    </section>

    <script>
       var MainImg = document.getElementById('MainImg');
       var smallimg = document.getElementsByClassName('small-img');

       smallimg[0].onclick = function(){
        MainImg.src = smallimg[0].src;
       }

       smallimg[1].onclick = function(){
        MainImg.src = smallimg[1].src;
       }

       smallimg[2].onclick = function(){
        MainImg.src = smallimg[2].src;
       }

       smallimg[3].onclick = function(){
        MainImg.src = smallimg[3].src;
       }

       smallimg[4].onclick = function(){
        MainImg.src = smallimg[4].src;
       }

       smallimg[5].onclick = function(){
        MainImg.src = smallimg[5].src;
       }

       smallimg[6].onclick = function(){
        MainImg.src = smallimg[6].src;
       }

       smallimg[7].onclick = function(){
        MainImg.src = smallimg[7].src;
       }

       smallimg[8].onclick = function(){
        MainImg.src = smallimg[8].src;
       }

       smallimg[9].onclick = function(){
        MainImg.src = smallimg[9].src;
       }

       smallimg[10].onclick = function(){
        MainImg.src = smallimg[10].src;
       }

       smallimg[11].onclick = function(){
        MainImg.src = smallimg[11].src;
       }

       smallimg[12].onclick = function(){
        MainImg.src = smallimg[12].src;
       }

       smallimg[13].onclick = function(){
        MainImg.src = smallimg[13].src;
       }

       smallimg[14].onclick = function(){
        MainImg.src = smallimg[14].src;
       }

       smallimg[15].onclick = function(){
        MainImg.src = smallimg[15].src;
       }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="js/outroteste.js"></script>
</body>
</htm