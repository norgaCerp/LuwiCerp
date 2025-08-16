<?php if (isset($_GET["confirm"])) {
    echo '<p class="pepe">Se guardo el registro!!!</p>';
} else {
?>
    <div class="headerModal">
        <div class="titleHeaderModal"><span class="material-symbols-rounded">group_add</span><p>Agregar docente</p></div>
        <div onclick="closeModalForm()" class="btnCloseModal"><span class="material-symbols-rounded">close</span></div>
    </div>
    <div class="bodyModal">

    </div>
    <div class="footerModal">
        <button onclick="openModalForm('agregar.php?confirm=ok')">guardar</button>
    </div>
<?php
}
?>