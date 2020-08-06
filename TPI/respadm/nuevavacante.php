<?php
include("../conexion.php");
session_start();
//Lógica de sesiones
$vNombre = $_SESSION['nombre'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./ra.css">
    <title>Nueva vacante</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="col-sm-4" style="display: flex; ;align-items:center">
            <img src="../shared/logo.png" width="50" height="50" style="margin-right:10px" alt="logo_UTN" loading="lazy">
            <a class="navbar-brand" href="#">Módulos UTN</a>
        </div>
        <div class="col-sm-4" style="display: flex; justify-content:space-between">
            <a class="navbar-brand" href="./dashboard-admin.php">Solicitudes</a>
            <a class="navbar-brand" href="../vacantes/vacantes.php" id="currentTab">Vacantes</a>
        </div>
        <div class="col-sm-4" style="display: flex; justify-content:flex-end;align-items:center">
            <a class="navbar-brand" href="#"><?php echo $vNombre; ?></a>
            <img src="https://cdn2.iconfinder.com/data/icons/people-80/96/Picture1-512.png" width="50" height="50" alt="person_icon" loading="lazy">
        </div>
    </nav>
    <div class="container-fluid">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
            <div class="container">
                <h2>Nueva vacante</h2>
                <hr>
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputCarrera">Carrera</label>
                                <?php
                                    $vSql = ("SELECT * FROM carreras");
                                    $vResultado = mysqli_query($link, $vSql);
                                    echo("<select name='carreras' class='form-control'>");
                                    echo ("<option size =30 ></option>");
                                    while ($row = mysqli_fetch_array($vResultado)) {
                                        print "<option value='" . $row['descripcion'] . "'>" . $row['descripcion'] . "</option>";
                                    }
                                    echo "</select>";
                                    mysqli_free_result($vResultado);
                                    mysqli_close($link);
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="inputMateria">Materia</label>
                                <?php
                                    $vSql = ("SELECT * FROM materias");
                                    $vResultado = mysqli_query($link, $vSql);
                                    echo("<select name='materias' class='form-control'>");
                                    echo ("<option size =30></option>");
                                    while ($row = mysqli_fetch_array($vResultado)) {
                                        print "<option value='" . $row['descripcion'] . "'>" . $row['descripcion'] . "</option>";
                                    }
                                    echo "</select>";
                                    mysqli_free_result($vResultado);
                                    mysqli_close($link);
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="inputPuesto">Puesto</label>
                                <input type="text" class="form-control" id="InputPuesto">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="FechaDeCierre">Fecha de cierre</label>
                                <input type="date" class="form-control" id="InputFecha">
                            </div>
                            <div class="form-group">
                                <label for="InputPassword1">Descripción/Requisitos</label>
                                <input type="text" class="descripcion" id="InputPassword1">
                            </div>
                        </div>
                    </div>
                    <div class="row" id="buttonsRow">
                        <a id="goBackButton" onclick="document.location.href='../login/login.php'" class="btn btn-danger">Volver</a>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
            </div>

        </div>
    </div>
    <div class="col-xs-2"></div>
    </div>
</body>

</html>