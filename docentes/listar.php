<?php include '../config/database.php'; ?>

<?php
if (isset($_GET["search"]) && $_GET["search"] !== "") {
    $sql = "SELECT * 
            FROM docentes 
            WHERE nombre LIKE ? 
               OR apellido LIKE ? 
               OR email LIKE ? 
               OR documento LIKE ? 
               OR celular LIKE ?";

    $stmt = $conexion->prepare($sql);

    $search = "%" . $_GET["search"] . "%";

    $stmt->bind_param("sssss", $search, $search, $search, $search, $search);

    $stmt->execute();
    $resultado = $stmt->get_result();
} else {
    $sql = "SELECT * FROM docentes";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $resultado = $stmt->get_result();
}

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        ?>

        <div class="itemListDocente">
            <div class="itemDocente"><?php echo $fila["documento"]; ?></div>
            <div class="itemDocente"><?php echo $fila["nombre"]; ?></div>
            <div class="itemDocente"><?php echo $fila["apellido"]; ?></div>
            <div class="itemDocente"><?php echo $fila["email"]; ?></div>
            <div class="itemDocente">0<?php echo $fila["celular"]; ?></div>
            <div class="itemDocente"><?php echo $fila["observaciones"]; ?></div>
            <div class="itemDocente opcList" title="Editar Docente"><span onclick='abrirModalEditar("500px", "<?= $fila['id']; ?>","<?= $fila['nombre']; ?>","<?= $fila['apellido']; ?>","<?= $fila['documento']; ?>","<?= $fila['email']; ?>","<?= $fila['celular']; ?>","<?= $fila['observaciones']; ?>")' class="material-symbols-rounded opcEditar">edit_square</span></div>
            <div class="itemDocente opcList" title="Eliminar Docente"><span onclick='abrirModalEliminar("400px", <?= $fila['id']; ?>)' class="material-symbols-rounded opcEliminar">delete</span></div>
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
$stmt->close();
?> 