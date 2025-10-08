<?php
include '../config/database.php';

if (isset($_GET["id"])) {
    
    $sql = "DELETE FROM asignaturas WHERE id = ?";

    if ($stmt = $conexion->prepare($sql)) {
        
        $stmt->bind_param("i", $_GET["id"]);

        if ($stmt->execute()) {
            echo 'ok';
        } else {
            echo 'Error al eliminar la asignatura.';
        }

        $stmt->close();
    } else {
        echo 'Error en la preparación de la consulta: ' . $conexion->error;
    }
} else {
    echo 'ID de asignatura no especificado.';
}

$conexion->close();
?>