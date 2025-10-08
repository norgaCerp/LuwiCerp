<!-- modal agregar docente -->
<div class="contenedorModal" id="contenedorAgregarCarrera">
    <div class="modal" id="modalAgregarCarrera">
        <div class="modalHeader">
            <div class="tituloHeader"><span class="material-symbols-rounded">school</span>
                <p>Agregar nueva carrera</p>
            </div>
            <button onclick='cerrarModalAgregar()' class="btnCloseModal"><span class="material-symbols-rounded">close</span></button>
        </div>
        <form method="post" id="agregarForm">
            <div class="modalBody" id="modalBody">
                <div class="tituloForm">
                    <p>Nombre:</p>
                    <span id="nombreError">Campo obligatorio!</span>
                </div>
                <input type="text" id="nombreForm" name="nombre" class="inputForm">
                <div class="tituloForm">
                    <p>Color: <input id="colorInput" type="color" value="#336699" aria-label="Selector de color"></p>
                    <span id="colorError">Campo obligatorio!</span>
                </div>
                <input id="hexInput" name="color" class="inputForm" type="text" maxlength="7" pattern="^#([A-Fa-f0-9]{6})$" value="#336699" aria-label="Valor hexadecimal">

            </div>
            <div class="modalFooter">
                <input onclick='cerrarModalAgregar()' type="button" class="btnCancelar" value="CANCELAR">
                <input type="submit" class="btnGuardar" value="AGREGAR">
            </div>
        </form>
    </div>
</div>