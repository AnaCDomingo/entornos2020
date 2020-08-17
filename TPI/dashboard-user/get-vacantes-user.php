<?php
function getList($offSet)
{

    include("../conexion.php");
    $sql = ("SELECT v.id_vacante, m.descripcion as materia, c.descripcion as carrera, v.puesto, v.fecha_cierre FROM vacantes v, carreras c, materias m
    WHERE v.id_materia = m.id_materia AND  v.id_carrera = m.id_carrera AND c.id_carrera = m.id_carrera AND
    fecha_cierre >= CURDATE() AND v.id_estado <> 2
    LIMIT 4 OFFSET $offSet");
    $resultado = mysqli_query($link, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        return $resultado;
    } else {
        return 'No se han encontrado vacantes activas.';
    }

    mysqli_close($link);
}
function getFilteredList($pal)
{
    setcookie('busca', $pal);
    include('../conexion.php');
    $sql = ("SELECT v.id_vacante, m.descripcion as materia, c.descripcion as carrera, v.puesto, v.fecha_cierre FROM vacantes v, carreras c, materias m   
    WHERE v.id_materia = m.id_materia AND  v.id_carrera = m.id_carrera AND c.id_carrera = m.id_carrera AND
    fecha_cierre >= CURDATE() AND v.id_estado <> 2 AND
    (m.descripcion LIKE '%" . $pal . "%' OR c.descripcion LIKE '%" . $pal . "%'
    OR puesto LIKE '%" . $pal . "%' )
    ");
    $resultado = mysqli_query($link, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        return $resultado;
    } else {
        return 'No se han encontrado vacantes con los criterios de búsqueda ingresados.';
    }

    mysqli_close($link);
}

