<?php include '../config/database.php'; ?>
<!-- modal agregar asignatura -->
<div class="contenedorModal" id="contenedorAgregarAsignatura">
    <div class="modal" id="modalAgregarAsignatura">
        <div class="modalHeader">
            <div class="tituloHeader"><span class="material-symbols-rounded">dictionary</span>
                <p>Agregar nueva asignatura</p>
            </div>
            <button onclick='cerrarModalAgregar()' class="btnCloseModal"><span class="material-symbols-rounded">close</span></button>
        </div>
        <form method="post" id="agregarForm">
            <div class="modalBody" id="modalBody">
                <div class="contenedoresCuerpo">
                    <div class="cuerpo1">
                        <div class="tituloForm">
                            <p>Nombre:</p>
                            <span id="nombreError">Campo obligatorio!</span>
                        </div>
                        <input type="text" id="nombreForm" name="nombre" class="inputForm">
                        <div class="tituloForm">
                            <p>Año:</p>
                            <span id="anioError">Campo obligatorio!</span>
                        </div>
                        <div class="select-wrapper">
                            <select id="selectAnio" name="anio">
                                <option value="">Seleccione una opción</option>
                                <option value="1">Primer año</option>
                                <option value="2">Segundo año</option>
                                <option value="3">Tercer año</option>
                                <option value="4">Cuarto año</option>
                            </select>
                        </div>
                        <div class="tituloForm">
                            <p>Profesor:</p>
                            <span id="profError">Campo obligatorio!</span>
                        </div>
                        <div class="select-wrapper">
                            <select id="selectProf" name="profesor">
                                <option value="">Seleccione una opción</option>
                                <?php
                                $sql = "SELECT * FROM docentes";
                                $resultado = $conexion->query($sql);
                                if ($resultado->num_rows > 0) {
                                    // Usar while para recorrer los resultados
                                    while ($fila = $resultado->fetch_assoc()) {
                                    ?>

                                        <option value="<?php echo $fila["id"]; ?>"><?php echo $fila["nombre"]; ?> <?php echo $fila["apellido"]; ?></option>
                            
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
                    <div class="cuerpo2">
                        <div class="titleCuerpo2">
                            <span class="material-symbols-rounded">playlist_add</span>
                            <p>Lista de carreras</p>
                        </div>
                        <div class="contenedorLista">
                            <?php
                            $sql = "SELECT * FROM carreras";
                            $resultado = $conexion->query($sql);
                            if ($resultado->num_rows > 0) {
                                // Usar while para recorrer los resultados
                                while ($fila = $resultado->fetch_assoc()) {
                            ?>
                                    <label>
                                        <input type="checkbox" name="carrera[]" value="<?php echo $fila["id"]; ?>"> <span><?php echo $fila["nombre"]; ?></span>
                                    </label>
                                <?php
                                }
                            } else {
                                ?>
                                <p>- No hay registros -</p>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
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
// Cerrar conexión
$conexion->close();
?>