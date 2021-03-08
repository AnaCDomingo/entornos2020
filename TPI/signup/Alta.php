<?php
include("../conexion.php");
$vNombre = $_POST['nombre'];
$vApellido = $_POST['apellido'];
$vLegajo = $_POST['legajo'];
$vEmail = $_POST['email'];
$vPass = $_POST['pass'];
$vPassRep = $_POST['pass_rep'];
$vIdestado = 1;
$vTipo = 1;
$vSql = "SELECT Count(dni) as canti FROM usuarios WHERE legajo='$vLegajo' OR email='$vEmail'";
$vResultado = mysqli_query($link, $vSql) or die(mysqli_error($link));
$vCantUsuarios = mysqli_fetch_assoc($vResultado);
if($vPassRep != $vPass){
    echo '<script language="javascript">';
    echo 'alert("Las contraseñas no coinciden");
    window.location.href="./signup.php";
    ';
    echo '</script>';
}
else if ($vCantUsuarios['canti'] != 0) {
    echo '<script language="javascript">';
    echo 'alert("El usuario con ese legajo o email ya existe");
    window.location.href="./signup.php";
    ';
    echo '</script>';
} 

else {
    $vSql = "INSERT INTO usuarios(nombre, apellido, legajo, email,pass,id_estado,id_tipo_usuario) values('$vNombre', '$vApellido', '$vLegajo', '$vEmail', '$vPass', '$vIdestado','$vTipo')";
    mysqli_query($link, $vSql) or die(mysqli_error($link));
    mysqli_free_result($vResultado);
    header('Location: ../login/login.php');
}
mysqli_close($link);
