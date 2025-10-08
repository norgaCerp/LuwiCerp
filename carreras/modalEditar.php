<div class="contenedorModal" id="contenedorEditarCarrera">
    <div class="modal" id="modalEditarCarrera">
        <div class="modalHeader">
            <div class="tituloHeader"><span class="material-symbols-rounded">school</span>
                <p>Editar carrera</p>
            </div>
            <button onclick='cerrarModalEditar()' class="btnCloseModal"><span class="material-symbols-rounded">close</span></button>
        </div>
        <form method="post" id="editarForm">
            <div class="modalBody" id="modalBody">
                <div class="tituloForm">
                    <p>Nombre:</p>
                    <span id="nombreError">Campo obligatorio!</span>
                </div>
                <input type="text" id="nombreF" name="nombre" class="inputForm">
                <div class="tituloForm">
                    <p>Color: <input id="colorInput1" type="color" value="#336699" aria-label="Selector de color"></p>
                    <span id="colorError">Campo obligatorio!</span>
                </div>
                <input id="hexInput1" name="color" class="inputForm" type="text" maxlength="7" pattern="^#([A-Fa-f0-9]{6})$" value="#336699" aria-label="Valor hexadecimal">
                
            </div>
            <div class="modalFooter">
                <input type="text" class="inputForm" name="idE" id="idF" style="display: none;">
                <input onclick='cerrarModalEditar()' type="button" class="btnCancelar" value="CANCELAR">
                <input type="submit" class="btnGuardar" value="EDITAR">
            </div>
        </form>

    </div>
</div>