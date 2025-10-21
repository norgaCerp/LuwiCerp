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
                <input type="text" class="inputForm" id="buscarAsignas" placeholder="Buscar asignaturas...">
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
                            <div class="itemAsignas" id="it<?php echo htmlspecialchars($fila["id"]); ?>" onclick="selectAsignas(<?php echo htmlspecialchars($fila["id"]); ?>, '<?php echo htmlspecialchars($fila["nombreProfesor"]); ?>')">
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
                <input type="text" id="nomProfV">
                <input type="text" name="asignatura" id="inputAsignas" style="display: none;">
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