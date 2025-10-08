<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: http://localhost/appSalones/"); // si no está logueado, vuelve al login
    exit;
}
?>