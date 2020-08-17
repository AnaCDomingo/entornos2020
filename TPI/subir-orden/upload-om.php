<?php

include('../conexion.php');
include_once('./update-vacante-merito.php');
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
if (empty($queries)) {
    header('Location : "./vacante-dashboard.php"');
} else {
    $vVacID = $queries['id'];
    $vVacMat = $queries['mat'];
    $vVacPuesto = $queries['pue'];
}
$vCurrentDate =  date("d-m-Y");
$vBasename = $vVacID . '-' . $vVacMat . '-' . $vVacPuesto . '-' . $vCurrentDate . '.pdf';
$targetfolder = "../ordenes-merito/";
$targetfolder = $targetfolder . basename($vBasename);
$fileType = strtolower(pathinfo($targetfolder, PATHINFO_EXTENSION));
$uploadOK = true;
if ($_FILES["omUpload"]["size"] > 500000) {

    echo '<script language="javascript">';
    echo 'alert("El tamaño del archivo es superior a 5mb");
    window.location.href="./subir-orden.php";
    ';
    echo '</script>';
    $uploadOK = false;
}

if ($uploadOK == true) {
    if (move_uploaded_file($_FILES['omUpload']['tmp_name'], $targetfolder)) {

        echo "The file " . basename($_FILES['omUpload']['tmp_name']) . " is uploaded";
        $vSql = ("INSERT INTO orden_merito(archivo_adjunto) VALUES ('$vBasename')");
        $vResultado = mysqli_query($link, $vSql) or die('se produjo un error');
        $vResultado2 = getOrdId($vBasename);
        $row = mysqli_fetch_array($vResultado2);
        echo $row['id_orden_merito'];
        updateVacantesMerito($row['id_orden_merito'], $vVacID);
    } else {

        echo "Problem uploading file";
    }
}
