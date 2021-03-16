<?php

# cerrar sesión de usuario (botón salir)
# limpia las cookies y elimina la de sesión con el id de usuario y el nombre

include_once('../dashboard-user/dashboard-user.php');
    $nombre = $_SESSION['nombre'];
if (isset($_SERVER['HTTP_COOKIE_VARS'])) {
    echo($nombre);
    $cookies = explode(';', $_SERVER['HTTP_COOKIE_VARS']);
    foreach($cookies as $cookie) {
        echo('entra al seteo');
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
        unset($_SESSION['nombre']);
        session_destroy(); 
    }
};
unset($_SESSION['nombre']);
setcookie(nombre,'', time()-1000);
echo($nombre);
//header('Location: ../login/login.php');
?>
