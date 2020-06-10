<html>

<head>
    <title>Modificación</title>
</head>

<body>
    <?php
    include("conexion.inc");
    $vId = $_POST['id'];
    $vCiudad = $_POST['ciudad'];
    $vPais = $_POST['pais'];
    $vHabitantes = $_POST['habitantes'];
    $vSuperficie = $_POST['superficie'];
    $vTieneMetro = $_POST['tienemetro'];
    $vSql = "UPDATE ciudades set id='$vId', ciudad='$vCiudad', pais='$vPais', habitantes='$vHabitantes', superficie='$vSuperficie', tienemetro='$vTieneMetro' where id='$vId'";
    mysqli_query($link, $vSql) or die(mysqli_error($link));
    echo ("El usuario fue modificado<br>");
    echo ("<a href='Menu.html'>Volver al menu del ABM</a>");
    mysqli_close($link);
    ?>
</body>

</html>