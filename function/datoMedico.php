<?php
session_start();
require_once "../databases/conexion_db.php";

$tipo = $_SESSION['tipo'];
if($tipo == null){
    header("location: ../");
}

$_SESSION["especializacion"] = $_REQUEST["accion"];

header("Location: ../page/listado.php");