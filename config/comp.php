<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: http://localhost/luwiCerp/"); // si no está logueado, vuelve al login
    exit;
}
?>