<head>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="pagina_usuario.css"/>
    <link rel="icon" type="image/x-icon" href="../imagens/favicon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
      <div class="w-100 box">
        <div class="w-100 box">
            <form action="edit_foto.php" class="box" id="form-form" method="post" enctype="multipart/form-data">
                <div class="image-upload box">
                    <img id="imagepreview" src="<?php echo $diretorio; ?>" alt="Foto de perfil." draggable="false" class="w-100 h-100">
                    <input type="file" id="imagefield" onchange="previewImage(event)" name="imagefield">
                </div>
                <button type="submit" id="submitButton" style="display: none;">Mudar foto de perfil</button>

                 <script>
                  function previewImage(event) {
                  const imagefield = document.getElementById('imagefield');
                  const submitButton = document.getElementById('submitButton');
                  const imagepreview = document.getElementById('imagepreview');
                    
                  if (imagefield.files.length > 0) {
                    const selectedImage = imagefield.files[0];
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        imagepreview.src = e.target.result;
                        imagepreview.style.display = 'block';
                    };

                        reader.readAsDataURL(selectedImage);
                        submitButton.style.display = 'block';
                    } else {
                        imagepreview.style.display = 'none';
                        submitButton.style.display = 'none';
                    }
                }
            </script>
            </form>
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
                <h2 class="editar_title">Editar dados do perfil</h2>
                <form class="form_edit" id="e-form" method="post" action="edit_usuario.php">
                <div class="column">

                  <label for="nome">Nome de usuário</label>
                  <input class="form__input" type="text" name="nome" id="nome" value="<?php echo $_SESSION['nome']; ?>" required/>

                  <label for="nasc">Data de nascimento (ano/mês/dia)</label>
                  <input class="form__input" type="text" name="nasc" id="nasc" value="<?php echo $nascimento; ?>" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}"required/>

                  <label for="email">Email</label>
                  <input class="form__input" type="email" name="email" id="email" value="<?php echo $_SESSION['email']; ?>" required/>
                  <span id="emailErro" class="erro"></span>

                  <label for="cpf">CPF</label>
                  <input class="form__input" type="text" name="cpf" id="cpf" value="<?php echo $cpf; ?>" required/>
                  <span id="cpfErro" class="erro"></span>

                  <label for="cep">CEP</label>
                  <input class="form__input" type="text" name="cep" id="cep" value="<?php echo $cep; ?>" required/>
                  <span id="cepErro" class="erro"></span>

                  <label for="logradouro">Logradouro</label>
                  <input class="form__input" type="text" name="logradouro" id="logradouro" value="<?php echo $_SESSION['endereco'][0]; ?>" required/>

                  <label for="numero">Número do endereço</label>
                  <input class="form__input" type="number" name="numero" id="numero" value="<?php echo $_SESSION['endereco'][1]; ?>" required/>

                  <label for="complemento">Complemento</label>
                  <input class="form__input" type="text" name="complemento" id="complemento" placeholder="Complemento" value="<?php echo $complemento; ?>" />

                  <label for="novasenha">Mudar senha:</label>
                  <input class="form__input" size="20" type="password" name="novasenha" id="novasenha" placeholder="Nova senha" />

                  <label for="senha">Digite a senha atual (Obrigatório):</label>
                  <input class="form__input" type="password" name="senha" id="senha" placeholder="Senha atual" required/>
                    <br><br>
                    <div class="espace">
                    <button class="form__button button submit" id="btnEditar" type="submit">ENVIAR</button>
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