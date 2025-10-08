<?php include '../config/database.php'; ?>
<!-- modal agregar asignatura -->
<div class="contenedorModal" id="contenedorEditarAsignatura">
    <div class="modal" id="modalEditarAsignatura">
        <div class="modalHeader">
            <div class="tituloHeader"><span class="material-symbols-rounded">dictionary</span>
                <p>Editar nueva asignatura</p>
            </div>
            <button onclick='cerrarModalEditar()' class="btnCloseModal"><span class="material-symbols-rounded">close</span></button>
        </div>
        <form method="post" id="editarForm">
            <div class="modalBody" id="modalBody">
                <div class="contenedoresCuerpo">
                    <div class="cuerpo1">
                        <div class="tituloForm">
                            <p>Nombre:</p>
                            <span id="nombreEr">Campo obligatorio!</span>
                        </div>
                        <input type="text" id="nombreF" name="nombre" class="inputForm">
                        <div class="tituloForm">
                            <p>Año:</p>
                            <span id="anioEr">Campo obligatorio!</span>
                        </div>
                        <div class="select-wrapper">
                            <select id="selectAnioF" name="anio">
                                <option value="">Seleccione una opción</option>
                                <option value="1">Primer año</option>
                                <option value="2">Segundo año</option>
                                <option value="3">Tercer año</option>
                                <option value="4">Cuarto año</option>
                            </select>
                        </div>
                        <div class="tituloForm">
                            <p>Profesor:</p>
                            <span id="profEr">Campo obligatorio!</span>
                        </div>
                        <div class="select-wrapper">
                            <select id="selectProfF" name="profesor">
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
                                        <input type="checkbox" id="chk<?php echo $fila["id"]; ?>" name="carrera[]" value="<?php echo $fila["id"]; ?>"> <span><?php echo $fila["nombre"]; ?></span>
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
                <input type="text" class="inputForm" name="idE" id="idF" style="display: none;">
                <input onclick='cerrarModalEditar()' type="button" class="btnCancelar" value="CANCELAR">
                <input type="submit" class="btnGuardar" value="EDITAR">
            </div>
        </form>
    </div>
</div>
<?php
// Cerrar conexión
$conexion->close();
?>