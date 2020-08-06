<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./login.css">
    <title>ModUTN</title>
</head>

<body>
    <nav id="headerNavbar" class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="header-utn">
            <img src="../shared/logo.png" width="50" height="50" style="margin-right:10px" alt="logo_UTN" loading="lazy">
            <a class="navbar-brand" href="#">Módulos UTN</a>
        </div>
        <a class="navbar-brand" href="../signup/signup.php">Registrarse</a>

    </nav>
    <div class="container-fluid">
        <form action="user-query.php" method="POST" name="loginForm">
            <div class="form-group">
                <label for="InputEmail1">Usuario/email</label>
                <input type="email" class="form-control" id="InputEmail1" name="email">
            </div>
            <div class="form-group">
                <label for="InputPassword1">contraseña</label>
                <input type="password" class="form-control" id="InputPassword1" name="pass">
            </div>
            <button type="submit" name="loginForm" class="btn btn-primary">Iniciar sesión</button>
        </form>
    </div>

</body>

</html>