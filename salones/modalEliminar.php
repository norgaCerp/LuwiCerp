<div class="contenedorModal" id="contenedorEliminarSalon">
    <div class="modal" id="modalEliminarSalon">
        <div class="modalHeader">
            <div class="tituloHeader"><span class="material-symbols-rounded">add_home_work</span>
                <p>Eliminar Salon</p>
            </div>
            <button onclick='cerrarModalEliminar()' class="btnCloseModal"><span class="material-symbols-rounded">close</span></button>
        </div>
        <div class="modalBody" id="modalBody">
            <div class="mensajeError">¿Desea eliminar este salón?</div>
            <input type="text" id="inputId" name="inputId">
        </div>
        <div class="modalFooter">
            <input onclick='cerrarModalEliminar()' type="button" class="btnCancelar" value="CANCELAR">
            <input type="submit" id="btnEliminar" class="btnEliminar" value="ELIMINAR">
        </div>
    </div>
</div>