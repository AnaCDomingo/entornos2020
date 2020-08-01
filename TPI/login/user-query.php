<?php
include("../conexion.php");
$vEmail = $_POST['email'];
$vPass = $_POST['pass'];
$vSql = ("SELECT * FROM usuarios WHERE email = '$vEmail' AND pass =  '$vPass' AND id_estado <> 2 ");
$vResultado = mysqli_query($link, $vSql);
if (mysqli_num_rows($vResultado) > 0) {
    header('Location: ../template/template.php');
} else {
    echo '<script language="javascript">';
    echo 'alert("usuario/contraseña incorrectos");
    window.location.href="./login.php";
    ';
    echo '</script>';
}

mysqli_close($link);
