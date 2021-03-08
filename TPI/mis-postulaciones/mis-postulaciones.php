<?php

//Sesiones
session_start();
$userLogged = false;
if (isset($_SESSION['id_usuario'])) {
    $nombre = $_SESSION['nombre'];
    $userLogged = true;
}
//Includes
include_once('./get-mis-postulaciones.php');

    //Tomo los query params para poder realizar el paginado
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
    if (empty($queries)) {
        $misPostulaciones = getList(0,$_SESSION['id_usuario']);
        $vCurrentPage = 1;
    } else {
        $misPostulaciones = getList($queries['offset'],$_SESSION['id_usuario']);
        $vCurrentPage = intval($queries['offset']) / 4 + 1;
    }

$cont = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./mis-postulaciones.css">
    <title>ModUTN</title>
</head>

<body>
    <?php
    if ($userLogged) { ?>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="col-sm-4" style="display: flex; ;align-items:center">
                <img src="../shared/logo.png" width="50" height="50" style="margin-right:10px" alt="logo_UTN" loading="lazy">
                <a class="navbar-brand" href="../dashboard-user/dashboard-user.php">Módulos UTN</a>
            </div>
            <div class="col-sm-4" style="display: flex; justify-content:space-between">
                <a class="navbar-brand" href="../dashboard-user/dashboard-user.php" >Vacantes</a>
                <a class="navbar-brand" href="#" id="currentTab">Mis Postulaciones</a>
            </div>
            <div class="col-sm-4" style="display: flex; justify-content:flex-end;align-items:center">
                <a class="navbar-brand" href="#"><?php echo $nombre ?></a>
                <img src="https://cdn2.iconfinder.com/data/icons/people-80/96/Picture1-512.png" width="50" height="50" alt="person_icon" loading="lazy">
            </div>
        </nav>
    <?php } else { ?>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="col-sm-4" style="display: flex; ;align-items:center">
                <img src="../shared/logo.png" width="50" height="50" style="margin-right:10px" alt="logo_UTN" loading="lazy">
                <a class="navbar-brand" href="#">Módulos UTN</a>
            </div>
            <div class="col-sm-4" style="display: flex; justify-content:space-between">
                <a class="navbar-brand" href="#" id="currentTab">Vacantes</a>
                <a class="navbar-brand" href="../login/login.php">Mis Postulaciones</a>
            </div>
            <div class="col-sm-4" style="display: flex; justify-content:flex-end;align-items:center">
                <a class="navbar-brand" href="../signup/signup.php">Registrarse</a>
                <a class="navbar-brand" href="../login/login.php">Iniciar Sesión</a>
            </div>
        </nav>
    <?php
    }
    ?>
        <div>
            <!-- logica de tarjetas (funcional y cliente) -->
            <div class="cardsContainer">
                <?php
                if (is_string($misPostulaciones)) {
                    echo '<h3 class="not-found-message">' . $misPostulaciones . '</h3>';
                } else {
                    while ($row = mysqli_fetch_array($misPostulaciones)) {
                        $cont++;
                        if ($cont % 2 != 0 || $cont == 1) {
                            echo "<div class='row'>";
                        };
                        echo "<div class='card' style='width: 28vw; height:25vh;margin:16px;box-shadow: 5px 2px #cccccc6e'>
                            <div class='card-body'>
                                <h4 class='card-title'>{$row['materia']}</h4>
                                <h5 class='card-subtitle mb-2 text-muted'>{$row['carrera']}</h5>
                                <h5 class='card-subtitle mb-2 text-muted'>{$row['puesto']}</h5>
                                <div class = 'buttonContainer'>";
                                
                                if(isset($row['archivo_adjunto'])){
                                 echo "<a target='_blank' href='../ordenes-merito/{$row['archivo_adjunto']}'
                                 class='btn btn-primary'>Descargar orden de mérito</a>";
                                }
                                else{
                                    echo "<button class='btn' disabled>Orden de mérito aún no disponible</button>";
                                }
                                echo "
                                </div>
                            </div>
                        </div>
                        ";
                        

                        if ($cont % 2 == 0 || $cont == mysqli_num_rows($misPostulaciones))
                            echo "</div>";
                    }
                    mysqli_free_result($misPostulaciones);
                }

                ?>
            </div>
            <!-- paginación -->
            <nav class="paginationBottom" aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="mis-postulaciones.php?<?php $vPreviousPage = ($vCurrentPage - 2) * 4;
                                                                        if($vPreviousPage<0)
                                                                        $vPreviousPage = 0;
                                                                        echo "offset=$vPreviousPage"; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="mis-postulaciones.php">1</a></li>
                    <li class="page-item"><a class="page-link" href="mis-postulaciones.php?<?php echo "offset=4" ?>">2</a></li>
                    <li class="page-item"><a class="page-link" href="mis-postulaciones.php?<?php echo "offset=8" ?>">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="mis-postulaciones.php?<?php $vNextPage = ($vCurrentPage) * 4;;
                                                                        echo "offset=$vNextPage"; ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</body>

</html>