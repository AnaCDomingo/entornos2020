<?php
$destino = $_POST['email'];
$asunto = $_POST['nombre'];
if (isset($_POST['texto'])) {
    $comentario = $_POST['texto'];
} else {
    $comentario = $_POST['nombre']." te ha recomendado una página! Ingresa al siguiente enlace para verla: \n
        <a href='www.google.com'> San Google </a>";
};

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: maildeprueba@gmail.com';

mail($destino, $asunto, $comentario, $headers);
echo "Tu recomendación ha sido enviada exitosamente!";
?>