<?php
include '../config/database.php';

$conexion->begin_transaction();

try {
    $sqlUpdate = "UPDATE asignaturas SET nombre = ?, idProfesor = ?, anio = ? WHERE id = ?";
    
    if ($stmtUpdate = $conexion->prepare($sqlUpdate)) {
        $stmtUpdate->bind_param("ssii", $_POST["nombre"], $_POST["profesor"], $_POST["anio"], $_POST["idE"]);
        
        if (!$stmtUpdate->execute()) {
            throw new Exception("Error al actualizar la asignatura: " . $stmtUpdate->error);
        }
        $stmtUpdate->close();
    } else {
        throw new Exception("Error en la preparación de la consulta de actualización: " . $conexion->error);
    }

    $sqlDelete = "DELETE FROM carreras_asignaturas WHERE idAsignatura = ?";
    
    if ($stmtDelete = $conexion->prepare($sqlDelete)) {
        $stmtDelete->bind_param("i", $_POST["idE"]);
        
        if (!$stmtDelete->execute()) {
            throw new Exception("Error al eliminar las relaciones de carrera: " . $stmtDelete->error);
        }
        $stmtDelete->close();
    } else {
        throw new Exception("Error en la preparación de la consulta de eliminación: " . $conexion->error);
    }

    if (!empty($_POST['carrera'])) {
        $sqlInsert = "INSERT INTO carreras_asignaturas (idAsignatura, idCarrera) VALUES (?, ?)";
        
        if ($stmtInsert = $conexion->prepare($sqlInsert)) {
            $stmtInsert->bind_param("ii", $_POST["idE"], $idCarrera);
            
            foreach ($_POST['carrera'] as $idCarrera) {
                if (!$stmtInsert->execute()) {
                    throw new Exception("Error al insertar la nueva relación de carrera: " . $stmtInsert->error);
                }
            }
            $stmtInsert->close();
        } else {
            throw new Exception("Error en la preparación de la consulta de inserción: " . $conexion->error);
        }
    }
    
    $conexion->commit();
    echo 'ok';

} catch (Exception $e) {
    $conexion->rollback();
    echo 'No se pudo editar la asignatura: ' . $e->getMessage();
}

$conexion->close();
?>