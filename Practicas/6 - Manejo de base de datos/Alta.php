<html>
    <head>
        <title>Alta Usuario</title>
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
        $vSql="SELECT Count(id) as canti FROM ciudades WHERE id='$vId'";
        $vResultado=mysqli_query($link, $vSql) or die (mysqli_error($link));
        $vCantCiudades=mysqli_fetch_assoc($vResultado);
        $vCantCiudades=mysqli_result($vResultado, 0);
        if($vCantCiudades['canti']!=0){
            echo("La ciudad ya existe<br>");
            echo("<a href='Menu.html'>VOLVER AL ABM</a>");
        }
        else{
            $vSql="INSERT INTO ciudades(id, ciudad, pais, habitantes, superficie, tieneMetro) values('$vId', '$vCiudad', '$vPais', '$vHabitantes', '$vSuperficie', '$vTieneMetro')";
            mysqli_query($link, $vSql) or die (mysqli_error($link));
            echo("La ciudad fue registrada, pronto reciirás un email confirmándose la actualización a nuestra página<br>");
            echo("<a href='Menu.html'>VOLVER AL MENÚ</a>");
            mysqli_free_result($vResultado);
        }
        mysqli_close($link);
        ?>
    </body>
</html>