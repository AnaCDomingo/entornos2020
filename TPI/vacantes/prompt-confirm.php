<?php
include_once('./get-vacantes.php');
//Lógica de sesiones
$vNombre = $_SESSION['nombre'];
//Tomo los query params para poder realizar el paginado
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
if (empty($queries)) {
    header('Location : "./vacante-dashboard.php"');
} else {
    $vVacID = $queries['id'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./prompt-confirm.css">
    <title>ModUTN</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="col-sm-4" style="display: flex; ;align-items:center">
            <img src="../shared/logo.png" width="50" height="50" style="margin-right:10px" alt="logo_UTN" loading="lazy">
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
        </div>

        <div class="col-8" id="centerColumn">
            <div class="container">
                <h2>Confirmar</h2>
                <hr>
                <h4>¿Está seguro que desea eliminar la vacante?</h4>
                <div class="row">
                    <a href="./vacantes-dashboard.php" class="btn btn-primary">Volver</a>
                    <a href="delete-vacante.php?id=<?php echo $vVacID ?>" class="btn btn-danger">Eliminar</a>
                </div>
            </div>
        </div>


        <div class="col" id="rightColumn">
        </div>
    </div>
</body>

</html>