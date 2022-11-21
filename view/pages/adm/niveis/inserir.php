<?php 
require_once("../../../../int/conexao.php");
$nivel = $_POST['nivel'];
$id = @$_POST['id'];

//VALIDAR CAMPO
$query = $pdo->query("SELECT * from niveis where nivel = '$nivel'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
$id_reg = @$res[0]['id'];
if($total_reg > 0 and $id_reg != $id){
	echo 'Este Nivel já está cadastrado.';
	exit();
}

$query = $pdo->prepare("INSERT INTO niveis set nivel = :nivel");
$query->bindValue(":nivel", "$nivel");
$query->execute();

echo 'Salvo com Sucesso!';


?>