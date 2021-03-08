<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./changePass-u.css">
    <title>ModUTN</title>
</head>

<body>
    <nav id="headerNavbar" class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="header-utn">
            <img src="../shared/logo.png" width="50" height="50" style="margin-right:10px" alt="logo_UTN" loading="lazy">
            <a class="navbar-brand" href="#">Módulos UTN</a>
        </div>
        <a class="navbar-brand" href="./configuration-u.php">Volver</a>

    </nav>
    <div class="container-fluid">
        <form action="changePassBDD.php" method="POST" name="changePassForm">
            <div class="form-group">
                <label for="InputEmail1">Contraseña actual</label>
                <input type="password" class="form-control" id="currentPass" name="currentPass">
            </div>
            <div class="form-group">
                <label for="InputPassword1">Nueva contraseña</label>
                <input type="password" class="form-control" id="newPass" name="newPass">
            </div>
            <div class="form-group">
                <label for="InputPassword1">Repetir nueva contraseña</label>
                <input type="password" class="form-control" id="newPass1" name="newPass1">
            </div>
            <button type="submit" name="changePassForm" class="btn btn-primary">Aceptar</button>
        </form>
    </div>

</body>

</html>