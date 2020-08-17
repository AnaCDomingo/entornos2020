<?php

function getMaterias()
{
    include('../conexion.php');
    $vSql = ("SELECT mat.descripcion as materia, mat.id_materia  FROM materias mat WHERE id_estado <>2");
    $vResultado = mysqli_query($link, $vSql);
    return $vResultado;
}

function getCarreras()
{
    include('../conexion.php');
    $vSql = ("SELECT car.descripcion as carrera, car.id_carrera  FROM carreras car");
    $vResultado = mysqli_query($link, $vSql);
    return $vResultado;
}
