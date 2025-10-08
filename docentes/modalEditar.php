<div class="contenedorModal" id="contenedorEditarDocente">
    <div class="modal" id="modalEditarDocente">
        <div class="modalHeader">
            <div class="tituloHeader"><span class="material-symbols-rounded">group_add</span>
                <p>Editar docente</p>
            </div>
            <button onclick='cerrarModalEditar()' class="btnCloseModal"><span class="material-symbols-rounded">close</span></button>
        </div>
        <form method="post" id="editarForm">
            <div class="modalBody" id="modalBody">
                <div class="tituloForm">
                    <p>Documento:</p>
                    <span>Campo obligatorio!</span>
                </div>
                <!-- agregar el readonly para bloquear la edicion del documento al editar docente -->
                <input type="number" id="documentoF" name="documento" class="inputForm">
                <div class="tituloForm">
                    <p>Nombre:</p>
                    <span>Campo obligatorio!</span>
                </div>
                <input type="text" id="nombreF" name="nombre" class="inputForm">
                <div class="tituloForm">
                    <p>Apellido:</p>
                    <span>Campo obligatorio!</span>
                </div>
                <input type="text" id="apellidoF" name="apellido" class="inputForm">
                <div class="tituloForm">
                    <p>E-mail:</p>
                    <span>Campo obligatorio!</span>
                </div>
                <input type="email" id="emailF" name="email" class="inputForm">
                <div class="tituloForm">
                    <p>Celular:</p>
                    <span>Campo obligatorio!</span>
                </div>
                <input type="number" id="celularF" name="celular" class="inputForm">
                <div class="tituloForm">
                    <p>Observaciones:</p>
                    <span>Campo obligatorio!</span>
                </div>
                <textarea name="obs" id="obsF" class="textAreaForm"></textarea>
            </div>
            <div class="modalFooter">
                <input type="text" class="inputForm" name="idE" id="idF" style="display: none;">
                <input onclick='cerrarModalEditar()' type="button" class="btnCancelar" value="CANCELAR">
                <input type="submit" class="btnGuardar" value="EDITAR">
            </div>
        </form>

    </div>
</div>