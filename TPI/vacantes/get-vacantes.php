<?php

function getList($vOffset)
{
    include('../conexion.php');
    $vSql = ("SELECT  vac.puesto, mat.descripcion as materia, car.descripcion FROM vacantes vac
    INNER JOIN materias mat On mat.id_materia = vac.id_materia INNER JOIN
     carreras car on car.id_carrera = vac.id_carrera LIMIT 2 OFFSET $vOffset
     
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
    $vSql = ("SELECT DISTINCT  vac.puesto, mat.descripcion as materia, car.descripcion FROM vacantes vac
    INNER JOIN materias mat On mat.id_materia = vac.id_materia INNER JOIN
     carreras car on car.id_carrera = vac.id_carrera      WHERE vac.puesto LIKE '%" . $vPal . "%' OR mat.descripcion LIKE '%" . $vPal . "%'
      OR car.descripcion LIKE '%" . $vPal . "%' 
    ");
    $vResultado = mysqli_query($link, $vSql);
    if (mysqli_num_rows($vResultado) > 0) {
        return $vResultado;
    } else {
        return 'No se han encontrado postulaciones.';
    }

    mysqli_close($link);
}
