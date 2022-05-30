<?php
session_start();
require_once "../databases/conexion_db.php";
$tipo = $_SESSION['tipo'];
if($tipo == null){
    header("location: ../");
}
$user = $_SESSION['user'];
echo "5 - {$user} ";
$sql ="";

function llenar(){

    $sql = "SELECT name,
            apellidos, 
            tipo, 
            fecha_cita, 
            fecha_registro,
            estado
            FROM citas, registros,medicos
            WHERE id_user = {$user}  
            AND id_citas = citas.id
            GROUP BY fecha_registro;";

   echo "24 - {$user} ";
    $rows = mysqli_query($conexion,$sql);
    echo "26";
    if(mysqli_num_rows($rows) > 0 ){

        $tabla = "";
        $con = 1;
        $data ;
        while($data = mysqli_fetch_assoc($rows)){

            $tabla += "<tr>
                            <td>$con</td>
                            <td>".$data['name']." ".$data['apellidos']."</td>
                            <td>".$data['tipo']."</td>
                            <td>".$data['fecha_cita']."</td>
                            <td>".$data['fecha_registro']."</td>
                        </tr>";
            $con ++;
            }

            if($data != null){
                echo $tabla;
            }else{
              
                echo "<script>
                        alert('Usted no tiene registros');
                     </script>";
            }
            

        header("location: ../page/home-usuario.php");
        
    }else{
        echo "<script>
                alert('error al cargar registro');
            </script>";
    }

}

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
<body>
    <section class = "container">
    <table BORDER CELLPADDING=10 CELLSPACING=0>
                  <tr>
                      <th class="encabezado" id="n">N°</th>
                      <th class="encabezado" id="medico">Medico</th>
                      <th class="encabezado" id="tipo">Tipo</th>
                      <th class="encabezado" id="estado">Estado</th>
                      <th class="encabezado" id="hora">Fecha cita</th>
                      <th class="encabezado" id="asignacion">Asignación</th>
                  </tr>
                  <?php llenar(); ?>
              </table>
          </form>
    </section>
</body>
</html>