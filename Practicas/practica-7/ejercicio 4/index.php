<?php
if (isset($_POST["tipo_noticia"])) {
    echo "<meta http-equiv='refresh' content='0'>";
    $tipo_noticia = $_POST["tipo_noticia"];
    setcookie("tipo_noticia", $tipo_noticia, time() + (60 * 60 * 24));
} else {
    if (isset($_COOKIE["tipo_noticia"])) {
        $tipo_noticia = $_COOKIE["tipo_noticia"];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="index.css" media="screen" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>

<body>
    <?php if (isset($_COOKIE["tipo_noticia"])) {
        echo "<h1>Noticias ", $tipo_noticia, "</h1>";
        echo "<a href='borrar_cookie.php'> Borrar cookie</a>";
    } else { ?>
        <h1>Noticias</h1>
        <div class="formulario">
            <p>Seleccione que tipo de noticias son de su preferencia</p>
            <br />
            <form action="index.php" method="post" id="tipo_noticia">
                <input type="radio" name="tipo_noticia" value="economicas" id="economicas" /><label> Noticias económicas</label>
                <input type="radio" name="tipo_noticia" value="politicas" id="politicas" /><label> Noticias políticas</label>
                <input type="radio" name="tipo_noticia" value="deportivas" id="deportivas" /><label> Noticias deportivas</label>
                <br />
                <br />
                <div class="submit">
                    <input type="submit" value="Aceptar" />
                </div>
            </form>

        </div>
    <?php }; ?>

</body>

</html>