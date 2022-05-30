<?php
session_start();

$_SESSION["especializacion"] = $_REQUEST["accion"];

header("Location: ../page/listado.php");