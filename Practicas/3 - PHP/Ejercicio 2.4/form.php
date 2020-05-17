<html>
<head><title>Chequear ingreso</title>
<link href="./form.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body>
<? include("test.php")?>
<?php
if (!isset($_POST['submit'])) {
?>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
 Ingrese nombre de usuario: <input type="text" name="input" class="inputName">
 <input type="submit" class = "submit" name="submit" value="Chequear">
 </form>
<?php
 }
else {
 $check = $_POST['input'];
 comprobar_nombre_usuario($check);
}
?>
</body></html>