<?php
include '../config/database.php';

$sql = "INSERT INTO salonario (semestre, dia, orden, idSalon, idAsig) VALUES (?, ?, ?, ?, ?)";

if ($stmt = $conexion->prepare($sql)) {
    $stmt->bind_param("ssiii", $_POST["semestre"], $_POST["dia"], $_POST["orden"], $_POST["salon"], $_POST["asignatura"]);

    if ($stmt->execute()) {
        echo 'ok';
    } else {
        echo 'No se pudo agregar la asignacion: ' . $stmt->error;
    }

    $stmt->close();
} else {
    echo 'Error en la preparación de la consulta: ' . $conexion->error;
}

$conexion->close();
?>