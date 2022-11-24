<?php
@session_start();
require_once("../../../int/conexao.php");
require_once("../../../int/verificar.php");
$id_usuario = $_SESSION['id_usuario'];

//Recuperar dados do usuarios
$query = $pdo->query("SELECT * from usuarios where id = '$id_usuario' ");
$result = $query->fetchAll(PDO::FETCH_ASSOC);
$nome_usuario = $result[0]['nome'];
$email_usuario = $result[0]['email'];
$senha_usuario = $result[0]['senha'];
$nivel_usuario = $result[0]['nivel'];
$primeiroNome = strstr($nome_usuario, ' ', true);

//Menus do Painel
$menu1 = 'home';
$menu2 = 'clientes';
$menu3 = 'niveis';
$menu4 = 'usuarios';

//Recuperar e direcionar pagina 
if (@$_GET['pag'] == "") {
  $pag = $menu1;
} else {
  $pag = @$_GET['pag'];
}

?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <!-- Titulo -->
  <title><?php echo $nome_sistema ?></title>
  <!-- Meta tags Obrigatórias -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Styles Custom -->
  <link rel="stylesheet" href="../../../assets/css/admin_page.css">
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/b04ef94895.js" crossorigin="anonymous"></script>
  <!-- Ícone e Nome do site -->
  <link rel="shortcut icon" href="../../../public/FlameBox.ico">
  <!-- AJAX -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../../../assets/vendor/bootstrap/bootstrap.min.css">
  <script type="text/javascript" src="../../../assets/vendor/bootstrap/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="../../../assets/vendor/bootstrap/jquery-3.6.0.min.js"></script>
  <!-- Scripts Data Tables -->
  <link rel="stylesheet" type="text/css" href=".../../../assets/vendor/DataTables/datatables.css" />
  <script type="text/javascript" src="../../../assets/vendor/DataTables/datatables.js"></script>
</head>

<body>
  <!-- Barra de Navegação -->
  <header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-between justify-content-lg-start m-auto">
        <a href="index.php?pag=<?php echo $menu1 ?>" class="d-none d-md-block  text-decoration-none me-lg-4">
          <!--Logo-->
          <img src="../../../public/FlameBox.ico" width="40" height="40" role="img" aria-label="Bootstrap">
        </a>
        <!-- Parte da navbar -->
        <ul class="nav nav-pills col-auto me-lg-auto mx-sm-2 mb-2 align-items-center justify-content-center mb-md-0 ml-2 ">
          <!-- Parte do Home  -->
          <li class="nav-item dropdown"><a class="nav-link px-2 active" href="index.php?pag=<?php echo $menu1 ?>">Home</a></li>
          <!-- Parte do dropdown do Cadastro  -->
          <li class="nav-item px-2 ">
            <div class="dropdown">
              <button class="btn nav-link px-2 dropdown-toggle bg-white rounded p-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Cadastros
              </button>
              <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="index.php?pag=<?php echo $menu2 ?>">
                    Clientes</a></li>
                <li><a class="dropdown-item " href="index.php?pag=<?php echo $menu3 ?>">
                    Níveis de usuários</a></li>
                <li><a class="dropdown-item" href="index.php?pag=<?php echo $menu4 ?>">
                    Usuários</a></li>
              </ul>
            </div>
          </li>
        </ul>
        <!-- DropdownMenu do perfil -->
        <div class="dropdown text-sm-end darkmode-ignore bg-white rounded p-1">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle show" id="dropdownUser1 " data-bs-toggle="dropdown" aria-expanded="true">
            <img src="../../../assets/img/user.png" alt="mdo" width="32" height="32" class="rounded-circle">
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
            <li><a class="dropdown-item" href="../../../int/logout.php">
                <i class="fa-solid fa-right-from-bracket m-1"></i>
                Sair</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <!-- Modal para editar perfil -->
  <div class="modal fade" id="modalPerfil" tabindex="-1" aria-labelledby="modalEditarPerfil" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditarPerfil">Editar Perfil</h5>
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
<!-- Aonde é colocado a table -->
  <div class="container-fluid p-4" id="container">
    <?php
    require_once($pag . '.php');
    ?>
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
        url: "../../../int/editarPerfil.php",
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
  <!-- Script do Darkmode -->
  <script src="../../../assets/vendor/darkmodeJs/darkmode.js"></script>



</body>

</html>