<?php include '../../config/comp.php';?>
<?php include '../../config/database.php'; ?>
<?php if (isset($_POST["nombre"])) {
    $sql = "INSERT INTO docentes (documento, nombre, apellido, email, celular, observaciones)
    VALUES ('" . $_POST["documento"] . "', '" . $_POST["nombre"] . "', '" . $_POST["apellido"] . "', '" . $_POST["email"] . "', '" . $_POST["celular"] . "', '" . $_POST["obs"] . "')";
?>
    <div class="headerModal">
        <div class="titleHeaderModal"><span class="material-symbols-rounded">group_add</span>
            <p>Agregar docente</p>
        </div>
        <div onclick="closeModalForm()" class="btnCloseModal"><span class="material-symbols-rounded">close</span></div>
    </div>
    <?php if ($conexion->query($sql) === TRUE) { ?>
        <div class="bodyModal">
            <div class="msgOk">
                <span class="material-symbols-rounded">check_circle</span>
                <p>- El registro se guardo correctamente -</p>
            </div>
        </div>
        <div class="footerModal">
            <button class="btnCancelModal" onclick="closeModalForm()">CERRAR</button>
            <button class="btnConfirmModal" onclick="openModalForm('agregar.php')">NUEVO</button>
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
            <button class="btnConfirmModal" onclick="openModalForm('agregar.php')">NUEVO</button>
        </div>
    <?php
    }
} else {
    ?>

    <div class="headerModal">
        <div class="titleHeaderModal"><span class="material-symbols-rounded">group_add</span>
            <p>Agregar docente</p>
        </div>
        <div onclick="closeModalForm()" class="btnCloseModal"><span class="material-symbols-rounded">close</span></div>
    </div>
    <div class="bodyModal">
        <div class="labelBox">
            <p>Nombre:</p>
            <span class="labelBoxError" id="errorNombre">Campo obligatorio!!!</span>
        </div>
        <input type="text" class="inputForm" name="nombre" id="nombreDoc" />

        <div class="labelBox">
            <p>Apellido:</p>
            <span class="labelBoxError" id="errorApellido">Campo obligatorio!!!</span>
        </div>
        <input type="text" class="inputForm" name="apellido" id="apellidoDoc" />

        <div class="labelBox">
            <p>Documento de identidad:</p>
            <span class="labelBoxError" id="errorDocumento">Campo obligatorio!!!</span>
        </div>
        <input type="number" class="inputForm" name="documento" id="documentoDoc" />

        <div class="labelBox">
            <p>Celular:</p>
            <span class="labelBoxError" id="errorCelular">Campo obligatorio!!!</span>
        </div>
        <input type="number" class="inputForm" name="celular" id="celularDoc" />

        <div class="labelBox">
            <p>Email:</p>
            <span class="labelBoxError" id="errorEmail">Campo obligatorio!!!</span>
        </div>
        <input type="text" class="inputForm" name="email" id="emailDoc" />

        <div class="labelBox">
            <p>Observaciones:</p>
            <span class="labelBoxError" id="errorObs">Campo obligatorio!!!</span>
        </div>
        <textarea class="inputFormArea" name="observaciones" id="obsDoc"></textarea>

    </div>
    <div class="footerModal">
        <button class="btnCancelModal" onclick="closeModalForm()">CANCELAR</button>
        <button class="btnConfirmModal" onclick="agregarDocente('agregar.php')">AGREGAR</button>
    </div>
<?php } ?>