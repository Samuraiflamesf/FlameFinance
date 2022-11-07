<?php
@session_start();
require_once('../int/config.php');
require_once('../int/verificar.php');
$id_usuario = $_SESSION[]
//Recuperar dados do usuarios
$query = $pdo->query("SELECT * FROM usuarios WHERE nivel ='Admin'");
$result = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($result);


?>


<!DOCTYPE html>
<html lang="pt">

<head>
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

  <!-- Titulo -->
  <title><?php echo $nome_sistema ?></title>
</head>

<body>
  <header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <!--Logo-->
          <img src="../assets/img/FlameBox.ico" class="bi me-2" width="40" role="img" aria-label="Bootstrap">
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">1</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">2</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">3</a></li>
        </ul>
        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle show" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="true">
            <img src="../assets/img/user.png" alt="mdo" width="32" height="32" class="rounded-circle">
            <?php echo @$nome_usuario ?>
          </a>

          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" data-popper-placement="top-end">
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalPerfil">Configurações</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="../int/logout.php">Sair</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>

  <div class="modal fade" id="modalPerfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Perfil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-5">
          <from class="">
              <!--Nome-->
              <div class="row form-floating mt-3">
                <input type="nome" class="form-control" id="floatingNome" placeholder="Nome" name="nome" 
                value="<?php echo @$nome_usuario ?>">
                <label for="floatingNome">Nome Completo</label>
              </div>
              <!--Email-->
              <div class="row form-floating mt-3">
                <input type="email" class="form-control" id="floatingEmail" placeholder="E-mail" name="email" 
                value="<?php echo @$email_usuario?>">
                <label for="floatingEmail">E-mail</label>
              </div>
              <!--Senha-->
              <div class="row form-floating mt-3">
                <input type="senha" class="form-control" id="floatingSenha" placeholder="Senha" name="senha">
                
                <label for="floatingSenha">Senha</label>
              </div>

          </from>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success">
            Salvar
          </button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
            Fechar
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- Javascript Custom -->
  <script type="text/javascript" src="../assets/js/admin_page.js"></script>
  <!-- Bootstrap -->
  <script type="text/javascript" src="../assets/bootstrap/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="../assets/bootstrap/jquery-3.6.0.min.js"></script>
</body>

</html>