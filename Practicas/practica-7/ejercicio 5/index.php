<?php 
    if (isset($_SESSION)) {
        session_destroy();
    }
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="index.css" media="screen" />
		<title>Ejercicio 5</title>
	</head>
	<body>
        <div class= "formulario">
            <form action="sesiones.php" method="post">
                <h1>¡Bienvenido!</h1>
                <fieldset>
                    <p>
                        <label>
                            Nombre de usuario
                            <input class="inputUsuario" type="text" name="nombre_usuario" size="50" />
                        </label>
                    </p>
                    <p>
                        <label>
                            Contraseña
                            <input class="inputClave" type="password" name="clave_usuario" size="50" />
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