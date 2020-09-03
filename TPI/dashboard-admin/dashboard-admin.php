<?php
include_once('./get-postulaciones.php');
session_start();
$vTipo = $_SESSION['tipo_usuario'];
if ($vTipo != 2) {
    header('Location: ../login/login.php');
}
//Lógica de sesiones
$vNombre = $_SESSION['nombre'];
//Lógica del filtrado
if (isset($_POST['palabra']) && !empty($_POST['palabra'])) {
    $vPostulaciones = getFilteredList($_POST['palabra']);
} else {
    //Tomo los query params para poder realizar el paginado
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
    if (empty($queries)) {
        $vPostulaciones = getList(0);
        $vCurrentPage = 1;
    } else {
        $vPostulaciones = getList($queries['offset']);
        $vCurrentPage = intval($queries['offset']) / 4 + 1;
    }
}
$vCont = 0;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./dashboard-admin.css">
    <title>ModUTN</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="col-sm-4" style="display: flex; ;align-items:center">
            <img src="../shared/logo.png" width="50" height="50" style="margin-right:10px" alt="logo_UTN" loading="lazy">
            <a class="navbar-brand" href="#">Módulos UTN</a>
        </div>
        <div class="col-sm-4" style="display: flex; justify-content:space-between">
            <a class="navbar-brand" href="./dashboard-admin.php" id="currentTab">Solicitudes</a>
            <a class="navbar-brand" href="../vacantes/vacantes-dashboard.php">Vacantes</a>
        </div>
        <div class="col-sm-4" style="display: flex; justify-content:flex-end;align-items:center">
            <a class="navbar-brand" href="#"><?php echo $vNombre; ?></a>
            <img src="../shared/person.png" width="50" height="50" alt="person_icon" loading="lazy">
        </div>
    </nav>
    <div class="container-fluid">
        <div class="col" id="leftColumn">
            <div class="filter">
                <div class="row">
                    <h5 id="searchText">Buscar</h5>
                </div>
                <div class="row">
                    <form action="dashboard-admin.php" method="POST" name="busqueda">
                        <input type="text" class="form-control" name="palabra" />
                        <div class="buttonsRow">
                            <button type="submit" id="searchButton" class="btn btn-primary">Buscar</button>
                            <?php if (isset($_POST['palabra']) && !empty($_POST['palabra'])) {
                            ?>
                                <form action="dashboard-admin.php">
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
            <div class="cardsContainer" style="max-width:60vw;">
                <?php
                if (is_string($vPostulaciones)) {
                    echo '<h3 class="not-found-message">' . $vPostulaciones . '</h3>';
                } else {
                    while ($row = mysqli_fetch_array($vPostulaciones)) {
                        $vCont++;
                        if ($vCont % 2 != 0 || $vCont == 1) {
                            echo "<div class='row'>";
                        };
                        echo "<div class='card' style='width: 28vw; height:25vh;margin:16px;'>
                        <div class='card-body'>
                        <h4 class='card-title'>{$row['nombre']} {$row['apellido']}</h4>
                        <h5 class='card-subtitle mb-2 text-muted'>{$row['descripcion']}</h5>
                        <div class = 'buttonContainer'>
    <button class = 'btn btn-primary'>Descargar CV</button>
    <button class='btn' style = 'border: 1px solid lightgrey'>Enviar por mail</button>
    </div>
  </div>
</div>
";

                        if ($vCont % 2 == 0 || $vCont == mysqli_num_rows($vPostulaciones))
                            echo "</div>";
                    }
                    mysqli_free_result($vPostulaciones);
                }

                ?>
            </div>
            <!-- paginación -->
            <nav class="paginationBottom" aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="dashboard-admin.php?<?php $vPreviousPage = ($vCurrentPage - 2) * 4;
                                                                        echo "offset=$vPreviousPage"; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="dashboard-admin.php">1</a></li>
                    <li class="page-item"><a class="page-link" href="dashboard-admin.php?<?php echo "offset=4" ?>">2</a></li>
                    <li class="page-item"><a class="page-link" href="dashboard-admin.php?<?php echo "offset=8" ?>">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="dashboard-admin.php?<?php $vNextPage = ($vCurrentPage) * 4;;
                                                                        echo "offset=$vNextPage"; ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>


        <div class="col" id="rightColumn">
            <a href="../registra-orden/registra-orden.php" class="btn btn-primary" id="meritOrder"> Registrar nueva orden de merito</a>
        </div>
    </div>
</body>

</html>