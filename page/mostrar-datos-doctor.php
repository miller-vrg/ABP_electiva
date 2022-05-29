<?php
session_start();
require_once "../databases/conexion_db.php";

$name = $_SESSION['name'];
$espe = $_SESSION['especi'];
$edad = $_SESSION['edad'];
$telefono = $_SESSION['telefono'];

$sql = "SELECT * FROM `citas`";

$row = mysqli_query($conexion, $sql);



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/mostrar-datos-doctor.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet"> 

</head>
<body>
    
    <div class="padre">

            <div class="card-user">
                <img src="../icons/usuario.png" alt="">
                <h3><?= $name ?></h3>
                    <div class="campo">
                        <p><b>Especializacíon:</b> <br>
                          <?= $espe?>
                          </p>
                        <p><b>Edad:</b> <br>
                        <?= $edad?>
                        </p>
                        <p><b>Telefono:</b> <br>
                        <?= $telefono?>
                      </p>
              </div>
              <button class="btn-editar" onclick="location='./edit.php'"> Editar </button>
            </div>
        <div class="table">

            <table class="default" BORDER CELLPADDING=10 CELLSPACING=0 >



                <tr>
              
                  <th class="c n">N</th>
                  <th class="c paciente">Paciente</th>
                  <th class="c fecha">Fecha</th>
                  <th class="c hora">Hora</th>
                  <th class="c btn"></th>
              
                </tr>
              

                <?php 
                
                  foreach ($row as $valor){

                    echo '<tr>
              
                    <td>'. $valor['id'].' </td>
                
                    <td>'. $valor['id_user'].' </td>
                
                    <td>'.  explode(" ", $valor['fecha_cita'])[0].' </td>
  
                    <td>'.  explode(" ", $valor['fecha_cita'])[1].' </td>

                    <td id="btns">
                     <button name="accion" value="correcto"><img src="../icons/marca-de-verificacion.png" alt="Correcto"></button></button></ion-icon>
                     <button name="accion" value="correcto"><img src="../icons/cancelar.png" alt="Correcto"></button>
                    </td>
  
                
                  </tr>';


                  }

                ?>
                
              
              
            </table>

        </div>

    </div>
    

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>