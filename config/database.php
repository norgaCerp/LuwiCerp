<?php
// Datos de conexión
$host = "localhost";
$usuario = "root";
$clave = "";
$base_datos = "cerp_salones";

// Crear conexión
$conexion = new mysqli($host, $usuario, $clave, $base_datos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

?>