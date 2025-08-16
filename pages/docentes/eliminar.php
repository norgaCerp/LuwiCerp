<?php include '../../config/database.php'; ?>
<?php if (isset($_GET["id"]) AND isset($_GET["confirm"])) { 
    $sql = "DELETE FROM docentes WHERE id=".$_GET["id"]."";
    $resultado = $conexion->query($sql);
}else{
?>
    
<div class="headerModal">
    <div class="titleHeaderModal"><span class="material-symbols-rounded">delete</span>
        <p>Eliminar docente</p>
    </div>
    <div onclick="closeModalForm()" class="btnCloseModal"><span class="material-symbols-rounded">close</span></div>
</div>

<div class="bodyModal">
    <div class="msgDelete">
        <p>- ¿Desea eliminar este registro? -</p>
    </div>
</div>
<div class="footerModal">
    <button class="btnCancelModal" onclick="closeModalForm()">CANCELAR</button>
    <button class="btnDeleteModal" onclick="openModalForm('eliminar.php?id=<?= $_GET["id"]; ?>&&confirm=1'); closeModalForm(); buscar('');">ELIMINAR</button>
</div>

<?php }
$conexion->close();
?>