<?php
    if ( isset( $_COOKIE[ 'contador' ] ) ) {
    setcookie( 'contador', $_COOKIE[ 'contador' ] + 1, time() + 3600 * 24 );
    $mensaje = 'Numero de visitas: '.$_COOKIE[ 'contador' ];
    }
else {
    setcookie( 'contador', 1, time() + 3600 * 24 );
    $mensaje = 'Bienvenido por primera vez a nuesta web';
}

?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador con Cookies</title>
</head>

<style>
#mostrar{
    color: black;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 160%;
    padding: 300px;
    text-align: center

}

</style>
<body>
    <h2 id="mostrar">
        <?php echo $mensaje;?>
    </h2>
</body>
</html>