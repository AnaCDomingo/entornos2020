<?php
session_start();
$vTipo = $_SESSION['tipo_usuario'];
if ($vTipo != 2) {
    header('Location: ../login/login.php');
}

function getList($vOffset)
{
    include('../conexion.php');
    $vSql = ("SELECT  vac.id_vacante as id ,vac.puesto, mat.descripcion as materia, car.descripcion FROM vacantes vac
    INNER JOIN materias mat On mat.id_materia = vac.id_materia INNER JOIN
     carreras car on car.id_carrera = vac.id_carrera
     WHERE vac.id_estado <> 2
      LIMIT 2 OFFSET $vOffset
    
     
    ");
    $vResultado = mysqli_query($link, $vSql);
    if (mysqli_num_rows($vResultado) > 0) {
        return $vResultado;
    } else {
        return 'No se han encontrado vacantes.';
    }

    mysqli_close($link);
}

function getFilteredList($vPal)
{
    setcookie('busca', $vPal);
    include('../conexion.php');
    $vSql = ("SELECT DISTINCT  vac.id_vacante as id ,vac.puesto, mat.descripcion as materia, car.descripcion FROM vacantes vac
    INNER JOIN materias mat On mat.id_materia = vac.id_materia INNER JOIN
     carreras car on car.id_carrera = vac.id_carrera  WHERE vac.puesto LIKE '%" . $vPal . "%' OR mat.descripcion LIKE '%" . $vPal . "%'
      OR car.descripcion LIKE '%" . $vPal . "%'  AND vac.id_estado <> 2
    ");
    $vResultado = mysqli_query($link, $vSql);
    if (mysqli_num_rows($vResultado) > 0) {
        return $vResultado;
    } else {
        return 'No se han encontrado postulaciones.';
    }

    mysqli_close($link);
}
