<?php
include '../config/database.php';

$sql = "UPDATE salones SET nombre=?, piso=?, capacidad=?, televisor=?, aire=?, observaciones=? WHERE id=?";

if ($stmt = $conexion->prepare($sql)) {
    $stmt->bind_param("ssssssi", $_POST["nombre"], $_POST["piso"], $_POST["capacidad"], $_POST["televisor"], $_POST["aire"], $_POST["obs"], $_POST["idE"]);

    if ($stmt->execute()) {
        echo 'ok';
    } else {
        echo 'No se pudo editar el salón!';
    }

    $stmt->close();
} else {
    echo 'Error en la preparación de la consulta: ' . $conexion->error;
}

$conexion->close();
?>