<?php include '../../config/database.php'; ?>
<div class="headerTableDocentes">
    <div class="titleHeaderTableDocentes">DOCUMENTO</div>
    <div class="titleHeaderTableDocentes">NOMBRE</div>
    <div class="titleHeaderTableDocentes">APELLIDO</div>
    <div class="titleHeaderTableDocentes">E-MAIL</div>
    <div class="titleHeaderTableDocentes">CELULAR</div>
    <div class="titleHeaderTableDocentes">OBSERVACIONES</div>
    <div class="titleHeaderTableDocentes ctrlTable">EDITAR | ELIMINAR</div>
</div>
<?php
// Consulta SQL
if (isset($_GET["search"])) {
    $sql = "SELECT * FROM docentes WHERE nombre LIKE '%" . $_GET['search'] . "%' OR apellido LIKE '%" . $_GET['search'] . "%' OR email LIKE '%" . $_GET['search'] . "%' OR documento LIKE '%" . $_GET['search'] . "%' OR celular LIKE '%" . $_GET['search'] . "%'";
} else {
    $sql = "SELECT * FROM docentes";
}

$resultado = $conexion->query($sql);

// Verificar si hay registros
if ($resultado->num_rows > 0) {
    // Usar while para recorrer los resultados
    while ($fila = $resultado->fetch_assoc()) {
?>

        <!-- div que va dentro del while en php -->
        <div class="rowTableDocente">
            <div class="itemTableDocente"><?php echo $fila["documento"]; ?></div>
            <div class="itemTableDocente"><?php echo $fila["nombre"]; ?></div>
            <div class="itemTableDocente"><?php echo $fila["apellido"]; ?></div>
            <div class="itemTableDocente"><?php echo $fila["email"]; ?></div>
            <div class="itemTableDocente">0<?php echo $fila["celular"]; ?></div>
            <div class="itemTableDocente"><?php echo $fila["observaciones"]; ?></div>
            <div class="itemTableDocente">
                <div class="btnTableBox">
                    <span onclick="openModalForm('editar.php?id=<?= $fila["id"]; ?>')" class="material-symbols-rounded editBtn">edit_document</span>
                    <span onclick="openModalForm('eliminar.php?id=<?= $fila["id"]; ?>')" class="material-symbols-rounded deleteBtn">delete</span>
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
// Cerrar conexión
$conexion->close();
?>