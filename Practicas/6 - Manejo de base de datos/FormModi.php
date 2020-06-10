<html>
    <head>
        <title>Modificación</title>
    </head>
    <body>
        <?php
        include("conexion.inc");
        $vId=$_POST['Id'];
        $vSql="SELECT * FROM ciudades WHERE id='$vId'";
        $vResultado=mysql_query($link, $vSql) or die (mysqli_error($link));
        $fila=mysqli_fetch_array($vResultado);
        if(mysqli_num_rows($vResultado)==0){
            echo("Usuario inexistente...!!!<br>");
            echo("<a href='FormModiIni.html'>Continuar</a>");
        }
        else{
        ?>
            <form action='Modi.php' method="POST" name="FormModi">
                <table width="356">
                    <tr>
                        <td width="103">Id:</td>
                        <td width="243"><input type="number" name="id" step="0" value="<?php echo($fila['id']); ?>"></td>
                    </tr>
                    <tr>
                        <td width="103">Ciudad:</td>
                        <td width0="243"><input type="text" name="ciudad" size="20" maxlength="40" value="<?php echo($fila['ciudad']); ?>">
                    </tr>
                    <tr>
                        <td width="103">País:</td>
                        <td width0="243"><input type="text" name="pais" size="20" maxlength="40" value="<?php echo($fila['pais']); ?>">
                    </tr>
                    <tr>
                        <td width="103">Habitantes:</td>
                        <td width="243"><input type="number" name="habitantes" step="0" value="<?php echo($fila['habitantes']); ?>"></td>
                    </tr>
                    <tr>
                        <td width="103">Superficie:</td>
                        <td width="243"><input type="number" name="Superficie" step="any" value="<? echo($fila['superficie']); ?>"></td>
                    </tr>
                    <tr>
                        <td width="103">tieneMetro:</td>
                        <td width="243"><input type="number" name="tieneMetro" min="0" max="1" value="<? echo($fila['tieneMetro']); ?>"></td>
                    </tr>
                </table>
            </form>   
        <?php
        }
        mysqli_free_result($vResultado);
        mysqli_close($link);
        ?>
    </body>
</html>