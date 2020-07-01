<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="mostrarDatos.css" media="screen" />
		<title>Ejercicio 5 - Recuperando datos</title>
	</head>
	<body>
        <h1>Los datos que ingresaste fueron:</h1>
        <div class="wrapper">
            <p><?php echo ( "
            <span class='titulo'>Nombre de usuario:</span> ".$_SESSION["nombre"]."</br>
            <span class='titulo'>Clave:</span> ".$_SESSION["clave"]."</br>") ?></p>
        </div>
	</body>
</html>