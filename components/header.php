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
<header class="headerPrincipal">
    <div class="leftHeader">
        <div class="logo"><span class="material-symbols-rounded">source_environment</span></div>
    </div>
    <div class="centerHeader">
        <div onclick="window.location.href='../inicio/'" class="menuItem <?= $inicio; ?>"><span class="material-symbols-rounded">home</span>
            <p>Inicio</p>
        </div>
        <div onclick="window.location.href='../docentes/'" class="menuItem <?= $docente; ?>"><span class="material-symbols-rounded">group_add</span>
            <p>Docentes</p>
        </div>
        <div onclick="window.location.href='../salones/'" class="menuItem <?= $salones; ?>"><span class="material-symbols-rounded">domain_add</span>
            <p>Salones</p>
        </div>
        <div onclick="window.location.href='../carreras/'" class="menuItem <?= $carreras; ?>"><span class="material-symbols-rounded">school</span>
            <p>Carreras</p>
        </div>
        <div onclick="window.location.href='../salonario/'" class="menuItem <?= $salonario; ?>"><span class="material-symbols-rounded">calendar_month</span>
            <p>Salonario</p>
        </div>
        <div onclick="window.location.href='../ayuda/'" class="menuItem <?= $ayuda; ?>"><span class="material-symbols-rounded">book_4</span>
            <p>Ayuda</p>
        </div>
    </div>
    <div class="rightHeader">
        <button class="btnSesion"><span class="material-symbols-rounded">logout</span></button>
    </div>
</header>