<?php

function getOrdId($vOrdenMer)
{
    include('../conexion.php');

    $vSql = ("SELECT ord.id_orden_merito FROM orden_merito ord WHERE ord.archivo_adjunto = '$vOrdenMer'");
    $vResultado = mysqli_query($link, $vSql);
    return $vResultado;
}

function updateVacantesMerito($vIdOrd, $vVacId)
{
    echo $vIdOrd . $vVacId;
    include('../conexion.php');
    $vSql = ("UPDATE vacantes SET id_orden_merito = $vIdOrd WHERE id_vacante = $vVacId");
    mysqli_query($link, $vSql);
}
