<?php
session_start();

$_SESSION["expecializacion"] = $_REQUEST["accion"];

header("Location: ../page/listado.php");