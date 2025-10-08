<?php
include '../config/database.php';

if (isset($_GET["id"])) {
    
    $sql = "DELETE FROM salones WHERE id = ?";

    if ($stmt = $conexion->prepare($sql)) {
        
        $stmt->bind_param("i", $_GET["id"]);

        if ($stmt->execute()) {
            echo 'ok';
        } else {
            echo 'Error al eliminar el salón.';
        }

        $stmt->close();
    } else {
        echo 'Error en la preparación de la consulta: ' . $conexion->error;
    }
} else {
    echo 'ID de salón no especificado.';
}

$conexion->close();
?>