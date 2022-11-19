<?php 
@session_start();
require_once('conexao.php');

$email = $_POST['email'];
$senha = $_POST['senha'];

$query = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email and senha = :senha ");
$query->bindValue(":email", "$email");
$query->bindValue(":senha", "$senha");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($result);

if ($total_reg >0) {
    $nivel = $result[0]['nivel'];

    //VARIABLES DE SESSÃO
    $_SESSION['nivel_usuario'] = $result[0]['nivel'];
    $_SESSION['id_usuario'] = $result[0]['id'];
    $_SESSION['nome_usuario'] = $result[0]['nome'];

    if ($nivel == 'Admin') {
        echo "<script>window.location='../view/pages/adm/index.php'</script>";
    }
}else {
    echo "<script>window.alert('Dados Incorretos!')</script>";
    echo "<script>window.location='../public/index.php'</script>";    
}


?>