<?php
include '../config/database.php';

$sql = "UPDATE carreras SET nombre=?, color=? WHERE id=?";

if ($stmt = $conexion->prepare($sql)) {
    $stmt->bind_param("ssi", $_POST["nombre"], $_POST["color"], $_POST["idE"]);
    
    if ($stmt->execute()) {
        echo 'ok';
    } else {
        echo 'No se pudo editar la carrera!';
    }
    
    $stmt->close();
} else {
    echo 'Error en la preparación de la consulta: ' . $conexion->error;
}

$conexion->close();
?>