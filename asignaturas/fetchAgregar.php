<?php 
include '../config/database.php';

$conexion->begin_transaction();

try {
    $sql_asignatura = "INSERT INTO asignaturas (nombre, idProfesor, anio) VALUES (?, ?, ?)";
    
    if ($stmt_asignatura = $conexion->prepare($sql_asignatura)) {
        $stmt_asignatura->bind_param("sii", $_POST["nombre"], $_POST["profesor"], $_POST["anio"]);
        
        if (!$stmt_asignatura->execute()) {
            throw new Exception("Error al insertar la asignatura.");
        }
        
        $idAsignatura = $conexion->insert_id;
        $stmt_asignatura->close();
    } else {
        throw new Exception("Error en la preparación de la consulta de asignaturas: " . $conexion->error);
    }

    if (!empty($_POST['carrera'])) {
        $sql_rel = "INSERT INTO carreras_asignaturas (idCarrera, idAsignatura) VALUES (?, ?)";
        
        if ($stmt_rel = $conexion->prepare($sql_rel)) {
            $stmt_rel->bind_param("ii", $id_carrera, $idAsignatura);
            
            foreach ($_POST['carrera'] as $id_carrera) {
                if (!$stmt_rel->execute()) {
                    throw new Exception("Error al insertar la relación de carrera.");
                }
            }
            $stmt_rel->close();
        } else {
            throw new Exception("Error en la preparación de la consulta de relaciones: " . $conexion->error);
        }
    }
    
    $conexion->commit();
    echo 'ok';

} catch (Exception $e) {
    $conexion->rollback();
    echo 'No se pudo agregar la asignatura: ' . $e->getMessage();
}

$conexion->close();
?>