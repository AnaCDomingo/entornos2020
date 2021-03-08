<?php
include("../conexion.php");

//primero chequear la contraseña vieja
session_start();
if (isset($_SESSION['id_usuario'])) {
  $userId = $_SESSION['id_usuario'];
  $vPass = $_POST['currentPass'];
  $vSql=("SELECT pass FROM usuarios WHERE id_usuario ='$userId' ");
  $vResultado = mysqli_query($link, $vSql) or die(mysqli_error($link));
  if (mysqli_num_rows($vResultado) > 0 && mysqli_num_rows($vResultado) < 2 ){
    $fila = mysqli_fetch_array($vResultado);
    $passDB = $fila['pass'];
    if ($passDB == $vPass ) {
      $pass1=$_POST['newPass'];
      $pass2=$_POST['newPass1'];
      if ($pass1 == $pass2 && $pass1 != "" && $pass2 != "") {
        $nPass=$_POST['newPass'];
         $vSql=("UPDATE usuarios SET pass = '$nPass' WHERE id_usuario ='$userId' AND pass = '$vPass' ");
         $vResultado = mysqli_query($link, $vSql) or die(mysqli_error($link));
         echo '<script language="javascript">';
         echo 'alert("La contraseña fue modificada correctamente");
         window.location.href="./configuration-u.php";
         ';
         echo '</script>';
     
     }else {
      echo '<script language="javascript">';
      echo 'alert("Las contraseñas deben coincidir y no pueden ser nulas");
      window.location.href="./changePass-u.php";
      ';
      echo '</script>';
     }
    }else {
        echo '<script language="javascript">';
        echo 'alert("contraseña incorrecta");
        window.location.href="./changePass-u.php";
        ';
        echo '</script>';
    
    }
}
}
?>