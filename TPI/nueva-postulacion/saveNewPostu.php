<?php
include("../conexion.php");
session_start();
$nameUser = $_SESSION['nombre'];
$vIDUser = $_SESSION['id_usuario'];
//subida pdf
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
if (empty($queries)) {
    echo 'no hay querys';
} else {
    $vVacID = $queries['id'];
    $vVacMat = $queries['mat'];
    $vVacPuesto = $queries['pue'];
}
$vBasename = $vVacID . '-' . $vVacMat . '-' . $vVacPuesto . '.pdf';
$targetfolder = "../postulaciones/";
$targetfolder = $targetfolder . basename($vBasename);
$fileType = strtolower(pathinfo($targetfolder, PATHINFO_EXTENSION));
$uploadOK = true;
if ($_FILES["postu"]["size"] > 5000000) {

    echo '<script language="javascript">';
    echo 'alert("El tamaño del archivo es superior a 5mb");
    window.location.href="./nuevaPostulacion.php";
    ';
    echo '</script>';
    $uploadOK = false;
}

if ($uploadOK == true) {
    if (move_uploaded_file($_FILES['postu']['tmp_name'], $targetfolder)) {
        //inserto una nueva postulacion
        $vSql = "INSERT INTO postulaciones ( id_vacante,id_usuario,archivo_adjunto)
        values('$vVacID','$vIDUser','$vBasename')";
        mysqli_query($link, $vSql) or die(mysqli_error($link));
        echo '<script language="javascript">';
        echo 'alert("La postulacion fue registrada correctamente");
        window.location.href="../dashboard-user/dashboard-user.php";
        ';
        echo '</script>';
    } else {
        echo '<script language="javascript">';
        echo 'alert("Hubo un problema subiendo el archivo, intentelo nuevamente");
        window.location.href="./nuevaPostulacion.phpphp";
        ';
        echo '</script>';
    }
}
