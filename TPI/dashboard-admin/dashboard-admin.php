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
            <a class="navbar-brand" href="../configuration-admin/configuration-u.php"><?php echo $vNombre; ?></a>
            <img src="https://cdn2.iconfinder.com/data/icons/people-80/96/Picture1-512.png" width="50" height="50" alt="person_icon" loading="lazy">

        </div>
    </nav>
    <div class="container-fluid">
        <div class="col-3" id="leftColumn">
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
        <div class="col-9" id="centerColumn">
            <!-- logica de tarjetas (funcional y cliente) -->
            <div class="cardsContainer">
                <?php
                if (is_string($vPostulaciones)) {
                    echo '<h3 class="not-found-message">' . $vPostulaciones . '</h3>';
                } else {
                    while ($row = mysqli_fetch_array($vPostulaciones)) {
                        $vCont++;
                        if ($vCont % 2 != 0 || $vCont == 1) {
                            echo "<div class='row'>";
                        };
                        echo "<div class='card' style='width: 28vw; height:25vh;margin:16px;  box-shadow: 5px 2px #cccccc6e''>
                        <div class='card-body'>
                        <h4 class='card-title'>{$row['nombre']} {$row['apellido']}</h4>
                        <h5 class='card-subtitle mb-2 text-muted'>{$row['descripcion']}</h5>
                        <div class = 'buttonContainer'>
    <a class = 'btn btn-primary'
    target='_blank'
     href='../postulaciones/{$row['archivo_adjunto']}'>
     Descargar CV
     </a>
    <a class='btn' style = 'border: 1px solid lightgrey' target='_blank'
     href='#'>Enviar por mail</a>
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
                                                                          if($vPreviousPage<0)
                                                                          $vPreviousPage = 0;
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



    </div>
</body>

</html>