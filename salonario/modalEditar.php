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
                    <input type="text" class="inputForm" id="buscarAsignasE" placeholder="Buscar asignaturas...">
                    <div class="contenedorAsignas">
                        <?php
                        $sql = "SELECT 
                            a.id,
                            a.nombre, 
                            CONCAT(d.nombre, ' ', d.apellido) AS nombreProfesor ,
                            GROUP_CONCAT(DISTINCT c.nombre SEPARATOR ', ') AS carreras
                        FROM asignaturas a 
                            INNER JOIN docentes d ON a.idProfesor=d.id
                            INNER JOIN carreras_asignaturas ca ON a.id = ca.idAsignatura
                            INNER JOIN carreras c ON ca.idCarrera = c.id
                            GROUP BY a.id, a.nombre, d.nombre, d.apellido
                    ";
                        $resultado = $conexion->query($sql);
                        if ($resultado->num_rows > 0) {
                            while ($fila = $resultado->fetch_assoc()) {
                        ?>
                                <div class="itemAsignas" id="itE<?php echo htmlspecialchars($fila["id"]); ?>" onclick="selectAsignasE(<?php echo htmlspecialchars($fila["id"]); ?>, '<?php echo htmlspecialchars($fila["nombreProfesor"]); ?>')">
                                    <p class="nombreAsignas"><?php echo htmlspecialchars($fila["nombre"]); ?></p>
                                    <p class="profAsignas">Prof: <?php echo htmlspecialchars($fila["nombreProfesor"]); ?></p>
                                    <p class="carrerasAsignas"><span>Carreras:</span> <?php echo htmlspecialchars($fila["carreras"]); ?></p>
                                </div>
                            <?php
                            }
                        } else {
                            ?>
                            <div>No hay registro</div>
                        <?php
                        }
                        ?>
                    </div>
                    <input type="text" id="nomProfE">
                    <input type="text" name="asignaturaE" id="inputAsignasE" style="display: none;">
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