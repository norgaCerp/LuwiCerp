<?php
include '../config/database.php';

$sql = "INSERT INTO carreras (nombre, color) VALUES (?, ?)";

if ($stmt = $conexion->prepare($sql)) {
    $stmt->bind_param("ss", $_POST["nombre"], $_POST["color"]);
    
    if ($stmt->execute()) {
        echo 'ok';
    } else {
        echo 'No se pudo agregar la carrera!';
    }
    
    $stmt->close();
} else {
    echo 'Error en la preparación de la consulta: ' . $conexion->error;
}

$conexion->close();
?>