<?php
include("../conexion.php");
session_start();
$vIDUser = $_SESSION['id_usuario'];
if(isset(($_POST['saveNewPostuButton']))) {
    //inserto una nueva postulacion
    $vSql = "INSERT INTO postulaciones(id_vacante,id_usuario)
    values('$vVacID', '$vIDUser')";
    mysqli_query($link, $vSql) or die(mysqli_error($link));
    mysqli_free_result($vResultado);
}
?>
