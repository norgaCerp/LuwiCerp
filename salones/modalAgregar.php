<!-- modal agregar docente -->
<div class="contenedorModal" id="contenedorAgregarSalon">
    <div class="modal" id="modalAgregarSalon">
        <div class="modalHeader">
            <div class="tituloHeader"><span class="material-symbols-rounded">add_home_work</span>
                <p>Agregar nuevo salón</p>
            </div>
            <button onclick='cerrarModalAgregar()' class="btnCloseModal"><span class="material-symbols-rounded">close</span></button>
        </div>
        <form method="post" id="agregarForm">
            <div class="modalBody" id="modalBody">
                <div class="modalBodyBox">
                    <div class="leftModalBody">
                        <div class="tituloForm">
                            <p>Nombre:</p>
                            <span id="nombreError">Campo obligatorio!</span>
                        </div>
                        <input type="text" id="nombreForm" name="nombre" class="inputForm">

                        <div class="tituloForm">
                            <p>Piso:</p>
                            <span id="pisoError">Campo obligatorio!</span>
                        </div>
                        <div class="select-wrapper">
                            <select id="selectPiso" name="piso">
                                <option value="">Seleccione una opción</option>
                                <option value="1">Piso 1</option>
                                <option value="2">Piso 2</option>
                                <option value="3">Piso 3</option>
                                <option value="4">Piso 4</option>
                            </select>
                        </div>
                        <div class="tituloForm">
                            <p>Capacidad:</p>
                            <span id="capacidadError">Campo obligatorio!</span>
                        </div>
                        <div class="select-wrapper">
                            <select id="selectCapacidad" name="capacidad">
                                <option value="">Seleccione una opción</option>
                                <option value="Grande">Grande</option>
                                <option value="Media">Media</option>
                                <option value="Chica">Chica</option>
                            </select>
                        </div>
                        <div class="tituloForm">
                            <p>Televisor:</p>
                            <span id="televisorError">Campo obligatorio!</span>
                        </div>
                        <div class="select-wrapper">
                            <select id="selectTelevisor" name="televisor">
                                <option value="">Seleccione una opción</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="rightModalBody">
                        <div class="tituloForm">
                            <p>Aire acondicionado:</p>
                            <span id="aireError">Campo obligatorio!</span>
                        </div>
                        <div class="select-wrapper">
                            <select id="selectAire" name="aire">
                                <option value="">Seleccione una opción</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="tituloForm tForm">
                            <p>Observaciones:</p>
                            <span id="obsError">Campo obligatorio!</span>
                        </div>
                        <textarea name="obs" id="obsForm" class="textAreaF"></textarea>
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