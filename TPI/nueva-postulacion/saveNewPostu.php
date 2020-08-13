<?php
include('../conexion.php');
parse_str($_SERVER['QUERY_STRING'], $queries);
if (empty($queries)) {
    echo 'vacio';
} else {
    echo 'entro';

}

?>
