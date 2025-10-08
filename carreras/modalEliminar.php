<div class="contenedorModal" id="contenedorEliminarCarrera">
    <div class="modal" id="modalEliminarCarrera">
        <div class="modalHeader">
            <div class="tituloHeader"><span class="material-symbols-rounded">school</span>
                <p>Eliminar carrera</p>
            </div>
            <button onclick='cerrarModalEliminar()' class="btnCloseModal"><span class="material-symbols-rounded">close</span></button>
        </div>
        <div class="modalBody" id="modalBody">
            <div class="mensajeError">¿Desea eliminar esta carrera?</div>
            <input type="text" id="inputId" name="inputId">
        </div>
        <div class="modalFooter">
            <input onclick='cerrarModalEliminar()' type="button" class="btnCancelar" value="CANCELAR">
            <input type="submit" id="btnEliminarCarrera" class="btnEliminar" value="ELIMINAR">
        </div>
    </div>
</div>