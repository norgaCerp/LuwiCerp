<!-- modal agregar docente -->
<div class="contenedorModal" id="contenedorAgregarDocente">
    <div class="modal" id="modalAgregarDocente">
        <div class="modalHeader">
            <div class="tituloHeader"><span class="material-symbols-rounded">group_add</span>
                <p>Agregar nuevo docente</p>
            </div>
            <button onclick='cerrarModalAgregar()' class="btnCloseModal"><span class="material-symbols-rounded">close</span></button>
        </div>
        <form method="post" id="agregarForm">
            <div class="modalBody" id="modalBody">
                <div class="tituloForm">
                    <p>Documento:</p>
                    <span id="documentoError">Campo obligatorio!</span>
                </div>
                <input type="number" id="documentoForm" name="documento" class="inputForm">
                <div class="tituloForm">
                    <p>Nombre:</p>
                    <span id="nombreError">Campo obligatorio!</span>
                </div>
                <input type="text" id="nombreForm" name="nombre" class="inputForm">
                <div class="tituloForm">
                    <p>Apellido:</p>
                    <span id="apellidoError">Campo obligatorio!</span>
                </div>
                <input type="text" id="apellidoForm" name="apellido" class="inputForm">
                <div class="tituloForm">
                    <p>E-mail:</p>
                    <span id="emailError">Campo obligatorio!</span>
                </div>
                <input type="email" id="emailForm" name="email" class="inputForm">
                <div class="tituloForm">
                    <p>Celular:</p>
                    <span id="celularError">Campo obligatorio!</span>
                </div>
                <input type="number" id="celularForm" name="celular" class="inputForm">
                <div class="tituloForm">
                    <p>Observaciones:</p>
                    <span id="obsError">Campo obligatorio!</span>
                </div>
                <textarea name="obs" id="obsForm" class="textAreaForm"></textarea>
            </div>
            <div class="modalFooter">
                <input onclick='cerrarModalAgregar()' type="button" class="btnCancelar" value="CANCELAR">
                <input type="submit" class="btnGuardar" value="AGREGAR">
            </div>
        </form>
    </div>
</div>