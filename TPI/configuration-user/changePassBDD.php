<?php
include("../conexion.php");
session_start();
if (isset($_SESSION['id_usuario'])) {
    $userId = $_SESSION['id_usuario'];
    $vPass = $_POST['currentPass'];
    $nPass=$_POST['newPass'];
    $vSql=("UPDATE usuarios SET pass = $nPass WHERE id_usuario ='$userId' AND pass = '$vPass' ");
    $vResultado = mysqli_query($link, $vSql) or die(mysqli_error($link));
};
header('Location: ../dashboard-user/dashboard.php');
?>