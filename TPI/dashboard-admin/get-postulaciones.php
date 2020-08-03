<?php

function getList()
{
    include('../conexion.php');
    $vSql = ("SELECT usu.nombre, usu.apellido, mat.descripcion FROM postulaciones pos INNER JOIN vacantes vac On pos.id_vacante = pos.id_vacante INNER JOIN materias mat on mat.id_materia = vac.id_materia INNER JOIN usuarios usu on usu.id_usuario = pos.id_usuario
    ");
    $vResultado = mysqli_query($link, $vSql);
    if (mysqli_num_rows($vResultado) > 0) {
        return $vResultado;
    } else {
        return 'No se han encontrado postulaciones activas.';
    }

    mysqli_close($link);
}
