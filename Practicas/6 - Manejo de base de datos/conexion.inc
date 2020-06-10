<?php
    $link=mysqli_connect("loclahost","root")or die("Problemas de coneción de base de datos");
    mysqli_select_db($link, "capitales");
?>