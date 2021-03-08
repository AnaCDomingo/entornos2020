<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./nueva-postulacion.css">
    <title>ModUTN</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="col-sm-4" style="display: flex; ;align-items:center">
            <img src="../shared/logo.png" width="50" height="50" style="margin-right:10px" alt="logo_UTN" loading="lazy">
            <a class="navbar-brand" href="#">Módulos UTN</a>
        </div>
        <div class="col-sm-4" style="display: flex; justify-content:space-between">
            <a class="navbar-brand" href="#" id="currentTab">Vacantes</a>
            <a class="navbar-brand" href="#" 1>Mis Postulaciones</a>

        </div>
        <div class="col-sm-4" style="display: flex; justify-content:flex-end;align-items:center">
            <a class="navbar-brand" href="#">Nombre</a>
            <img src="https://cdn2.iconfinder.com/data/icons/people-80/96/Picture1-512.png" width="50" height="50" alt="person_icon" loading="lazy">
        </div>
    </nav>
    <div class="container-fluid">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
            <div class="container">
                <h2>Título</h2>
                <hr>
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Carrera</label>
                                <input type="text" value="carrera" class="form-control" id="carrera" name="carrera" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Puesto</label>
                                <input type="text" class="form-control" id="puesto" name="puesto" value="puesto" readonly>
                            </div>
                            <div class="form-group">
                                <label for="InputPassword1">Descripcion/Requisitos</label>
                                <input type="text" class="form-control" id="descReq" name="descReq" value="descReq" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Materia</label>
                                <input type="text" class="form-control" id="materia" name="materia" value="materia" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Adjuntar CV</label>
                                <input type="file" name="file" id="file" class="inputfile" />
                                <label for="file">nombre del cv</label>
                            </div>

                        </div>
                    </div>
                    <div class="row" id="buttonsRow">
                        <a id="goBackButton" onclick="document.location.href='../login/login.php'" class="btn btn-danger">Volver</a>
                        <button type="submit" class="btn btn-primary"> Postularse</button>
                </form>
            </div>

        </div>
    </div>
    <div class="col-xs-2"></div>
    </div>
</body>

</html>