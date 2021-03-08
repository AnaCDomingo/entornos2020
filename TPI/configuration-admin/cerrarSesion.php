<?php
if (isset(($_POST['exitButton']))) {
    # cerrar sesión de usuario (botón salir)
    if (isset(($_SESSION['id_usuario']))) {
        # limpia las cookies y elimina la de sesión con el id de usuario y el nombre
        setcookie("nombre","value",time()-3600);
        setcookie("id_usuario","value",time()-3600);
        setcookie("tipo_usuario","value",time()-3600);
        session_destroy (); 
        

    }
};
echo '<script language="javascript">';
echo 'alert("usuario/contraseña incorrectos");
window.location.href="../login/login.php";
';
echo '</script>';
mysqli_close($link);
?>
