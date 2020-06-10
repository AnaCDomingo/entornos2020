<html>

<head>
    <title>Baja</title>
</head>

<body>
    <?php
    include("conexion.inc");
    $vId = $_POST['id'];
    $vSql = "SELECT * FROM ciudades WHERE id='$vId'";
    $vResultado = mysqli_query($link, $vSql);
    if (mysqli_num_rows($vResultado) == 0) {
        echo ("Usuario inexistente...!!!<br>");
        echo ("<a href='FormBajaIni.html'>Continuar</a>");
    } else {
        $vSql = "DELETE FROM ciudades WHERE id='$vId'";
        mysqli_query($link, $vSql);
        echo ("El usuario fue borrado<br>");
        echo ("<a href='Menu.html'>Volver al Menú del ABM<");
    }
    mysqli_free_result($vResultado);
    mysqli_close($link);
    ?>
</body>

</html>