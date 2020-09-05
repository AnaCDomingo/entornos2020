
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./nueva-postulacion.css">
    <title>ModUTN</title>
</head>
    <?php
        include("../conexion.php");
        session_start();
        $nameUser = $_SESSION['nombre'];
        $vTipo = $_SESSION['tipo_usuario'];
        parse_str($_SERVER['QUERY_STRING'], $queries);
        if (empty($queries)) {
            header('Location: ../dashboard-user/dashboard-user.php');
        } else {
            $vVacID = $queries['id'];
            $vVacMat = $queries['mat'];
            $vVacPuesto = $queries['pue'];
        }
        $vSql = ("SELECT  vac.id_vacante as id, vac.puesto as puesto, mat.descripcion as materia, car.descripcion as carrera,
        vac.requisitos_descripcion as requi FROM vacantes vac
        INNER JOIN materias mat ON mat.id_materia = vac.id_materia 
        INNER JOIN carreras car ON car.id_carrera = vac.id_carrera 
        WHERE id_vacante = '$vVacID' AND vac.id_estado<>2");
        $vResultado = mysqli_query($link, $vSql) or die(mysqli_error($link));
        $fila = mysqli_fetch_array($vResultado);
        $puesto = $fila['puesto'];
        $materia = $fila['materia'];
        $carrera = $fila['carrera'];
        $requi = $fila['requi'];    
    ?>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="col-sm-4" style="display: flex; ;align-items:center">
            <img src="../shared/logo.png" width="50" height="50" style="margin-right:10px" alt="logo_UTN" loading="lazy">
            <a class="navbar-brand" href="#">Módulos UTN</a>
        </div>
        <div class="col-sm-4" style="display: flex; justify-content:space-between">
            <a class="navbar-brand" href="#" id="currentTab">Vacantes</a>
            <a class="navbar-brand" onClick="return confirm('Podria perder el progreso si sale')" href="../dashboard-user/dashboard-user.php" 1>Mis Postulaciones</a>

        </div>
        <div class="col-sm-4" style="display: flex; justify-content:flex-end;align-items:center">
            <a class="navbar-brand" onClick="return confirm('Podria perder el progreso si sale')" href="../configuration-user/configuration-u.php" id="currentTab2"><?php echo $nameUser ?></a>
            <img src="https://cdn2.iconfinder.com/data/icons/people-80/96/Picture1-512.png" width="50" height="50" alt="person_icon" loading="lazy">
        </div>
    </nav>
    <div class="container-fluid">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
            <div class="container">
                <h2>Nueva Postulación</h2>
                <hr>
                <form class="form-group" action="saveNewPostu.php?id=<?php echo $vVacID ?>&mat=<?php echo $vVacMat ?>&pue=<?php echo $vVacPuesto ?> " method="POST" name="saveNewPostu" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Carrera</label>
                                <input type="text" value="<?php echo $carrera ?>" class="form-control" id="carrera" name="carrera" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Puesto</label>
                                <input type="text" class="form-control" id="puesto" name="puesto" value="<?php echo $puesto ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="InputPassword1">Descripcion/Requisitos</label>
                                <textarea required rows="10" class="form-control" id="descReq" name="descReq" readonly><?php echo $requi ?></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Materia</label>
                                <input type="text" class="form-control" id="materia" name="materia" value="<?php echo $materia ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Adjuntar CV</label>
                                <input type="file" name = "postu" id = "postu"  required  >
                            </div>

                        </div>
                    </div>
                    <div class="row" id="buttonsRow">
                        <a id="goBackButton" onClick="return confirm('Podria perder el progreso si sale')" href='../dashboard-user/dashboard-user.php' class="btn btn-danger">Volver</a>
                        <button type="submit" name="saveNewPostuButton" id="saveNewPostuButton" onClick="return confirm('Está seguro que desea postularse a esta vacante?')" class="btn btn-primary"> Postularse</button>
                </form>
            </div>

        </div>
    </div>
    <div class="col-xs-2"></div>
    </div>
</body>

</html>