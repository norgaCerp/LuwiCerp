<?php include '../config/database.php'; ?>
<div class="contenedorModal" id="contenedorBuscarProf">
    <div class="modal" id="modalBuscarProf">
        <div class="modalHeader">
            <div class="tituloHeader"><span class="material-symbols-rounded">group_add</span>
                <p>Buscar docente</p>
            </div>
            <button onclick='closeModalBuscarDocente()' class="btnCloseModal"><span class="material-symbols-rounded">close</span></button>
        </div>
        <div class="modalBody" id="modalBody">
            <div class="contenedorInpDoc">
                <input type="text" id="inputBuscarDoc" name="inputBuscarDoc" class="inputForm" placeholder="Ingrese el nombre del docente...">
            </div>
            <div class="listaDoc">
                <input type="text" name="accion" id="accion" style="display: none;"> 
                <div class="listaDocIn">
                    <?php
                    $sql = "SELECT * FROM docentes";
                    $resultado = $conexion->query($sql);
                    if ($resultado->num_rows > 0) {
                        // Usar while para recorrer los resultados
                        while ($fila = $resultado->fetch_assoc()) {
                    ?>
                            <div onclick="docenteSeleccionado(<?php echo $fila['id']; ?>, '<?php echo addslashes(htmlspecialchars($fila['nombre'].' '.$fila['apellido'], ENT_QUOTES)); ?>')" class="btnDoc">- <?php echo htmlspecialchars($fila['nombre'].' '.$fila['apellido']); ?></div>
                        <?php
                        }
                    } else {
                        ?>
                        <p>No hay registro</p>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="modalFooter">
            <input onclick='closeModalBuscarDocente()' type="button" class="btnCancelar" value="CANCELAR">
            <input type="button" id="btnEliminar" class="btnEliminar" value="AGREGAR">
        </div>
    </div>
</div>