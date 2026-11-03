<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$base_datos = "filacerocr_db";
$puerto = 3307; // Este puerto es el que usa tu XAMPP

$conexion = new mysqli($servidor, $usuario, $password, $base_datos, $puerto);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
$conexion->set_charset("utf8");
?>