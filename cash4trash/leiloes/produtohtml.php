<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cash4Trash</title>
    <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="css/estilo-produto.css" rel="stylesheet">
    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("Dec 5, 2022 15:37:25").getTime();
        
        // Update the count down every 1 second
        var x = setInterval(function() {
        
        // Get today's date and time
        var now = new Date().getTime();
        
          // Find the distance between now and the count down date
          var distance = countDownDate - now;
        
          // Time calculations for days, hours, minutes and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
          // Display the result in the element with id="demo"
          document.getElementById("demo").innerHTML = days + "d " + hours + "h "
          + minutes + "m " + seconds + "s ";
        
          // If the count down is finished, write some text
          if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
          }
        }, 1000);
        </script>
</head>
<body>
    <?php
    include_once("../include/navbar.php");
    ?>
<main>
    <div class="principal">
        <div class="produto-principal">
            <div class="imagem-produto">
                <div class="carousel-container">
                    <div class="carousel">
                        <div class="slide">
                            <img class="img_produto" src="../imagens/produto.svg" alt="Imagem 1">
                        </div>
                        <div class="slide">
                            <img class="img_produto" src="../imagens/produto.svg" alt="Imagem 1">
                        </div>
                        <div class="slide">
                            <img class="img_produto" src="../imagens/produto.svg" alt="Imagem 1">
                        </div>
                    </div>
                    <button id="next" class="arrow-button"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
                <div class="infos-produto">
                    <div class="tag-categoria">
                        Computadores e acessórios
                    </div>
                    <h3 class="negrito">Notebook Samsung Flash F30 Intel Celeron , 4GB RAM, 64GB SSD , Tela Full HD 13.3", Windows 10 - Rosa</h3>
                    <p>Lote 006/24 - 8 unidades</p>
                    <h3 class="negrito" id="laranja">Último lance  R$32, 99</h3>
                    <div class="lance"> 
                        <center>
                            <button type="button" class="lance-button">+1</button>
                            <button type="button" class="lance-button">+3</button>
                            <button type="button" class="lance-button">+5</button>
                            <input  id="lance-input" type="text" placeholder="Personalizar oferta">
                        </center>
                        <center>
                            <button type="button" class="w3-button w3-orange">LANÇAR</button>
                        </center>
                    </div>
                </div>
                <div class="area-cronometro">
                    <div class="cronometro">
                        <center class="negrito">
                            TEMPO
                        </center>
                        <center id="tempo">
                            <p id="demo"></p>
                        </center>

                    </div>
                </div>
            </div>
            <div class="descricao">
                <h5 class="negrito">Descrição:</h5>
                <p>- Upgrade gratuito para o Windows 11 quando disponível. (Confira detalhes a seguir*)</p>
                <p>- O samsung notebook flash é um dispositivo de estilo único que dá um up no seu look, esteja em suas mãos ou na sua mesa; construído para encaixar em sua rotina e projetado com atenção aos detalhes</p>
                <p>- Monte o seu look com o notebook flash</p>
                <p>- Construído para encaixar em sua rotina e projetado com atenção aos detalhes, o samsung notebook flash é o notebook com um senso único de estilo </p>
                <p>- *O plano de implementação de upgrade do Windows 11 ainda está sendo finalizado, mas está programado para começar no final de 2021 e continuar em 2022. O tempo específico varia de acordo com o dispositivo. </p>
            </div>
        <div class="sugestoes">
            <hr class="linha">

            <div class="bloco">
                <div class="categoria">
                    <h4>
                        LOTES SEMELHANTES
                    </h4>
                </div>
                <div class="produtos">

                    <div class="swiper"> <!--swiper-->
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                              <div class="card">
                                <div class="card_top">
                                    <!--<div class="produto">-->
                                        <a href="produto.html"><img width="150px" src="../imagens/produto.svg"></a>
                                </div>
                                        <div class="card_body">
                                            <h3 class="card_title">Notebook Samsung Flash F30, 4GB RAM, 64GB SSD...</h3>
                                            <p class="card_price">R$ 32,99</p>
                                        </div>
                                    </div>
                            </div>
                        
                            <div class="swiper-slide">
                                <div class="card">
                                  <div class="card_top">
                                      <!--<div class="produto">-->
                                          <a href="produto.html"><img width="150px" src="../imagens/produto.svg"></a>
                                  </div>
                                          <div class="card_body">
                                              <h3 class="card_title">Notebook Samsung Flash F30, 4GB RAM, 64GB SSD...</h3>
                                              <p class="card_price">R$ 32,99</p>
                                          </div>
                                      </div>
                              </div>

                              <div class="swiper-slide">
                                <div class="card">
                                  <div class="card_top">
                                      <!--<div class="produto">-->
                                          <a href="produto.html"><img width="150px" src="../imagens/produto.svg"></a>
                                  </div>
                                          <div class="card_body">
                                              <h3 class="card_title">Notebook Samsung Flash F30, 4GB RAM, 64GB SSD...</h3>
                                              <p class="card_price">R$ 32,99</p>
                                          </div>
                                      </div>
                              </div>

                              <div class="swiper-slide">
                                <div class="card">
                                  <div class="card_top">
                                      <!--<div class="produto">-->
                                          <a href="produto.html"><img width="150px" src="../imagens/produto.svg"></a>
                                  </div>
                                          <div class="card_body">
                                              <h3 class="card_title">Notebook Samsung Flash F30, 4GB RAM, 64GB SSD...</h3>
                                              <p class="card_price">R$ 32,99</p>
                                          </div>
                                      </div>
                              </div>

                                <div class="swiper-slide">
                                <div class="card">
                                  <div class="card_top">
                                      <!--<div class="produto">-->
                                          <a href="produto.html"><img width="150px" src="../imagens/produto.svg"></a>
                                  </div>
                                          <div class="card_body">
                                              <h3 class="card_title">Notebook Samsung Flash F30, 4GB RAM, 64GB SSD...</h3>
                                              <p class="card_price">R$ 32,99</p>
                                          </div>
                                      </div>
                              </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                </div>

                </div>
            </div>
            <hr class="linha">
            <div class="bloco">
                <div class="categoria">
                    <h4>
                        DO MESMO ANUNCIANTE
                    </h4>
                </div>
                <div class="produtos">

                    <div class="swiper"> <!--swiper-->
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="card">
                                <div class="card_top">
                                    <!--<div class="produto">-->
                                        <a href="produto.html"><img width="150px" src="../imagens/produto.svg"></a>
                                </div>
                                        <div class="card_body">
                                            <h3 class="card_title">Notebook Samsung Flash F30, 4GB RAM, 64GB SSD...</h3>
                                            <p class="card_price">R$ 32,99</p>
                                        </div>
                                    </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="card">
                                <div class="card_top">
                                    <!--<div class="produto">-->
                                        <a href="produto.html"><img width="150px" src="../imagens/produto.svg"></a>
                                </div>
                                        <div class="card_body">
                                            <h3 class="card_title">Notebook Samsung Flash F30, 4GB RAM, 64GB SSD...</h3>
                                            <p class="card_price">R$ 32,99</p>
                                        </div>
                                    </div>
                            </div>
                      
                        <div class="swiper-slide">
                            <div class="card">
                            <div class="card_top">
                                <!--<div class="produto">-->
                                    <a href="produto.html"><img width="150px" src="../imagens/produto.svg"></a>
                            </div>
                                    <div class="card_body">
                                        <h3 class="card_title">Notebook Samsung Flash F30, 4GB RAM, 64GB SSD...</h3>
                                        <p class="card_price">R$ 32,99</p>
                                    </div>
                                </div>
                        </div>

                        
                        <div class="swiper-slide">
                            <div class="card">
                            <div class="card_top">
                                <!--<div class="produto">-->
                                    <a href="produto.html"><img width="150px" src="../imagens/produto.svg"></a>
                            </div>
                                    <div class="card_body">
                                        <h3 class="card_title">Notebook Samsung Flash F30, 4GB RAM, 64GB SSD...</h3>
                                        <p class="card_price">R$ 32,99</p>
                                    </div>
                                </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="card">
                            <div class="card_top">
                                <!--<div class="produto">-->
                                    <a href="produto.html"><img width="150px" src="../imagens/produto.svg"></a>
                            </div>
                                    <div class="card_body">
                                        <h3 class="card_title">Notebook Samsung Flash F30, 4GB RAM, 64GB SSD...</h3>
                                        <p class="card_price">R$ 32,99</p>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
            </div>
                </div>
            </div>
        </div>
    </main>

    <br>


    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="js/produto.js"></script>
    <script src="js/carrosselproduto.js"></script>
</body>
</html>