<?php include '../config/database.php'; ?>
<div class="contenedorModal" id="contenedorAgregarAsignacion">
    <div class="modal" id="modalAgregarAsignacion">
        <div class="modalHeader">
            <div class="tituloHeader"><span class="material-symbols-rounded">calendar_month</span>
                <p>Agregar nueva asignacion</p>
            </div>
            <button onclick='cerrarModalAgregar()' class="btnCloseModal"><span class="material-symbols-rounded">close</span></button>
        </div>
        <form method="post" id="agregarForm">
            <div class="modalBody" id="modalBody">
                <input type="text" name="dia" id="diaForm" style="display: none;">
                <input type="text" name="semestre" id="semestreForm" style="display: none;">
                <input type="text" name="orden" id="ordenForm" style="display: none;">
                <input type="text" name="salon" id="salonForm" style="display: none;">
                <div class="tituloForm">
                    <p>Asignatura:</p>
                    <span id="asigEr">Campo obligatorio!</span>
                </div>
                <div class="select-wrapper">
                    <select id="selectAsigA" name="asignatura">
                        <option value="">Seleccione una opción</option>
                        <?php
                        $sql = "SELECT * FROM asignaturas";
                        $resultado = $conexion->query($sql);
                        if ($resultado->num_rows > 0) {
                            while ($fila = $resultado->fetch_assoc()) {
                        ?>
                                <option value="<?php echo htmlspecialchars($fila["id"]); ?>"><?php echo htmlspecialchars($fila["nombre"]); ?></option>
                        <?php
                            }
                        } else {
                        ?>
                            <option value="">No hay registro</option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="modalFooter">
                <input onclick='cerrarModalAgregar()' type="button" class="btnCancelar" value="CANCELAR">
                <input type="submit" class="btnGuardar" value="AGREGAR">
            </div>
        </form>
    </div>
</div>
<?php
$conexion->close();
?>