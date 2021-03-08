<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./configuration-u.css">
    <title>ModUTN</title>
</head>

<?php
include("../conexion.php");
session_start();
if (isset($_SESSION['id_usuario'])) {
    $userId = $_SESSION['id_usuario'];
$vSql = ("SELECT nombre,apellido,dni,email FROM usuarios WHERE id_usuario ='$userId' AND id_estado <> 2 ");
$vResultado = mysqli_query($link, $vSql);
if (mysqli_num_rows($vResultado) == 1) {
    $fila = mysqli_fetch_array($vResultado);
    $nombre = $fila['nombre'];
    $apellido = $fila['apellido'];
    $dni = $fila['dni'];
    $email = $fila['email'];
    $nameUser=$_SESSION['nombre'];
}}
?>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="col-sm-4" style="display: flex; ;align-items:center">
            <img src="../shared/logo.png" width="50" height="50" style="margin-right:10px" alt="logo_UTN" loading="lazy">
            <a class="navbar-brand" href="#">Módulos UTN</a>
        </div>
        <div class="col-sm-4" style="display: flex; justify-content:space-between">
            <a class="navbar-brand" href="../dashboard-admin/dashboard-admin.php" >Solicitudes</a>
            <a class="navbar-brand" href="../vacantes/vacantes-dashboard.php" 1>Vacantes</a>

        </div>
        <div class="col-sm-4" style="display: flex; justify-content:flex-end;align-items:center">
            <a class="navbar-brand" href="./configuration-u.php" id="currentTab"><?php echo $nameUser ?></a>
            <img src="https://cdn2.iconfinder.com/data/icons/people-80/96/Picture1-512.png" width="50" height="50" alt="person_icon" loading="lazy">
            <a id="exitButton" name="exitButton" href="./cerrarSesion.php" class="btn btn-danger"> Salir </a>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
            <div class="container">
                <h2 id="nameUser" name="nameUser"  ><?php echo $nameUser ?> </h2>
                <hr>
                <form action="alterUser-query.php" method="POST" name="configurationForm">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre</label>
                                <input type="text" class="form-control" id="nombreUser" name="nombreUser" value="<?php echo $nombre; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Apellido</label>
                                <input type="text" class="form-control" id="apellidoUser" name="apellidoUser" value="<?php echo $apellido ?>">
                            </div>
                            <div class="form-group">
                                <a onclick="document.location.href='./changePass-u.php'" name="changePassUserButton" id="changePassUserButton" class="btn btn-danger">Cambiar contraseña</a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Legajo/DNI</label>
                                <input type="number" class="form-control" id="legajoUser" name="legajoUser" value="<?php echo $dni ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="email" class="form-control" id="mailUser" name="mailUser" value="<?php echo $email ?>">
                            </div>
                            <div class="form-group">
                                <input type="submit"value="Eliminar cuenta"name="deleteUserButton" id="deleteUserButton" onClick= "return confirm('Está seguro que quiere eliminar la cuenta?')"   class="btn btn-danger">
                            </div>
                        </div>
                    </div>
                    <div class="row" id="buttonsRow">
                        <a id="goBackButton" name="goBackButton" onclick="document.location.href='../dashboard-admin/dashboard-admin.php'" class="btn btn-danger">Volver</a>
                        <input type="submit" value="Aceptar" name="configurationForm" id="configurationForm" onClick="return confirm('Está seguro que desea modificar los datos?')" class="btn btn-primary">
                </form>
            </div>

        </div>
    </div>
    <div class="col-xs-2"></div>
    </div>
</body>

</html>