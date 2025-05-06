<?php
$conexion = new mysqli("localhost", "root", "123", "portal_web_tech");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
