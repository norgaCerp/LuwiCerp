<?php include '../../config/database.php'; ?>
<?php if (isset($_POST["nombre"])) {
    $sql = "UPDATE docentes SET documento='" . $_POST["documento"] . "', nombre='" . $_POST["nombre"] . "', apellido='" . $_POST["apellido"] . "', email='" . $_POST["email"] . "', celular='" . $_POST["celular"] . "', observaciones='" . $_POST["obs"] . "' WHERE id='" . $_GET["id"] . "'";
    
?>
    <div class="headerModal">
        <div class="titleHeaderModal"><span class="material-symbols-rounded">group_add</span>
            <p>Editar docente</p>
        </div>
        <div onclick="closeModalForm()" class="btnCloseModal"><span class="material-symbols-rounded">close</span></div>
    </div>
    <?php if ($conexion->query($sql) === TRUE) { ?>
        <div class="bodyModal">
            <div class="msgOk">
                <span class="material-symbols-rounded">check_circle</span>
                <p>- El registro se edito correctamente -</p>
            </div>
        </div>
        <div class="footerModal">
            <button class="btnCancelModal" onclick="closeModalForm()">CERRAR</button>
            
        </div>
    <?php } else { ?>
        <div class="bodyModal">
            <div class="msgOk">
                <span class="material-symbols-rounded">check_circle</span>
                <p>- Hubo un error -</p>
            </div>
        </div>
        <div class="footerModal">
            <button class="btnCancelModal" onclick="closeModalForm()">CERRAR</button>
        </div>
    <?php
    }
} else {
    $sqlEdit="SELECT * FROM docentes WHERE id='".$_GET["id"]."'";
    $resultadoEdit=$conexion->query($sqlEdit);
    $fila=$resultadoEdit->fetch_assoc();
    ?>

    <div class="headerModal">
        <div class="titleHeaderModal"><span class="material-symbols-rounded">group_add</span>
            <p>Editar docente</p>
        </div>
        <div onclick="closeModalForm()" class="btnCloseModal"><span class="material-symbols-rounded">close</span></div>
    </div>
    <div class="bodyModal">
        <div class="labelBox">
            <p>Nombre:</p>
            <span class="labelBoxError" id="errorNombre">Campo obligatorio!!!</span>
        </div>
        <input type="text" class="inputForm" value="<?=$fila["nombre"] ;?>" name="nombre" id="nombreDoc" />

        <div class="labelBox">
            <p>Apellido:</p>
            <span class="labelBoxError" id="errorApellido">Campo obligatorio!!!</span>
        </div>
        <input type="text" class="inputForm" value="<?=$fila["apellido"] ;?>" name="apellido" id="apellidoDoc" />

        <div class="labelBox">
            <p>Documento de identidad:</p>
            <span class="labelBoxError" id="errorDocumento">Campo obligatorio!!!</span>
        </div>
        <input type="number" class="inputForm" value="<?=$fila["documento"] ;?>" name="documento" id="documentoDoc" />

        <div class="labelBox">
            <p>Celular:</p>
            <span class="labelBoxError" id="errorCelular">Campo obligatorio!!!</span>
        </div>
        <input type="number" class="inputForm" value="<?=$fila["celular"] ;?>" name="celular" id="celularDoc" />

        <div class="labelBox">
            <p>Email:</p>
            <span class="labelBoxError" id="errorEmail">Campo obligatorio!!!</span>
        </div>
        <input type="text" class="inputForm" value="<?=$fila["email"] ;?>" name="email" id="emailDoc" />

        <div class="labelBox">
            <p>Observaciones:</p>
            <span class="labelBoxError" id="errorObs">Campo obligatorio!!!</span>
        </div>
        <textarea class="inputFormArea" name="observaciones" id="obsDoc"><?=$fila["observaciones"] ;?></textarea>

    </div>
    <div class="footerModal">
        <button class="btnCancelModal" onclick="closeModalForm()">CANCELAR</button>
        <button class="btnConfirmModal" onclick="agregarDocente('editar.php?id=<?=$fila["id"] ;?>')">EDITAR</button>
    </div>
<?php } ?>