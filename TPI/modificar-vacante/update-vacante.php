<?php
include('../conexion.php');
parse_str($_SERVER['QUERY_STRING'], $queries);
if (empty($queries)) {
    header('Location: ../vacantes/vacantes-dashboard.php');
} else {
    $vVacID = $queries['id'];
}
$vMatID = $_POST['materias'];
$vCarID = $_POST['carreras'];
$vPuesto = $_POST['puesto'];
$vFechaCierre = $_POST['fecha_cierre'];
$vRequisitos = $_POST['requisitos'];
$vSql = ("UPDATE vacantes SET id_carrera = $vCarID, id_materia = $vMatID, puesto = '$vPuesto',
fecha_cierre = '$vFechaCierre', requisitos_descripcion = '$vRequisitos' WHERE id_vacante = $vVacID
 ");
$vResultado = mysqli_query($link, $vSql) or die('se produjo un error');

header('Location: ../vacantes/vacantes-dashboard.php');
