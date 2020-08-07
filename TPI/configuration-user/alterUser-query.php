<?php
include("../conexion.php");
session_start();
if (isset(($_POST['deleteUserButton']))){
    //preguntar si quiere eliminar
    ?>
    <script type='text/javascript'>
    var r=confirm('Está seguro que quiere eliminar el usuario?');
    if (r==true){
        <?php
                if (isset(($_SESSION['id_usuario']))) {
                    $userId = $_SESSION['id_usuario'];
            //cambiar id estado (boton eliminar cuenta)
                    $vSql=("UPDATE usuarios SET id_estado = 2 WHERE id_usuario ='$userId' ");
                    $vResultado = mysqli_query($link, $vSql) or die(mysqli_error($link));
                    
                };
        ?>
         alert('Usuario eliminado correctamente');

    }
    else{
        window.location.href = "./configuration-u.php";
        }
    </script>
  <?php
} 
elseif (isset(($_POST['configurationForm']))){
    //cambiar campos (boton aceptar)
    if (isset(($_SESSION['id_usuario']))){
        $userId1 = $_SESSION['id_usuario'];
            $nEmail = $_POST['mailUser'];
            $nNombre = $_POST['nombreUser'];
            $nApellido = $_POST['apellidoUser'];
            $nDni = $_POST['legajoUser'];
            $vSql1=("UPDATE usuarios SET email = '$nEmail', nombre = '$nNombre', apellido = '$nApellido',
             dni = '$nDni' WHERE id_usuario ='$userId1' ");
            $vResultado1 = mysqli_query($link, $vSql1) or die(mysqli_error($link));  
}
};

/*header('Location: ../dashboard-user/dashboard.php');*/
?>
