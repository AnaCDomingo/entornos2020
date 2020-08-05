<?php


include("../conexion.php");
$vEmail = $_POST['email'];
$vPass = $_POST['pass'];
$vSql = ("SELECT * FROM usuarios WHERE email = '$vEmail' AND pass =  '$vPass' AND id_estado <> 2 ");
$vResultado = mysqli_query($link, $vSql);
if (mysqli_num_rows($vResultado) > 0) {
    session_start();
    $fila = mysqli_fetch_array($vResultado);
    $_SESSION['id_usuario'] = $fila['id_usuario'];
    $_SESSION['nombre'] = $fila['nombre'];
    $_SESSION['tipo_usuario'] = $fila['id_tipo_usuario'];
    setcookie('nombre', $fila['nombre'], time() + (60 * 60 * 24));
    switch ($_SESSION['tipo_usuario']) {
        case 1:
            header('Location: ../dashboard-user/dashboard.php');
            break;
        case 2:
            header('Location: ../dashboard-admin/dashboard-admin.php');
            break;
    }
} else {
    echo '<script language="javascript">';
    echo 'alert("usuario/contraseña incorrectos");
    window.location.href="./login.php";
    ';
    echo '</script>';
}

mysqli_close($link);
