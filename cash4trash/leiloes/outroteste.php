<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cash4Trash</title>    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/outroteste.css">
</head>
<body>
<header>
        <nav class="navigationc4t">
          <a href="../index/index.php" ><img src="../imagens/logo.jpg" draggable="false" id="logo" class="cash4trash"></a>
          <ul class="nav-menuc4t">
            <li class="nav-itemc4t"><a href="../produto/cadastro_produto.php">Anunciar</a></li>
            <li class="nav-itemc4t"><a href="../marketplace/mkplace.html">Marketplace</a></li>
            <li class="nav-itemc4t"><a href="#">Contato</a></li>
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
            
            
          <div class="menuc4t">
            <span class="barc4t"></span>
            <span class="barc4t"></span>
            <span class="barc4t"></span>
          </div>
        </nav>
    </header> 
    <script>
            const menuc4t = document.querySelector('.menuc4t');
            const NavMenuc4t = document.querySelector('.nav-menuc4t');

            menuc4t.addEventListener('click', () => {
                menuc4t.classList.toggle('ativo');
                NavMenuc4t.classList.toggle('ativo');
            })
    </script>


    <section class="section">
<!--PRÓXIMOS AO SEU ENDEREÇO-->
        <div class="container">
            <div class="section_header">
                <h3 class="section_title">PRÓXIMOS AO SEU ENDEREÇO</h3>
            </div>
            <!--Swipper-->
            <div class="swiper"> <!--swiper mySwiper-->
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

<!--MELHORES DA SEMANA-->
        <div class="container">
            <div class="section_header">
                <h3 class="section_title">MELHORES DA SEMANA</h3>
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

<!--COMEÇARAM AGORA-->
        <div class="container">
            <div class="section_header">
                <h3 class="section_title">COMEÇARAM AGORA</h3>
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

<!--FAÇA O ÚLTIMO LANCE-->
        <div class="container">
            <div class="section_header">
                <h3 class="section_title">FAÇA O ÚLTIMO LANCE</h3>
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
    <!--slide js-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="js/outroteste.js"></script>
</body>
</html>