<?php
include("../conexion.php");
$queries = array();
session_start();
parse_str($_SERVER['QUERY_STRING'], $queries);
/*if (empty($queries)) {
    header('Location: ../dashboard-user/dashboard.php');
    } else {*/
    $vVacID = $queries['id'];
    $vVacMat = $queries['mat'];
    $vVacPuesto = $queries['pue'];
//}
$vIDUser = $_SESSION['id_usuario'];

if(isset(($_POST['saveNewPostuButton']))) {
    //subida archivo
    //defino tamaño maximo archivo
    //include_once('./update-vacante-merito.php');
    /*if (empty($queries)) {
        header('Location : "../dashboard-user/dashboard-user.php"');
    } else {
        $vVacID = $queries['id'];
        $vVacMat = $queries['mat'];
        $vVacPuesto = $queries['pue'];
    }*/
    $vBasename = $vVacID . '-' . $vVacMat . '-' . $vVacPuesto . '.pdf';
    $targetfolder = "../pdf-local";
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

            echo "The file " . basename($_FILES['postu']['tmp_name']) . " is uploaded";
            $vSql = ("INSERT INTO postulaciones(archivo_adjunto) VALUES ('$vBasename')");
            $vResultado = mysqli_query($link, $vSql) or die('se produjo un error');
            //$vResultado2 = getOrdId($vBasename);
            //$row = mysqli_fetch_array($vResultado2);
            //echo $row['id_orden_merito'];
            //updateVacantesMerito($row['id_orden_merito'], $vVacID);
        } else {

            echo "se produjo un error cargando el archivo";
        }
    }
  /*  //inserto una nueva postulacion
    $vSql = "INSERT INTO postulaciones ( id_vacante,id_usuario,archivo_adjunto)
    values('$vVacID','$vIDUser','asdasdasd')";
    mysqli_query($link, $vSql) or die(mysqli_error($link));
    echo '<script language="javascript">';
    echo 'alert("La postulacion fue registrada correctamente");
    window.location.href="../dashboard-user/dashboard-user.php";
    ';
    echo '</script>';*/
}
?>