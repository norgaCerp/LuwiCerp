<?php
include '../config/database.php';

$sql = "INSERT INTO docentes (documento, nombre, apellido, email, celular, observaciones) VALUES (?, ?, ?, ?, ?, ?)";

if ($stmt = $conexion->prepare($sql)) {
    
    $stmt->bind_param("ssssss", $_POST["documento"], $_POST["nombre"], $_POST["apellido"], $_POST["email"], $_POST["celular"], $_POST["obs"]);
    
    if ($stmt->execute()) {
        echo 'ok';
    } else {
        echo 'No se pudo agregar el docente!';
    }
    
    $stmt->close();
} else {
    echo 'Error en la preparación de la consulta: ' . $conexion->error;
}

$conexion->close();
?>