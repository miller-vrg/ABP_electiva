<?php
session_start();
require_once "../databases/conexion_db.php";
 $id_user= $_SESSION['user'];
 $id_medico= $_REQUEST['u'];
 $tipo= $_SESSION['especializacion'];
 $fecha =$_REQUEST['fh'];

 if($tipo == null){
     header("location: ../");
 }

 @$fecha = date($fecha);
 @$fecha = strtotime($fecha);
 @$fecha = date("Y-m-d H:i:s", $fecha);

 $sql = "INSERT INTO abp_requerimientos.citas 
 (tipo, fecha_cita, id_user, id_medico) 
  VALUES('$tipo', '$fecha', '$id_user', '$id_medico');";

@$ultimo_id;
if(mysqli_query($conexion, $sql)){
    $ultimo_id = mysqli_insert_id($conexion);


    $sql ="INSERT INTO registros
    (fecha_registro, id_citas)
    VALUES(current_timestamp(), $ultimo_id );";

    if(mysqli_query($conexion, $sql)){
        echo "<script>
                 alert('Registro guardado con exito');
                 location='../page/home-usuario.php'
              </script>";
    }else{
        echo "<script>
        alert('Error al guardar el registro');
        location='../page/home-usuario.php'
     </script>";
    }
}else{
    echo "<script>
    alert('Error al guardar el cita');
    location='../page/home-usuario.php'
 </script>";
}


// @$ultimo_id;
// mysqli_query($conexion, $sql);

//  $ultimo_id = mysqli_insert_id($conexion);
//   echo "<br>".$ultimo_id;

