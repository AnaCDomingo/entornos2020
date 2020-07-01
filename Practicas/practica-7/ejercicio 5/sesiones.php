<?php
session_start();
$_SESSION["nombre"] = $_POST["nombre_usuario"];
$_SESSION["clave"] = $_POST["clave_usuario"];
?>
<?php
    header('Location: mostrarDatos.php' );
?>