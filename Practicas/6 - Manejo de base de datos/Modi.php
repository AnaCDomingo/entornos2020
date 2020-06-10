<html>
    <head>
        <title>Modificación</title>
    </head>
    <body>
        <?php
        include("conexion.inc");
        $vId=$_POST['Id'];
        $vCiudad=$_POST['Ciudad'];
        $vPais=$_POST['Pais'];
        $vHabitantes=$_POST['Habitantes'];
        $vSuperficie=$_POST['Superficie'];
        $vTieneMetro=$_POST['tieneMetro'];
        $vSql="UPDATE ciudades set id='$vId', ciudad='$vCiudad', pais='$vPais', habitantes='$vHabitantes', superficie='$vSuperficie', tieneMetro='$vTieneMetro' where id='$vId'";
        mysqli_query($link, $vSql) or die (mysqli_error($link));
        echo("El usuario fue modificado<br>");
        echo("<a href='Menu.html'>Volver al menú del ABM</a>");
        mysqli_close($link);
        ?>
    </body>
</html>