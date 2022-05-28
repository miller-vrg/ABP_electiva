<?php
session_start();
require_once "../databases/conexion_db.php";
$user = $_SESSION['user'];

function llenar(){

    $sql = "SELECT medicos.name,
    medicos.apellidos, 
    tipo, 
    fecha_cita, 
    fecha_registro,
    estado,
    citas.id, 
    id_citas,
    id_user,
    id_medico
    FROM medicos, citas, registros
    WHERE id_user = '$user'
    AND id_medico = medicos.user
    AND id_citas = citas.id;";

    $rows = mysqli_query($conexion,$sql);

    if(mysqli_num_rows($rows) > 0 ){

        $tabla = "";
        $con = 1;
        
        while($data = mysqli_fetch_assoc($rows)){

            $tablas += "<tr>
                            <td>$con</td>
                            <td>".$data['medicos.name']." ".$data['medicos.apellidos']."</td>
                            <td>".$data['tipo']."</td>
                            <td>".$data['fecha_cita']."</td>
                            <td>".$data['fecha_registro']."</td>
                        </tr>";
            $con ++;
            }

            echo $tabla;

        header("location: ../page/home-usuario.php");
        
    }else{
        echo "<script>alert('error al cargar registro');</script>";
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
    <script>
        onload:print();
    </script>
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
                  <?= llenar();?>
              </table>
          </form>
    </section>
</body>
</html>