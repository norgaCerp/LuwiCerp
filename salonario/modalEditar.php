<?php include '../config/database.php'; ?>
<div class="contenedorModal" id="contenedorEditarAsignacion">
    <div class="modal" id="modalEditarAsignacion">
        <div class="modalHeader">
            <div class="tituloHeader"><span class="material-symbols-rounded">calendar_month</span>
                <p>Editar asignacion</p>
            </div>
            <button onclick='cerrarModalEditar()' class="btnCloseModal"><span class="material-symbols-rounded">close</span></button>
        </div>
        <form method="post" id="editarForm">
            <div class="modalBody" id="modalBody">
                <input type="text" name="dia" id="diaFormE" style="display: none;">
                <input type="text" name="semestre" id="semestreFormE" style="display: none;">
                <input type="text" name="orden" id="ordenFormE" style="display: none;">
                <input type="text" name="salon" id="salonFormE" style="display: none;">
                <div class="tituloForm">
                    <p>Asignatura:</p>
                    <span id="asigErEditar">Campo obligatorio!</span>
                </div>
                <div class="select-wrapper">
                    <select id="selectAsigE" name="asignaturaE">
                        <option value="">Seleccione una opción</option>
                        <?php
                        $sql = "SELECT * FROM asignaturas";
                        $resultado = $conexion->query($sql);
                        if ($resultado->num_rows > 0) {
                            // Usar while para recorrer los resultados
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
                <div class="modalFooterInner">
                    <button class="btnEliminarAsig" id="btnEliminarAsig">
                        <span class="material-symbols-rounded">delete</span>
                    </button>
                    <div class="btnBoxFooter">
                        <input type="text" class="inputForm" name="idE" id="idF" style="display: none;">
                        <input onclick='cerrarModalEditar()' type="button" class="btnCancelar" value="CANCELAR">
                        <input type="submit" class="btnGuardar" value="EDITAR">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
// Cerrar conexión
$conexion->close();
?>