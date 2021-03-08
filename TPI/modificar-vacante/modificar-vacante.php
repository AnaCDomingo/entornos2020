<?php
include('../conexion.php');
include_once('./vacantes-query.php');
session_start();
$vTipo = $_SESSION['tipo_usuario'];
if ($vTipo != 2) {
    header('Location: ../login/login.php');
}
parse_str($_SERVER['QUERY_STRING'], $queries);
if (empty($queries)) {
    header('Location: ../vacantes/vacantes-dashboard.php');
} else {
    $vVacID = $queries['id'];
}
$vSql = ("SELECT  vac.id_vacante as id, vac.fecha_cierre , vac.requisitos_descripcion as requisitos,
vac.puesto, mat.descripcion as materia, car.descripcion as carrera, car.id_carrera, mat.id_materia FROM vacantes vac
INNER JOIN materias mat On mat.id_materia = vac.id_materia INNER JOIN
 carreras car on car.id_carrera = vac.id_carrera WHERE id_vacante = '$vVacID' AND vac.id_estado<>2");
$vResultado = mysqli_query($link, $vSql) or die(mysqli_error($link));
$row = mysqli_fetch_array($vResultado);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./modificar-vacante.css">
    <title>ModUTN</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="col-sm-4" style="display: flex; ;align-items:center">
            <img src="../shared/logo.png" width="50" height="50" style="margin-right:10px" alt="logo_UTN" loading="lazy">
            <a class="navbar-brand" href="../login/login.php">Módulos UTN</a>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
            <div class="container">
                <h2>Modificar vacante</h2>
                <hr>
                <form action="update-vacante.php?id=<?php echo $vVacID ?> " method="POST" name="formModificarVacante">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputMateria">Materia</label>
                                <?php
                                $vMaterias = getMaterias();
                                echo ("<select name='materias' class='form-control'>");
                                echo ("<option selected value ='" . $row['id_materia'] . "' >{$row['materia']}</option>");
                                while ($rowMateria = mysqli_fetch_array($vMaterias)) {
                                    if ($rowMateria['materia'] != $row['materia'])
                                        echo "<option value='" . $rowMateria['id_materia'] . "'>" . $rowMateria['materia'] . "</option>";
                                }
                                echo "</select>";
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="inputMateria">Carrera</label>
                                <?php
                                $vCarreras = getCarreras();
                                echo ("<select name='carreras'  class='form-control'>");
                                echo ("<option selected value = '" . $row['id_carrera'] . "'>{$row['carrera']}</option>");
                                while ($rowCarrera = mysqli_fetch_array($vCarreras)) {
                                    if ($rowCarrera['carrera'] != $row['carrera'])
                                        echo "<option value='" . $rowCarrera['id_carrera'] . "'>" . $rowCarrera['carrera'] . "</option>";
                                }
                                echo "</select>";
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="InputPassword1">Puesto</label>
                                <input type="text" value="<?php echo $row['puesto'] ?>" required class="form-control" id="Puesto1" name="puesto">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputDni1">Fecha de cierre</label>
                                <input type="date" min="2020-01-01" max="2040-01-01" value="<?php echo $row['fecha_cierre'] ?>" required class="form-control" id="fechaCierre1" name="fecha_cierre">
                            </div>
                            <div class="form-group">
                                <label for="requisitos1">Requisitos/descripción</label>
                                <textarea required rows="10" class="form-control" id="requisitos1" name="requisitos"><?php echo $row['requisitos'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="buttonsRow">
                        <a id="goBackButton" href='../vacantes/vacantes-dashboard.php' class="btn btn-danger">Volver</a>
                        <button type="submit" class="btn btn-primary" name="formModificarVacante"> Modificar</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xs-2"></div>
    </div>
</body>

</html>