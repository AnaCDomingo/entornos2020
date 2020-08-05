<?php
include("../conexion.php");
//borrar cuenta
session_start()
if (isset($_SESSION['id_usuario'])) {
    $userId = $_SESSION['id_usuario'];
//cambiar id estado
$vSql=("UPDATE usuarios SET id_estado = 2 WHERE id_usuario ='$userId' ");
$vResultado = mysqli_query($link, $vSql);
//cambiar campos

?>
