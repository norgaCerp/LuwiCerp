<div onclick="closeModalForm()" class="btnCloseModal"><span class="material-symbols-rounded">close</span></div>
<?php if(isset($_GET["confirm"])){
    echo '<p>Se guardo el registro!!!</p>';
}else{
    ?>
    <p>Formulario agregar</p>
    <button onclick="openModalForm('agregar.php?confirm=ok')">guardar</button>
    <?php
}
?>