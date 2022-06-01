<?php 
session_start();
require_once "../databases/conexion_db.php";

$user = $_REQUEST['user'];
$password = $_REQUEST['password'];

$sql = "SELECT * FROM usuarios 
WHERE user = '$user' 
and password = '$password';";

$rows = mysqli_query($conexion,$sql);

if(mysqli_num_rows($rows) > 0 ){
    $_SESSION['tipo'] = "usuarios";

    while($data = mysqli_fetch_assoc($rows)){

        $_SESSION['user'] = $user;
        $_SESSION['name'] = $data['name']." ".$data['apellidos'];
        $_SESSION['edad'] = $data['edad'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['telefono'] = $data['telefono'];
        $_SESSION['direccion'] = $data['direccion'];
        $_SESSION['cc'] = $data['cc'];
        }

    header("location: ../page/home-usuario.php");
}else{

    $sql = "SELECT * FROM medicos 
    WHERE user = '$user' 
    and password = '$password';";

    $rows = mysqli_query($conexion,$sql);
        
    if(mysqli_num_rows($rows) > 0 ){
        $_SESSION['tipo'] = "medicos";
        while($data = mysqli_fetch_assoc($rows)){
    
            $_SESSION['user'] = $user;
            $_SESSION['name'] = $data['name']." ".$data['apellidos'];
            $_SESSION['edad'] = $data['edad'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['telefono'] = $data['telefono'];
            $_SESSION['direccion'] = $data['direccion'];
           $_SESSION['espe'] = $data['especializacion'];
            }
    
        header("location: ../page/mostrar-datos-doctor.php");
    }else{
             echo "<script>
                 alert('Usuario o contraseña invalido');
                 location = '../';
              </script>";
    }
}

?>