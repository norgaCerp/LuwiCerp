<?php
include '../config/database.php';

if (isset($_GET["id"])) {
    
    $sql = "DELETE FROM carreras WHERE id = ?";

    if ($stmt = $conexion->prepare($sql)) {
        $stmt->bind_param("i", $_GET["id"]);

        if ($stmt->execute()) {
            echo 'ok';
        } else {
            echo 'Error al eliminar la carrera.';
        }

        $stmt->close();
    } else {
        echo 'Error en la preparación de la consulta: ' . $conexion->error;
    }
} else {
    echo 'ID de carrera no especificado.';
}

$conexion->close();
?>