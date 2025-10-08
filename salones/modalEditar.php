<div class="contenedorModal" id="contenedorEditarSalon">
    <div class="modal" id="modalEditarSalon">
        <div class="modalHeader">
            <div class="tituloHeader"><span class="material-symbols-rounded">add_home_work</span>
                <p>Editar salón</p>
            </div>
            <button onclick='cerrarModalEditar()' class="btnCloseModal"><span class="material-symbols-rounded">close</span></button>
        </div>
        <form method="post" id="editarForm">
            <div class="modalBody" id="modalBody">
                <div class="modalBodyBox">
                    <div class="leftModalBody">
                        <div class="tituloForm">
                            <p>Nombre:</p>
                            <span id="nombreEr">Campo obligatorio!</span>
                        </div>
                        <input type="text" id="nombreFormF" name="nombre" class="inputForm">

                        <div class="tituloForm">
                            <p>Piso:</p>
                            <span id="pisoEr">Campo obligatorio!</span>
                        </div>
                        <div class="select-wrapper">
                            <select id="selectPisoF" name="piso">
                                <option value="">Seleccione una opción</option>
                                <option value="1">Piso 1</option>
                                <option value="2">Piso 2</option>
                                <option value="3">Piso 3</option>
                                <option value="4">Piso 4</option>
                            </select>
                        </div>
                        <div class="tituloForm">
                            <p>Capacidad:</p>
                            <span id="capacidadEr">Campo obligatorio!</span>
                        </div>
                        <div class="select-wrapper">
                            <select id="selectCapacidadF" name="capacidad">
                                <option value="">Seleccione una opción</option>
                                <option value="Grande">Grande</option>
                                <option value="Media">Media</option>
                                <option value="Chica">Chica</option>
                            </select>
                        </div>
                        <div class="tituloForm">
                            <p>Televisor:</p>
                            <span id="televisorEr">Campo obligatorio!</span>
                        </div>
                        <div class="select-wrapper">
                            <select id="selectTelevisorF" name="televisor">
                                <option value="">Seleccione una opción</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="rightModalBody">
                        <div class="tituloForm">
                            <p>Aire acondicionado:</p>
                            <span id="aireEr">Campo obligatorio!</span>
                        </div>
                        <div class="select-wrapper">
                            <select id="selectAireF" name="aire">
                                <option value="">Seleccione una opción</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="tituloForm tForm">
                            <p>Observaciones:</p>
                            <span id="obsEr">Campo obligatorio!</span>
                        </div>
                        <textarea name="obs" id="obsFormF" class="textAreaF"></textarea>
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