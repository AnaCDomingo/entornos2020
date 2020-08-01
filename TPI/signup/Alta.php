<?php
include("../conexion.php");
$vNombre = $_POST['nombre'];
$vApellido = $_POST['apellido'];
$vDni = $_POST['dni'];
$vEmail = $_POST['email'];
$vPass = $_POST['pass'];
$vIdestado = 1;
$vTipo = 1;
$vSql = "SELECT Count(dni) as canti FROM usuarios WHERE dni='$vDni'";
$vResultado = mysqli_query($link, $vSql) or die(mysqli_error($link));
$vCantUsuarios = mysqli_fetch_assoc($vResultado);
if ($vCantUsuarios['canti'] != 0) {
    echo '<script language="javascript">';
    echo 'alert("El usuario con ese DNI ya existe");
    window.location.href="./signup.php";
    ';
    echo '</script>';
} else {
    $vSql = "INSERT INTO usuarios(nombre, apellido, dni, email,pass,id_estado,id_tipo_usuario) values('$vNombre', '$vApellido', '$vDni', '$vEmail', '$vPass', '$vIdestado','$vTipo')";
    mysqli_query($link, $vSql) or die(mysqli_error($link));
    mysqli_free_result($vResultado);
    header('Location: ../login/login.php');
}
mysqli_close($link);
