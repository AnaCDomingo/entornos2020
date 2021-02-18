<?php
include_once('./get-vacantes.php');
$vTipo = $_SESSION['tipo_usuario'];
if ($vTipo != 2) {
    header('Location: ../login/login.php');
}
//Lógica de sesiones
$vNombre = $_SESSION['nombre'];
//Lógica del filtrado
if (isset($_POST['palabra']) && !empty($_POST['palabra'])) {
    $vVacantes = getFilteredList($_POST['palabra']);
} else {
    //Tomo los query params para poder realizar el paginado
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
    if (empty($queries)) {
        $vVacantes = getList(0);
        $vCurrentPage = 1;
    } else {
        $vVacantes = getList($queries['offset']);
        $vCurrentPage = intval($queries['offset']) / 2 + 1;
    }
}
$vCont = 0;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./vacantes-dashboard.css">
    <title>ModUTN</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="col-sm-4" style="display: flex; ;align-items:center">
            <img src="../shared/logo.png" width="50" height="50" 
            style="margin-right:10px" alt="logo_UTN" loading="lazy">
            <a class="navbar-brand" href="#">Módulos UTN</a>
        </div>
        <div class="col-sm-4" style="display: flex; justify-content:space-between">
            <a class="navbar-brand" href="../dashboard-admin/dashboard-admin.php">Solicitudes</a>
            <a class="navbar-brand" href="./vacantes.php" id="currentTab">Vacantes</a>
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
                    <form action="vacantes-dashboard.php" method="POST" name="busqueda">
                        <input type="text" class="form-control" name="palabra" />
                        <div class="buttonsRow">
                            <button type="submit" id="searchButton" class="btn btn-primary">Buscar</button>
                            <?php if (isset($_POST['palabra']) && !empty($_POST['palabra'])) {
                            ?>
                                <form action="vacantes-dashboard.php">
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
                if (is_string($vVacantes)) {
                    echo '<h3 class="not-found-message">' . $vVacantes . '</h3>';
                } else {
                    while ($row = mysqli_fetch_array($vVacantes)) {
                        $vCont++;
                        // $vId = $row['id'];
                        if ($vCont % 2 != 0 || $vCont == 1) {
                            echo "<div class='row'>";
                        };
                        echo "<div class='card'>
                        <div class = 'card-title' id = 'deleteButtonContainer'>
                        <a href = 'prompt-confirm.php?id={$row['id']}' class = 'btn btn-danger' id = 'deleteButton'><img id='trashImage' alt = 'cesto_eliminar' src = '../shared/trash.png'></a>
                        </div>
                        <div class='card-body'>
                        <h4>{$row['materia']}</h4>
                        <h5 class='card-subtitle mb-2 text-muted'>{$row['descripcion']}</h5>
                        <h6 class='card-subtitle mb-2 text-muted'>{$row['puesto']}</h6>
                        <div class = 'buttonContainer'>
    <a href='../modificar-vacante/modificar-vacante.php?id={$row['id']}' 
    class = 'btn btn-primary' id= 'modifyButton'>Modificar</a>
    <a href='../subir-orden/subir-orden.php?id={$row['id']}&mat={$row['materia']}&pue={$row['puesto']}' 
    class = 'btn btn-success' id= 'newOrderButton'>Subir órden de mérito</a>
    </div>
  </div>
</div>
";

                        if ($vCont % 2 == 0 || $vCont == mysqli_num_rows($vVacantes))
                            echo "</div>";
                    }
                    mysqli_free_result($vVacantes);
                }

                ?>
            </div>
            <!-- paginación -->
            <nav class="paginationBottom" aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="vacantes-dashboard.php?<?php $vPreviousPage = ($vCurrentPage - 2) * 2;
                                                                            echo "offset=$vPreviousPage"; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="vacantes-dashboard.php">1</a></li>
                    <li class="page-item"><a class="page-link" href="vacantes-dashboard.php?<?php echo "offset=2" ?>">2</a></li>
                    <li class="page-item"><a class="page-link" href="vacantes-dashboard.php?<?php echo "offset=4" ?>">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="vacantes-dashboard.php?<?php
                                                                            $vNextPage = $vCurrentPage * 2;;
                                                                            echo "offset=$vNextPage"; ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>


        <div class="col" id="rightColumn">
            <a href="../nueva-vacante/nueva-vacante.php" class="btn btn-success" id="meritOrder"> Nueva vacante</a>
        </div>
    </div>
</body>

</html>