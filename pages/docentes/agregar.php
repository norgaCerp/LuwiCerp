<?php if (isset($_GET["confirm"])) {
    echo '<p class="pepe">Se guardo el registro!!!</p>';
} else {
?>
    <div class="headerModal">
        <div class="titleHeaderModal"><span class="material-symbols-rounded">group_add</span><p>Agregar docente</p></div>
        <div onclick="closeModalForm()" class="btnCloseModal"><span class="material-symbols-rounded">close</span></div>
    </div>
    <div class="bodyModal">
        <div class="labelBox">
            <p>Nombre:</p>
            <span>Campo obligatorio!!!</span>
        </div>
        <input type="text" class="inputForm" name="nombre" />
        
        <div class="labelBox">
            <p>Apellido:</p>
            <span>Campo obligatorio!!!</span>
        </div>
        <input type="text" class="inputForm" name="apellido" />
        
        <div class="labelBox">
            <p>Documento de identidad:</p>
            <span>Campo obligatorio!!!</span>
        </div>
        <input type="number" class="inputForm" name="documento" />
        
        <div class="labelBox">
            <p>Celular:</p>
            <span>Campo obligatorio!!!</span>
        </div>
        <input type="number" class="inputForm" name="celular" />

        <div class="labelBox">
            <p>Email:</p>
            <span>Campo obligatorio!!!</span>
        </div>
        <input type="text" class="inputForm" name="email" />

        <div class="labelBox">
            <p>Observaciones:</p>
            <span>Campo obligatorio!!!</span>
        </div>
        <textarea class="inputFormArea" name="observaciones"></textarea>

    </div>
    <div class="footerModal">
        <button class="btnCancelModal" onclick="closeModalForm()">CANCELAR</button>
        <button class="btnConfirmModal" onclick="openModalForm('agregar.php?confirm=ok')">AGREGAR</button>
    </div>
<?php
}
?>