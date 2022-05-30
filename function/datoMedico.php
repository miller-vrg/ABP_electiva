<?php
session_start();

$tipo = $_SESSION['tipo'];
if($tipo == null){
    header("location: ../");
}

$_SESSION["especializacion"] = $_REQUEST["accion"];

header("Location: ../page/listado.php");