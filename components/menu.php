<?php
if ($titlePage === 'Inicio') {
    $inicio = 'menuActive';
} elseif ($titlePage === 'Docentes') {
    $docente = 'menuActive';
} elseif ($titlePage === 'Salones') {
    $salones = 'menuActive';
} elseif ($titlePage === 'Carreras') {
    $carreras = 'menuActive';
} elseif ($titlePage === 'Salonario') {
    $salonario = 'menuActive';
} elseif ($titlePage === 'Ayuda') {
    $ayuda = 'menuActive';
}
?>
<section class="menuBoxContenedor" id="menuBoxContenedor">
    <div class="menuBox" id="menuBox">
        <div class="topMenu">
            <div class="logoMenuBox">
                <div class="logoMenuSidebar"><span class="material-symbols-rounded">source_environment</span></div>
                <div class="titleMenuSidebar">
                    <p>Salones App</p>
                    <span>Cerp - Salto</span>
                </div>
                <span onclick="closeMenu()" class="material-symbols-rounded btnCloseSidebar">close</span>
            </div>
            <div class="menuItemBox">
                <div onclick="window.location.href='../inicio/'" class="menuItem <?= $inicio; ?>">
                    <span class="material-symbols-rounded">home</span>
                    <p>Inicio</p>
                </div>
                <div onclick="window.location.href='../docentes/'" class="menuItem <?= $docente; ?>">
                    <span class="material-symbols-rounded">group_add</span>
                    <p>Docentes</p>
                </div>
                <div onclick="window.location.href='../salones/'" class="menuItem <?= $salones; ?>">
                    <span class="material-symbols-rounded">add_home_work</span>
                    <p>Salones</p>
                </div>
                <div onclick="window.location.href='../carreras/'" class="menuItem <?= $carreras; ?>">
                    <span class="material-symbols-rounded">school</span>
                    <p>Carreras</p>
                </div>
                <div onclick="window.location.href='../salonario/'" class="menuItem <?= $salonario; ?>">
                    <span class="material-symbols-rounded">calendar_add_on</span>
                    <p>Salonario</p>
                </div>
                <div onclick="window.location.href='../ayuda/'" class="menuItem <?= $ayuda; ?>">
                    <span class="material-symbols-rounded">book_2</span>
                    <p>Ayuda</p>
                </div>
            </div>
        </div>
        <div class="bottomMenu">
            <button class="btnSesion"><span class="material-symbols-rounded">chip_extraction</span>
                <p>CERRAR SESION</p>
            </button>
        </div>
    </div>
</section>

<script>
    function openMenu() {
        $('#menuBoxContenedor').fadeIn("fast");
        $('#menuBox').animate({
            left: '0px'
        }, 50);
        $('body').css('overflow', 'hidden');
    }

    function closeMenu() {
        $('#menuBox').animate({
            left: '-260px'
        }, 50);
        $('#menuBoxContenedor').fadeOut("fast");
        $('body').css('overflow', 'auto');
    }
</script>