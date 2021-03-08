<?php

use function PHPSTORM_META\type;

session_start();
    $nombre = $_SESSION['nombre'];
    include_once('get-postulaciones-user.php');
   /* include_once('pop'); */
    $postulaciones = getList();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./dashboard.css">
    <title>ModUTN</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="col-sm-4" style="display: flex; ;align-items:center">
            <img src="../shared/logo.png" width="50" height="50" style="margin-right:10px" alt="logo_UTN" loading="lazy">
            <a class="navbar-brand" href="#">Módulos UTN</a>
        </div>
        <div class="col-sm-4" style="display: flex; justify-content:space-between">
            <a class="navbar-brand" href="dashboard.php" id="currentTab">Postulaciones</a>
            <a class="navbar-brand" href="#" 1>Vacantes</a>

        </div>
        <div class="col-sm-4" style="display: flex; justify-content:flex-end;align-items:center">
            <a class="navbar-brand" href="../configuration-user/configuration-u.php"><?php echo $nombre ?></a>
            <img src="https://cdn2.iconfinder.com/data/icons/people-80/96/Picture1-512.png" width="50" height="50" alt="person_icon" loading="lazy">
        </div>
    </nav>
    <div class="container-fluid">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
            <div class="container">
                <h2>Mis postulaciones</h2>
                <hr>
                <div class="container-fluid">
                    <div class="col-xs-2">
                    </div>
                    <div class="col-xs-10">
                        <?php 
                            if (is_string($postulaciones)) {
                                echo '<h3>'.$postulaciones.'</h3>';
                            } else {
                                $cantidad = mysqli_num_rows($postulaciones);
                                $cantidad = 23;
                                if ($cantidad > 4) {
                                    $paginado = True;
                                    $paginas_totales = (int)($cantidad / 4);
                                    if (fmod($cantidad,4) != 0)  {
                                        $paginas_totales ++;
                                    }
                                } else {
                                    $paginas_totales = 1;
                                }
                            }
                        ?>
                        <div class="col-xs-5"></div>
                        <div class="col-xs-5"></div>
                    </div>
                    <div class="row" id="buttonsRow">
                        <a id="goBackButton" onclick="document.location.href='../login/login.php'" class="btn btn-danger">Volver</a>
                        <button type="submit" class="btn btn-primary"> Registrarse</button>
                    </div>
                </div>
        </div>
    </div>
    <div class="col-xs-2"></div>
    </div>
</body>

</html>