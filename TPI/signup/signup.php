<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./signup.css">
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
                <h2>Registrarse</h2>
                <hr>
                <form action="Alta.php" method="POST" name="formRegistro">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputNombre1">Nombre</label>
                                <input type="text" required class="form-control" id="exampleInputNombre1" name="nombre">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputApellido1">Apellido</label>
                                <input type="text" required class="form-control" id="exampleInputApellido1" name="apellido">
                            </div>
                            <div class="form-group">
                                <label for="InputPassword1">Password</label>
                                <input type="password" required class="form-control" id="InputPassword1" name="pass">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputDni1">DNI</label>
                                <input type="text" required class="form-control" id="exampleInputDni1" name="dni">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" required class="form-control" id="exampleInputEmail1" name="email">
                            </div>
                            <div class="form-group">
                                <label for="InputPassword2">Repetir Password</label>
                                <input type="password" class="form-control" id="InputPassword2">
                            </div>
                        </div>
                    </div>
                    <div class="row" id="buttonsRow">
                        <a id="goBackButton" onclick="document.location.href='../login/login.php'" class="btn btn-danger">Volver</a>
                        <button type="submit" class="btn btn-primary" name="formRegistro"> Registrarse</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xs-2"></div>
    </div>
</body>

</html>