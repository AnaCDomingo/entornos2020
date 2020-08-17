<?php
include('../conexion.php');
$vTipo = $_SESSION['tipo_usuario'];
if ($vTipo != 2) {
    header('Location: ../login/login.php');
}
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
if (empty($queries)) {
    header('Location: ./vacantes-dashboard.php');
} else {
    $vVacID = $queries['id'];
}
$vSql = ("UPDATE vacantes vac SET vac.id_estado = 2 WHERE vac.id_vacante ='$vVacID' ");
$vResultado = mysqli_query($link, $vSql) or die(mysqli_error($link));

header('Location: ./vacantes-dashboard.php');
