<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./index.css" media="screen" rel="stylesheet" type="text/css" />
    <title>Ejercicio 1</title>
</head>

<body>
    <div>
        <p>Click para enviar mail</p>
        <button class="submit" onclick="document.write('<?php send_mail() ?>')">Enviar</button>
        <?php
        function send_mail()
        {
            $destinatario = "gabrielgolzman@gmail.com ";
            $asunto = "Prueba";
            $cuerpo = "Esto es una prueba de envío de correo para el ejercicio 1 de la práctica 5 a través del servidor";
            mail($destinatario, $asunto, $cuerpo);
        }
        ?>
    </div>
</body>

</html>