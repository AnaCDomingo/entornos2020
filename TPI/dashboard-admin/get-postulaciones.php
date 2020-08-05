<?php

function getList($vOffset)
{
    include('../conexion.php');
    $vSql = ("SELECT DISTINCT usu.nombre, usu.apellido, mat.descripcion FROM postulaciones pos 
    INNER JOIN vacantes vac On pos.id_vacante = pos.id_vacante INNER JOIN
     materias mat on mat.id_materia = vac.id_materia INNER JOIN usuarios usu on usu.id_usuario = pos.id_usuario
     LIMIT 4 OFFSET $vOffset
     
    ");
    $vResultado = mysqli_query($link, $vSql);
    if (mysqli_num_rows($vResultado) > 0) {
        return $vResultado;
    } else {
        return 'No se han encontrado postulaciones.';
    }

    mysqli_close($link);
}

function getFilteredList($vPal)
{
    setcookie('busca', $vPal);
    include('../conexion.php');
    $vSql = ("SELECT DISTINCT usu.nombre, usu.apellido, mat.descripcion FROM postulaciones pos 
    INNER JOIN vacantes vac On pos.id_vacante = pos.id_vacante INNER JOIN
     materias mat on mat.id_materia = vac.id_materia INNER JOIN usuarios usu on usu.id_usuario = pos.id_usuario 
      WHERE usu.nombre LIKE '%" . $vPal . "%' OR usu.apellido LIKE '%" . $vPal . "%'
      OR mat.descripcion LIKE '%" . $vPal . "%' 
    ");
    $vResultado = mysqli_query($link, $vSql);
    if (mysqli_num_rows($vResultado) > 0) {
        return $vResultado;
    } else {
        return 'No se han encontrado postulaciones activas.';
    }

    mysqli_close($link);
}
