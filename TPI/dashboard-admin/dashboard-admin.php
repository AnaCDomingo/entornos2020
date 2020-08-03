<?php
include_once('./get-postulaciones.php');
$vPostulaciones = getList();
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
            <a class="navbar-brand" href="#" id="currentTab">Solicitudes</a>
            <a class="navbar-brand" href="#" 1>Vacantes</a>

        </div>
        <div class="col-sm-4" style="display: flex; justify-content:flex-end;align-items:center">
            <a class="navbar-brand" href="#">Nombre</a>
            <img src="https://cdn2.iconfinder.com/data/icons/people-80/96/Picture1-512.png" width="50" height="50" alt="person_icon" loading="lazy">
        </div>
    </nav>
    <div class="container-fluid">
        <div class="col" id="leftColumn">
            <h3>Seleccione por...</h3>
            <div class="filter">
                <p>Carrera</p>
                <?php
                include("../conexion.php");
                $vSql = ("SELECT * FROM carreras");
                $vResultado = mysqli_query($link, $vSql);
                echo ("<select name='carreras'>");
                echo ("<option size =30 ></option>");
                while ($row = mysqli_fetch_array($vResultado)) {
                    $rows[] = $row;
                }
                foreach ($rows as $row) {
                    print "<option value='" . $row['descripcion'] . "'>" . $row['descripcion'] . "</option>";
                }
                echo "</select>";
                mysqli_free_result($vResultado);
                mysqli_close($link);
                ?>
                <button class="btn btn-primary" id="btnFilter">Filtrar</button>
            </div>
        </div>
        <div class="col-8" id="centerColumn">
            <div class="cardsContainer" style="max-width:60vw;">
                <?php
                if (is_string($vPostulaciones)) {
                    echo '<h3>' . $vPostulaciones . '</h3>';
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
                }

                ?>
            </div>
        </div>


        <div class="col" id="rightColumn">
            <button class="btn btn-primary" id="meritOrder"> Registrar nueva orden de merito</button>
        </div>
    </div>
</body>

</html>