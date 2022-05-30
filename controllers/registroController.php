<?php 
session_start();
require_once "../databases/conexion_db.php";

$user = $_REQUEST['user'];
$name = $_REQUEST['name'];
$apellidos = $_REQUEST['apellidos'];
$edad = $_REQUEST['edad'];
$cc = $_REQUEST['cc'];
$telefono = $_REQUEST['telefono'];
$direccion = $_REQUEST['direccion'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

$tipo = $_SESSION['tipo'];
if($tipo == null){
    header("location: ../");
}

  $sql = "INSERT INTO `usuarios` (`user`, `password`, `name`, `apellidos`, `edad`, `cc`, `telefono`, `direccion`, `email`) VALUES ('".$user."', '".$password."', '".$name."', '".$apellidos."', '".$edad."', '".$cc."', '".$telefono."', '".$direccion."', '".$email."');";

  if($conexion->query($sql) === TRUE){
    $conexion->close();

        echo "<script>
        alert('Exito al guardar datos');
        location='../index.html';
        </script>";
      }else{
        // echo "Error: " . $sql . "<br>" . $conn->error;
        $conexion->close();
        echo "<script>
        alert('Error al guardar datos');
        location = '../page/edit.php';";
      }

?>