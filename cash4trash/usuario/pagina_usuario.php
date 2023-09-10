<head>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="pagina_usuario.css"/>
    <link rel="icon" type="image/x-icon" href="../imagens/favicon.png">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>
<?php
  include_once("../include/navbar.php");

  require "../index/conexao.php";

  $conexao = getConexao();

  $email = $_SESSION["email"];
  $sql = "select diretorio, nascimento, cpf_cnpj, cep, complemento from usuario where email='$email'";

  $resultado = mysqli_query($conexao, $sql);

  if (!$resultado) {
    header("Location: ../cadastros/cadastro_erro.html");
    //echo "Erro na consulta: " . mysqli_error($conexao);
    exit;
    }else{
      while ($linha = mysqli_fetch_assoc($resultado)) {
        $diretorio = "../cadastros/".$linha["diretorio"];
        $nascimento = $linha["nascimento"];
        $cpf = $linha["cpf_cnpj"];
        $cep = $linha["cep"];
        $complemento = $linha["complemento"];
      }
    }
  
?>
    <section class="section">
      <div class="section__container">
      <div class="image">
          <img src="<?php echo $diretorio; ?>" alt="perfil" draggable="false"><!--tem que pegar a foto do usuario-->
          <div class="round">
            <input type="file">
            <i class="fa fa-camera"  style = "color: #fff;"></i>
          </div>
      </div>
        <div class="content">
          <p class="subtitle">OLÁ,</p>
          <h1 class="title">
            <?=$_SESSION['nome']?>!
          </h1>
          <p class="description">
            <i class="ri-mail-line"></i> <?= $_SESSION['email']?>
            <br>
            <i class="ri-home-3-line"></i> <?= $_SESSION['endereco'][0] . ", " . $_SESSION['endereco'][1] ?> <!--fazer consulta no banco-->
          </p>
          <div class="action__btns">
            <!--<button class="dados">MEUS DADOS</button>-->
            <button type="button" id="openModal" class="editar">EDITAR PERFIL</button>
            <div class="div_logout">
            <a href="../index/logout.php"><i class="logout ri-logout-box-r-line"></i></a>
            </div>
            <div id="myModal" class="modal">
              <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Editar dados do perfil</h2>
                <form class="form_edit" id="e-form" method="post" action="edit_usuario.php">
                <div class="column">
                    <input class="form__input" type="text" name="nome" id="nome" value="<?php echo $_SESSION['nome']; ?>" required/>
                    <input class="form__input" type="text" name="nasc" id="nasc" value="<?php echo $nascimento; ?>" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}"required/>
                    <input class="form__input" type="email" name="email" id="email" value="<?php echo $_SESSION['email']; ?>" required/>
                    <span id="emailErro" class="erro"></span>
                    <input class="form__input" type="text" name="cpf" id="cpf" value="<?php echo $cpf; ?>" required/>
                    <span id="cpfErro" class="erro"></span>
                    <input class="form__input" type="text" name="logradouro" id="logradouro" value="<?php echo $_SESSION['endereco'][0]; ?>" required/>
                    <input class="form__input" type="text" name="cep" id="cep" value="<?php echo $cep; ?>" required/>
                    <span id="cepErro" class="erro"></span>
                    <input class="form__input" type="number" name="numero" id="numero" value="<?php echo $_SESSION['endereco'][1]; ?>" required/>
                    <input class="form__input" type="text" name="complemento" id="complemento" placeholder="Complemento" value="<?php echo $complemento; ?>" />
                    <input class="form__input" type="password" name="senha" id="senha" placeholder="Senha atual" required/>
                    <input class="form__input" type="password" name="novasenha" id="novasenha" placeholder="Nova senha" />
                    <br><br>
                    <div class="espace">
                    <button class="form__button button submit" id="btnEditar" type="submit">Enviar</button>
                    </div>
                </div>
              </div>	
            </div>
                </form>
        </div>
        </div>

            
      </div>
    </div>
  </div>
</section>
</body>

<script>
  var openModalBtn = document.getElementById("openModal");
var modal = document.getElementById("myModal");
var closeModalBtn = document.getElementsByClassName("close")[0];

openModalBtn.onclick = function() {
  modal.style.display = "block";
};

closeModalBtn.onclick = function() {
  modal.style.display = "none";
};

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};
</script>
</html>