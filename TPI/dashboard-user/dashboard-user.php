<?php

//Sesiones
session_start();
$esta_logueado = false;
if (isset($_SESSION['id_usuario'])) {
    $nombre = $_SESSION['nombre'];
    $esta_logueado = true;
}
//Includes
include_once('get-vacantes-user.php');
//Si viene del filtrado
if (isset($_POST['palabra']) && !empty($_POST['palabra'])) {
    $vacantes = getFilteredList($_POST['palabra']);
} else {
    //Tomo los query params para poder realizar el paginado
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
    if (empty($queries)) {
        $vacantes = getList(0);
        $currentPage = 1;
    } else {
        $vacantes = getList($queries['offset']);
        $currentPage = intval($queries['offset']) / 4 + 1;
    }
}
$cont = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./dashboard-user.css">
    <title>ModUTN</title>
</head>

<body>
    <?php
    if ($esta_logueado) { ?>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="col-sm-4" style="display: flex; ;align-items:center">
                <img src="../shared/logo.png" width="50" height="50" style="margin-right:10px" alt="logo_UTN" loading="lazy">
                <a class="navbar-brand" href="#">Módulos UTN</a>
            </div>
            <div class="col-sm-4" style="display: flex; justify-content:space-between">
                <a class="navbar-brand" href="#" id="currentTab">Vacantes</a>
                <a class="navbar-brand" href="">Mis Postulaciones</a>
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
    <div class="container-fluid">
        <div class="col" id="leftColumn">
            <div class="filter">
                <div class="row">
                    <h5 id="searchText">Buscar</h5>
                </div>
                <div class="row">
                    <form action="dashboard-user.php" method="POST" name="busqueda">
                        <input type="text" class="form-control" name="palabra" />
                        <div class="buttonsRow">
                            <button type="submit" id="searchButton" class="btn btn-primary">Buscar</button>
                            <?php if (isset($_POST['palabra']) && !empty($_POST['palabra'])) {
                            ?>
                                <form action="dashboard-user.php">
                                    <button type="submit" id="goBackButton" class="btn btn-primary">Volver</button>
                                </form>
                            <?php
                            }
                            ?>
                        </div>

                    </form>
                </div>

            </div>
        </div>
        <div class="col-8" id="centerColumn">
            <!-- logica de tarjetas (funcional y cliente) -->
            <div class="cardsContainer" style="max-width:80vw;">
                <?php
                if (is_string($vacantes)) {
                    echo '<h3 class="not-found-message">' . $vacantes . '</h3>';
                } else {
                    while ($row = mysqli_fetch_array($vacantes)) {
                        $cont++;
                        if ($cont % 2 != 0 || $cont == 1) {
                            echo "<div class='row'>";
                        };
                        echo "<div class='card' style='width: 28vw; height:25vh;margin:16px;'>
                            <div class='card-body'>
                                <h4 class='card-title'>{$row['materia']}</h4>
                                <h5 class='card-subtitle mb-2 text-muted'>{$row['carrera']}</h5>
                                <h5 class='card-subtitle mb-2 text-muted'>{$row['puesto']}</h5>
                                <div class = 'buttonContainer'>
                                    <a href='../nueva-postulacion/nuevaPostulacion.php?id={$row['id_vacante']}&pue={$row['puesto']}
                                    &mat={$row['materia']}' class='btn btn-primary'>Postularse</a>
                                </div>
                            </div>
                        </div>
                        ";

                        if ($cont % 2 == 0 || $cont == mysqli_num_rows($vacantes))
                            echo "</div>";
                    }
                    mysqli_free_result($vacantes);
                }

                ?>
            </div>
            <!-- paginación -->
            <nav class="paginationBottom" aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="dashboard-user.php?<?php $vPreviousPage = ($vCurrentPage - 2) * 4;
                                                                        echo "offset=$vPreviousPage"; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="dashboard-user.php">1</a></li>
                    <li class="page-item"><a class="page-link" href="dashboard-user.php?<?php echo "offset=4" ?>">2</a></li>
                    <li class="page-item"><a class="page-link" href="dashboard-user.php?<?php echo "offset=8" ?>">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="dashboard-user.php?<?php $vNextPage = ($vCurrentPage) * 4;;
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