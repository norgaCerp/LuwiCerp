<?php
include '../config/database.php';

$sql = "UPDATE salonario SET semestre=?, dia=?, orden=?, idSalon=?, idAsig=? WHERE id=?";

if ($stmt = $conexion->prepare($sql)) {
    $stmt->bind_param("ssiiii", $_POST["semestre"], $_POST["dia"], $_POST["orden"], $_POST["salon"], $_POST["asignaturaE"], $_POST["idE"]);

    if ($stmt->execute()) {
        echo 'ok';
    } else {
        echo 'No se pudo editar la asignacion: ' . $stmt->error;
    }

    $stmt->close();
} else {
    echo 'Error en la preparación de la consulta: ' . $conexion->error;
}

$conexion->close();
?>
