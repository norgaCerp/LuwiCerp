<?php
include '../config/database.php';

$sql = "";
$search_term = null;
$resultado = null;

if (isset($_GET["search"]) && !empty($_GET["search"])) {
    $sql = "SELECT * FROM carreras WHERE nombre LIKE ?";
    $search_term = "%" . $_GET['search'] . "%"; 
    
    if ($stmt = $conexion->prepare($sql)) {
        $stmt->bind_param("s", $search_term);

        $stmt->execute();
        $resultado = $stmt->get_result(); 
    } else {
        echo 'Error en la preparación de la consulta: ' . $conexion->error;
        exit;
    }
} else {
    $sql = "SELECT * FROM carreras";
    $resultado = $conexion->query($sql);
}

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
?>
        <div class="item" style="background-color: <?php echo htmlspecialchars($fila["color"]); ?>;">
            <div class="itemShadow">
                <div class="itemTop">
                    <p class="titleCarrera"><?php echo htmlspecialchars($fila["nombre"]); ?></p>
                </div>
                <div class="itemBot">
                    <button class="btnCarreraEdit" onclick='abrirModalEditar("500px", "<?= htmlspecialchars($fila['id']); ?>","<?= htmlspecialchars($fila['nombre']); ?>","<?= htmlspecialchars($fila['color']); ?>")'>
                        <span class="material-symbols-rounded">edit_square</span>
                    </button>
                    <button class="btnCarreraDel" onclick='abrirModalEliminar("400px", <?= htmlspecialchars($fila['id']); ?>)'>
                        <span class="material-symbols-rounded">delete</span>
                    </button>
                </div>
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

// Cerrar la conexión
$conexion->close();
?>