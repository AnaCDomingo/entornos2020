<?php

# cerrar sesión de usuario (botón salir)
# limpia las cookies y elimina la de sesión con el id de usuario y el nombre

if (isset($_SERVER['HTTP_COOKIE'])) {
    echo('entro 1');
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
        session_destroy(); 
    }
};
mysqli_close($link);
header('Location: ../login/login.php');
?>
