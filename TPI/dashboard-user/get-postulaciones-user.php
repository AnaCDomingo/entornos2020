<?php
function getList()
{

    include("../conexion.php");
    $id_usuario = $_SESSION['id_usuario'];
    $sql = ("SELECT * FROM postulaciones LEFT JOIN vacantes ON postulaciones.id_vacante = vacantes.id_vacante
        WHERE id_usuario = $id_usuario AND fecha_cierre >= CURDATE() AND vacantes.id_estado <> 2 ");
    $resultado = mysqli_query($link, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        return $resultado;
    } else {
        return 'No se han encontrado postulaciones activas.';
    }

    mysqli_close($link);
}
