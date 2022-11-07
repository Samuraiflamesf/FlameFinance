<?php
require_once('int/conexao.php');
//Criar admin caso nao exista 
$query = $pdo->query("SELECT * FROM usuarios WHERE nivel ='Admin'");
$result = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($result);

if ($total_reg == 0) {
    $pdo->query("INSERT INTO usuarios SET nome='$nome_admin', email = '$email_admin', senha='123', nivel = 'Admin' ");
}

?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
    <!-- Styles Custom -->
    <link rel="stylesheet" href="assets/css/login.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/b04ef94895.js" crossorigin="anonymous"></script>
    <!-- Ícone e Nome do site -->
    <link rel="shortcut icon" href="Assets/img/FlameBox.ico">

    <!-- Titulo -->
    <title><?php echo $nome_sistema ?></title>
</head>

<body class="d-flex align-items-center justify-content-center flex-column">
    <div class="card area">
        <div class="card-body m-5">
            <div class="row h2 d-flex justify-content-center">
                Entre em sua conta
            </div>
            <div class="row ">
                <form class="mt-4 align-middle form-login" method="post" action="int/autenticar.php">
                    <!--Parte do Email-->
                    <div class="row">
                        <div class="input-group mb-3 col">
                            <span class="input-group-text" id="code_locker">
                                <i class="fa-solid fa-envelope"></i>
                            </span>
                            <div class="form-floating col">
                                <input type="email" class="form-control" id="floatingEmail" placeholder="E-mail" name="email" required autofocus>
                                <label for="floatingEmail">E-mail</label>
                            </div>
                        </div>
                    </div>
                    <!--Parte da senha-->
                    <div class="row">
                        <div class="input-group">
                            <span class="input-group-text" id="code_locker">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                            <div class="form-floating ">
                                <input type="password" class="form-control w-auto" id="floatingPassword" placeholder="Senha" name='senha' required>
                                <label for="floatingPassword">Senha</label>
                            </div>
                            <button class="btn btn-outline-secondary" type="button" onclick="viewPassWord()">
                                <i class="fa-solid fa-eye" id="vision_on"></i>
                                <i class="fa-solid fa-eye-slash d-none" id="vison_off"></i>
                            </button>
                        </div>
                    </div>
                    <!--Parte conectado-->
                    <div class="row">
                        <div class="form-check form-switch mt-3 d-flex justify-content-center">

                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                            <label class="form-check-label mx-2" for="flexSwitchCheckDefault">
                                Permanecer conectado
                            </label>

                        </div>
                    </div>
                    <!--Parte Button-->
                    <div class="row">
                        <button class="btn btn-outline-success w-100 h-100 mt-3" type="submit" onclick="alert_btn()">
                            Continue
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>


    <!-- Javascript Custom -->
    <script type="text/javascript" src="assets/js/viewPass_login.js"></script>
    <!-- Bootstrap -->
    <script type="text/javascript" src="assets/bootstrap/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/jquery-3.6.0.min.js"></script>
</body>

</html>