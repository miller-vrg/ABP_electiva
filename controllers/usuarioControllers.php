<?php 
session_start();
require_once "../databases/conexion_db.php";

$tipo = $_SESSION['tipo'];
$user = $_SESSION['user'];
$telefono = $_REQUEST['telefono'];
$direccion = $_REQUEST['direccion'];
$email = $_REQUEST['email'];

echo "<script>
  var r = confirm('desea guardar los cambios?');
  if( r == false){
    location = '../page/edit.php';
  }
  </script>";

  $sql = "UPDATE $tipo
          SET telefono = '$telefono',
          direccion = '$direccion',
          email = '$email'
          WHERE user = '$user';";

  if($conexion->query($sql) === TRUE){
    $conexion->close();

    $_SESSION['email'] = $email;
    $_SESSION['telefono'] = $telefono;
    $_SESSION['direccion'] = $direccion;

      echo "<script>
      alert('Exito al guardar datos');
      location='../page/home-usuario.php';
    </script>";
      }else{
        // echo "Error: " . $sql . "<br>" . $conn->error;
        $conexion->close();
        echo "<script>
        alert('Error al guardar datos');
        location = '../page/edit.php';";
      }

?>