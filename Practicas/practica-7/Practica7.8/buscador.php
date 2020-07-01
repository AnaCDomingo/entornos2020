<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1-transitional.dtd">
<html xmlns="httl://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Buscador de canciones</title>
</head>

<body>
    <?php
    include("conexion.inc");
    $pal = $_POST['Palabra'];
    if ($pal) {
        $resp = mysqli_query($link, "SELECT * FROM buscador WHERE canciones LIKE '%" . $pal . "%'") or die('Se produjo un error dentro de la busqueda');
        if (mysqli_num_rows($resp) == "0") {
            echo "No hay resultados respecto a la palabra que busca.";
        } else {
            echo "<center><strong>RESULTADOS DE LA BÚSQUEDA</strong></center><br>";
            while ($cat = mysqli_fetch_array($resp)) { ?>
                <td><?php echo ($cat['canciones']); ?></td>
                <tr>
                    <td colspan="5">
            <?php   }
        }
    } else {
        echo "<form name='FormBuscador' method='post' action=''><input name='Palabra type='text' id='Palabra'><input type='submit' value='Buscar!'></form>";
    } ?>
</body>

</html>