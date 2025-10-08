<?php
include '../config/database.php';

$sql = "INSERT INTO salones (nombre, piso, capacidad, televisor, aire, observaciones) VALUES (?, ?, ?, ?, ?, ?)";

if ($stmt = $conexion->prepare($sql)) {
    $stmt->bind_param("ssssss", $_POST["nombre"], $_POST["piso"], $_POST["capacidad"], $_POST["televisor"], $_POST["aire"], $_POST["obs"]);

    if ($stmt->execute()) {
        echo 'ok';
    } else {
        echo 'No se pudo agregar el salón!';
    }

    $stmt->close();
} else {
    echo 'Error en la preparación de la consulta: ' . $conexion->error;
}

$conexion->close();
?>