<?php
include("../conexion.php");
$vEmail = $_POST['email'];
$vPass = $_POST['pass'];

$vSql = ("SELECT * FROM usuarios WHERE email = '$vEmail' AND pass =  '$vPass' ");
$vResultado = mysqli_query($link, $vSql);
echo "Returned rows are: " . $vEmail . $vPass;

if (mysqli_num_rows($vResultado) > 0) {
    header('Location: ../template/template.php');
} else {
    echo ('<b>NO ENTRO</b>');
}

mysqli_close($link);
