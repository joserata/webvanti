<?php
$host = "localhost";
$user = "root";
$pass = "123";
$dbname = "portal_web_tech";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
