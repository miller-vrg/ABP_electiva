<?php
session_start();
require_once "../databases/conexion_db.php";

$tipo = $_SESSION['tipo'];
if($tipo == null){
    header("location: ../");
}
$user = $_SESSION['user'];

$con = 1;

$sql = "SELECT DISTINCTROW  name,
apellidos, 
tipo, 
fecha_cita, 
fecha_registro,
estado
FROM citas, registros,medicos
WHERE id_user = '".$user."'  
AND id_citas = citas.id
AND id_medico = medicos.`user`;";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.:: Registros ::.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/style-registros.css">
</head>
<body onload="print()">
    <section class = "container">
        <p>Reporte del señor(a) <b><?= $_SESSION['name']?></b>, identificado con el numero de cc: <b><?= $_SESSION['cc']?></b></p>
    <table BORDER CELLPADDING=10 CELLSPACING=0>
                  <tr>
                      <th class="encabezado" id="n">N°</th>
                      <th class="encabezado" id="medico">Medico</th>
                      <th class="encabezado" id="tipo">Tipo</th>
                      <th class="encabezado" id="estado">Estado</th>
                      <th class="encabezado" id="hora">Fecha cita</th>
                      <th class="encabezado" id="asignacion">Asignación</th>
                  </tr>
                  <?php 
                      $rows = mysqli_query($conexion,$sql);
                      if(mysqli_num_rows($rows) > 0 ){
                  
                          while($data = mysqli_fetch_assoc($rows)){
                  
                        echo <<<pp
                                <tr>
                                <td>{$con}</td>
                                <td>{$data['name']} {$data['apellidos']}</td>
                                <td>{$data['tipo']}</td>
                                <td>{$data['estado']}</td>
                                 <td>{$data['fecha_registro']}</td>
                                <td>{$data['fecha_cita']}</td>
                               
                                </tr>
pp ;                                                                                    
                              $con ++;
                              }
                              if($con < 1){
                                
                                  echo "<script>
                                          alert('Usted no tiene registros');
                                          location = '../page/home-usuario.php';
                                       </script>";
                              }
                          
                      }else{
                          echo "<script>
                                  alert('error al cargar registro');
                              </script>";
                      }
                  ?>
              </table>
          </form>
    </section>
</body>
</html>