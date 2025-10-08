<?php
include '../config/database.php';

$sql = "UPDATE docentes SET documento = ?, nombre=?, apellido=?, email=?, celular=?, observaciones=? WHERE id=?";

if ($stmt = $conexion->prepare($sql)) {
    $stmt->bind_param("isssssi", $_POST["documento"], $_POST["nombre"], $_POST["apellido"], $_POST["email"], $_POST["celular"], $_POST["obs"], $_POST["idE"]);

    if ($stmt->execute()) {
        echo 'ok';
    } else {
        echo 'No se pudo editar el docente!';
    }

    $stmt->close();
} else {
    echo 'Error preparing the statement: ' . $conexion->error;
}

$conexion->close();
?>