<div class="contenedorModal" id="contenedorEliminarDocente">
    <div class="modal" id="modalEliminarDocente">
        <div class="modalHeader">
            <div class="tituloHeader"><span class="material-symbols-rounded">group_add</span>
                <p>Eliminar docente</p>
            </div>
            <button onclick='cerrarModalEliminar()' class="btnCloseModal"><span class="material-symbols-rounded">close</span></button>
        </div>
        <div class="modalBody" id="modalBody">
            <div class="mensajeError">¿Desea eliminar este docente?</div>
            <input type="text" id="inputId" name="inputId">
        </div>
        <div class="modalFooter">
            <input onclick='cerrarModalEliminar()' type="button" class="btnCancelar" value="CANCELAR">
            <input type="submit" id="btnEliminar" class="btnEliminar" value="ELIMINAR">
        </div>
    </div>
</div>