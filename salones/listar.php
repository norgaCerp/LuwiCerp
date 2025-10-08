<?php
include '../config/database.php';

$sql = "";
$search_term = null;

if (isset($_GET["search"])) {
    $sql = "SELECT * FROM salones WHERE nombre LIKE ? OR piso LIKE ? OR capacidad LIKE ? OR observaciones LIKE ?";
    $search_term = "%" . $_GET['search'] . "%"; 
} else {
    $sql = "SELECT * FROM salones";
}

if ($search_term !== null) {
    if ($stmt = $conexion->prepare($sql)) {
        $stmt->bind_param("ssss", $search_term, $search_term, $search_term, $search_term);

        $stmt->execute();
        $resultado = $stmt->get_result(); 
    } else {
        echo 'Error en la preparación de la consulta: ' . $conexion->error;
        exit;
    }
} else {
    $resultado = $conexion->query($sql);
}

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
?>
        <div class="itemListSalones">
            <div class="itemSalones"><?php echo htmlspecialchars($fila["nombre"]); ?></div>
            <div class="itemSalones"><?php echo htmlspecialchars($fila["piso"]); ?></div>
            <div class="itemSalones"><?php echo htmlspecialchars($fila["capacidad"]); ?></div>
            <div class="itemSalones"><?php echo htmlspecialchars($fila["televisor"]); ?></div>
            <div class="itemSalones"><?php echo htmlspecialchars($fila["aire"]); ?></div>
            <div class="itemSalones"><?php echo htmlspecialchars($fila["observaciones"]); ?></div>
            <div class="itemSalones opcList" title="Editar Salón"><span onclick='abrirModalEditar("800px", "<?= htmlspecialchars($fila['id']); ?>","<?= htmlspecialchars($fila['nombre']); ?>","<?= htmlspecialchars($fila['piso']); ?>","<?= htmlspecialchars($fila['capacidad']); ?>","<?= htmlspecialchars($fila['televisor']); ?>","<?= htmlspecialchars($fila['aire']); ?>","<?= htmlspecialchars($fila['observaciones']); ?>")' class="material-symbols-rounded opcEditar">edit_square</span></div>
            <div class="itemSalones opcList" title="Eliminar Salón"><span onclick='abrirModalEliminar("400px", <?= htmlspecialchars($fila['id']); ?>)' class="material-symbols-rounded opcEliminar">delete</span></div>
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