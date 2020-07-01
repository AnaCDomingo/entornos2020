<?php
if (isset($_POST["nombre_usuario"])) {
    echo "<meta http-equiv='refresh' content='0'>";
    $nombre = $_POST["nombre_usuario"];
    setcookie("nombre_usuario", $nombre, time() + (60 * 60 * 24));
} else {
    if (isset($_COOKIE["nombre_usuario"])) {
        $nombre = $_COOKIE["nombre_usuario"];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="index.css" media="screen" />
		<title>Ejercicio 3</title>
	</head>
	<body>
    <?php
    if (isset($nombre))  {
        $mensaje = "¡Hola, $nombre!";
    } else {
        $mensaje = "¡Ingresa tu nombre!";
    }
    ?>
        <div class= "formulario">
            <form action="index.php" method="post" id="nombre_usuario">
                <h1><?php echo $mensaje ?></h1>
                <fieldset>
                    <p>
                        <label>
                            <input class="inputName" type="text" name="nombre_usuario" size="50" />
                        </label>
                    </p>
                    <div class="submitContainer">
                        <input class="submit" type="submit" value="Enviar" />
                    </div>
                </fieldset>
            </form>
        </div>
	</body>
</html>