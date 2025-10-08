<?php
include '../config/database.php';

$sql = "";
$search_term = null;
$resultado = null;

if (isset($_GET["search"]) && !empty($_GET["search"])) {
    $sql = "SELECT 
                a.id AS idAsignatura,
                a.nombre AS nombreAsignatura,
                a.anio as anio,
                p.id AS idProfesor,
                CONCAT(p.nombre, ' ', p.apellido) AS nombreProfesor,
                GROUP_CONCAT(c.id SEPARATOR ',') AS carreras_ids,
                GROUP_CONCAT(c.nombre SEPARATOR ', ') AS carreras 
            FROM asignaturas a 
            INNER JOIN docentes p ON a.idProfesor = p.id 
            INNER JOIN carreras_asignaturas ca ON a.id = ca.idAsignatura 
            INNER JOIN carreras c ON ca.idCarrera = c.id 
            WHERE a.nombre LIKE ? OR p.nombre LIKE ? OR p.apellido LIKE ? 
            GROUP BY a.id, a.nombre, a.anio, p.id, p.nombre, p.apellido";
            
    $search_term = "%" . $_GET['search'] . "%"; 
    
    if ($stmt = $conexion->prepare($sql)) {
        $stmt->bind_param("sss", $search_term, $search_term, $search_term);

        $stmt->execute();
        $resultado = $stmt->get_result(); 
    } else {
        echo 'Error en la preparación de la consulta: ' . $conexion->error;
        exit;
    }
} else {
    $sql = "SELECT a.id AS idAsignatura, a.nombre AS nombreAsignatura, a.anio as anio, p.id AS idProfesor, GROUP_CONCAT(c.id SEPARATOR ',') AS carreras_ids, CONCAT(p.nombre, ' ', p.apellido) AS nombreProfesor, GROUP_CONCAT(c.nombre SEPARATOR ', ') AS carreras FROM asignaturas a INNER JOIN docentes p ON a.idProfesor = p.id INNER JOIN carreras_asignaturas ca ON a.id = ca.idAsignatura INNER JOIN carreras c ON ca.idCarrera = c.id GROUP BY a.id, a.nombre, a.anio, p.id, p.nombre, p.apellido;";
    $resultado = $conexion->query($sql);
}

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
?>
        <div class="itemAsig">
            <div class="itemTop">
                <span class="material-symbols-rounded">book</span>
                <p class="titleCarrera"><?php echo htmlspecialchars($fila["nombreAsignatura"]); ?></p>
            </div>
            <div class="itemMid">
                <span class="material-symbols-rounded">person</span>
                <p>Prof: <?php echo htmlspecialchars($fila["nombreProfesor"]); ?></p>
            </div>
            <div class="itemMid1">
                <span class="material-symbols-rounded">school</span>
                <div>Carreras: <?php echo htmlspecialchars($fila["carreras"]); ?></div>
            </div>
            <div class="itemBot">
                <button class="btnCarreraEdit" 
                        onclick='abrirModalEditar("700px", "<?= htmlspecialchars($fila['idAsignatura']); ?>","<?= htmlspecialchars($fila['nombreAsignatura']); ?>","<?= htmlspecialchars($fila['idProfesor']); ?>","<?= htmlspecialchars($fila['nombreProfesor']); ?>","<?= htmlspecialchars($fila['anio']); ?>", "<?= htmlspecialchars($fila['carreras_ids']); ?>")'>
                    <span class="material-symbols-rounded">edit_square</span>
                </button>
                <button class="btnCarreraDel" 
                        onclick='abrirModalEliminar("400px", <?= htmlspecialchars($fila['idAsignatura']); ?>)'>
                    <span class="material-symbols-rounded">delete</span>
                </button>
            </div>
        </div>

    <?php
    }
} else {
    ?>
    <div class="emptyBox">
        <span class="material-symbols-rounded">news</span>
        <p>- No hay registros -</p>
    </div>

<?php
}
$conexion->close();
?>