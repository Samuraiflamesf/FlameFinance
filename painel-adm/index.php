<?php
@session_start();
require_once("../int/conexao.php");
require_once("../int/verificar.php");
$id_usuario = $_SESSION['id_usuario'];

//Recuperar dados do usuarios
$query = $pdo->query("SELECT * from usuarios where id = '$id_usuario' ");
$result = $query->fetchAll(PDO::FETCH_ASSOC);
$nome_usuario = $result[0]['nome'];
$email_usuario = $result[0]['email'];
$senha_usuario = $result[0]['senha'];
$nivel_usuario = $result[0]['nivel'];
$primeiroNome = strstr($nome_usuario, ' ', true);
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <title><?php echo $nome_sistema ?></title>
  <!-- Meta tags Obrigatórias -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../assets/bootstrap/bootstrap.min.css">
  <!-- Styles Custom -->
  <link rel="stylesheet" href="../assets/css/admin_page.css">
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/b04ef94895.js" crossorigin="anonymous"></script>
  <!-- Ícone e Nome do site -->
  <link rel="shortcut icon" href="../assets/img/FlameBox.ico">
  <!-- AJAX -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script type="text/javascript" src="../assets/bootstrap/bootstrap.bundle.min.js"></script>
  <!-- Titulo -->
</head>

<body>
  <header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-between justify-content-lg-start m-auto">
        <a href="/" class="d-none d-md-block  text-decoration-none me-lg-4">
          <!--Logo-->
          <img src="../assets/img/FlameBox.ico" width="40" height="40" role="img" aria-label="Bootstrap">
        </a>
        <ul class="nav nav-pills col-auto me-lg-auto mx-sm-2 mb-2 align-items-center justify-content-center mb-md-0 ml-2 ">
          <li class="nav-item"><a href="#" class="nav-link px-2 active">Home</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 ">1---1</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 ">2---2</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 ">3---3</a></li>
        </ul>

        <div class="dropdown text-sm-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle show" id="dropdownUser1 " data-bs-toggle="dropdown" aria-expanded="true">
            <img src="../assets/img/user.png" alt="mdo" width="32" height="32" class="rounded-circle">
            <?php echo 'Olá, ' . $primeiroNome ?>
          </a>

          <ul class="dropdown-menu text-small mt-2 p-1" aria-labelledby="dropdownUser1" data-popper-placement="top-end">
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalPerfil">
                <i class="fa-solid fa-user m-1"></i>
                Perfil</a></li>
            <li>
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalConfig">
                <i class="fa-solid fa-gear m-1"></i>
                Configurações</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="../int/logout.php">
                <i class="fa-solid fa-right-from-bracket m-1"></i>
                Sair</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>

  <div class="modal fade " id="modalPerfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Perfil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="form-perfil" method="post">
          <div class="modal-body p-4">
            <small class="mt-2">
              <div id="mensagem-perfil" role="alert" align="center"></div>
            </small>
            <!--Nome-->
            <div class="row form-floating mt-3">
              <input type="text" class="form-control" id="floatingNome" placeholder="Nome" name="nome-usuario" value="<?php echo $nome_usuario ?>">
              <label for="floatingNome">Nome Completo</label>
            </div>
            <!--Email-->
            <div class="row form-floating mt-3">
              <input type="email" class="form-control" id="floatingEmail" placeholder="E-mail" name="email-usuario" value="<?php echo $email_usuario ?>">
              <label for="floatingEmail">E-mail</label>
            </div>
            <!--Senha-->
            <div class="row form-floating mt-3">
              <div class="input-group mb-3 p-0">
                <span class="input-group-text" id="code_locker">
                  <i class="fa-solid fa-lock"></i>
                </span>
                <div class="form-floating ">
                  <input type="password" class="form-control" id="floatingSenha" placeholder="Senha" name="senha-usuario" value="<?php echo $senha_usuario ?>">
                  <label for="floatingPassword">Senha</label>
                </div>
                <button class="btn btn-outline-secondary" type="button" onclick="viewPassWord()">
                  <i class="fa-solid fa-eye" id="vision_on"></i>
                  <i class="fa-solid fa-eye-slash d-none" id="vison_off"></i>
                </button>
              </div>

              <input type="hidden" name="id-usuario" value="<?php echo $id_usuario ?>">
              <div class="modal-footer justify-content-center">
                <button type="submit" class="btn btn-success">Salvar</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="btn-fechar-perfil">
                  Fechar
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Botão Password -->
  <script type="text/javascript">
    let pass = true;

    function viewPassWord() {
      if (pass == true) {
        pass = false;
        document.getElementById('vision_on').classList.add('d-none')
        document.getElementById('vison_off').classList.remove('d-none')
        document.getElementById('floatingSenha').type = "text"

      } else {
        pass = true;
        document.getElementById('vison_off').classList.add('d-none')
        document.getElementById('vision_on').classList.remove('d-none')
        document.getElementById('floatingSenha').type = "password"
      }
    }
  </script>

  <!-- Ajax para inserir ou editar dados -->
  <script type="text/javascript">
    $("#form-perfil").submit(function() {
      event.preventDefault();
      var formData = new FormData(this);

      $.ajax({
        url: "../int/editarPerfil.php",
        type: 'POST',
        data: formData,

        success: function(mensagem) {

          $('#mensagem-perfil').removeClass()

          if (mensagem.trim() == "Salvo com Sucesso!") {
            $('#btn-fechar-perfil').click();
            window.location = "index.php?";

          } else {

            $('#mensagem-perfil').addClass('alert')
            $('#mensagem-perfil').addClass('alert-danger')
            $('#mensagem-perfil').addClass('p-2')
          }
          $('#mensagem-perfil').text(mensagem)

        },

        cache: false,
        contentType: false,
        processData: false,

      });

    });
  </script>

</body>

</html>