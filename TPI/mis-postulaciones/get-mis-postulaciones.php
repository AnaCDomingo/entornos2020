<?php
function getList($vOffset,$vIdUser){
    include('../conexion.php');
    $vSql = ("SELECT vac.id_vacante as id ,vac.puesto, mat.descripcion as materia, car.descripcion as carrera, ord.archivo_adjunto 
    FROM vacantes vac INNER JOIN materias mat On mat.id_materia = vac.id_materia 
    INNER JOIN carreras car on car.id_carrera = vac.id_carrera 
    INNER JOIN postulaciones pos On vac.id_vacante = pos.id_vacante 
    INNER JOIN orden_merito ord on ord.id_orden_merito = vac.id_orden_merito
     WHERE vac.id_estado <> 2 AND pos.id_usuario = $vIdUser 
      LIMIT 2 OFFSET $vOffset
    
     
    ");
    $vResultado = mysqli_query($link, $vSql);
    if (mysqli_num_rows($vResultado) > 0) {
        return $vResultado;
    }

        $vSql = ("SELECT vac.id_vacante as id ,vac.puesto, mat.descripcion as materia, car.descripcion as carrera
        FROM vacantes vac INNER JOIN materias mat On mat.id_materia = vac.id_materia 
        INNER JOIN carreras car on car.id_carrera = vac.id_carrera 
        INNER JOIN postulaciones pos On vac.id_vacante = pos.id_vacante 
         WHERE vac.id_estado <> 2 AND pos.id_usuario = $vIdUser 
          LIMIT 2 OFFSET $vOffset
        
         
        ");
        $vResultado = mysqli_query($link, $vSql);
        if (mysqli_num_rows($vResultado) > 0) {
            return $vResultado;
        
    } 
    else {
        return 'No se han encontrado postulaciones.';
    }

    mysqli_close($link);
}