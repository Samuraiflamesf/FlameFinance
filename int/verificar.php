<?php 
@session_start();


if (@$_SESSION['nivel_usuario'] != 'Admin') {
    echo "<script>window.location='../index.php'</script>";
}
?>