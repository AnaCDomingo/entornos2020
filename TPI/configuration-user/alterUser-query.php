<?php
include("../conexion.php");
session_start();
if (isset(($_POST['deleteUserButton']))){
    if (isset(($_SESSION['id_usuario']))) {
        $userId = $_SESSION['id_usuario'];
    //cambiar id estado (boton eliminar cuenta)
        $vSql=("UPDATE usuarios SET id_estado = 2 WHERE id_usuario ='$userId' ");
        $vResultado = mysqli_query($link, $vSql) or die(mysqli_error($link));


};
}
elseif (isset(($_POST['configurationForm']))){
    //cambiar campos (boton aceptar)
    if (isset(($_SESSION['id_usuario']))){
        $userId1 = $_SESSION['id_usuario'];
            $nEmail = $_POST['mailUser'];
            $nNombre = $_POST['nombreUser'];
            $nApellido = $_POST['apellidoUser'];
            $nLegajo = $_POST['legajoUser'];
            $vSql1=("UPDATE usuarios SET email = '$nEmail', nombre = '$nNombre', apellido = '$nApellido',
             legajo = '$nLegajo' WHERE id_usuario ='$userId1' ");
            $vResultado1 = mysqli_query($link, $vSql1) or die(mysqli_error($link));  
}
};
?>
        <script>
                window.location.href = "../login/login.php"
        </script> 