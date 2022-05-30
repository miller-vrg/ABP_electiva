<?php
session_start();
require_once "../databases/conexion_db.php";

@$ex = $_SESSION['especializacion'];

$sql = "SELECT * FROM medicos
WHERE lower(especializacion)  like '%$ex%'";

$row = mysqli_query($conexion, $sql);

@$data = "";

if (mysqli_num_rows($row) > 0) {
    $data = mysqli_fetch_assoc($row);
    // echo $data["apellidos"];
    //  echo $data["name"];
    //  echo $data["user"];
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Listado</title>
    <meta charset="UFT-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style-listado.css">
    <Style>
        .retroceso {
            font-size: 80px;
            border-radius: 5mm;
            background-color: blue;
            border: 2mm black solid;
        }
    </Style>
</head>

<body>
    <form class="contenedor">
        <table class="t" BORDER CELLPADDING=10 CELLSPACING=0>

            <?php

            if (@$data["user"] != null) {
                date_default_timezone_set("America/Bogota");
                @$fecha = date("d-m-Y");
                @$fecha_au  = date("d-m-Y");
                @$hora = date("5:40:0");
                @$auxi = strtotime($hora);

                @$hora_actual = date("H:i:s");
                @$auxi2 =  strtotime($hora_actual);
                $auxi2 = @strtotime("+2 hour", $auxi2);


                @$final = date("17:40:00");
                if ($auxi2 >= @strtotime($final) && !isset($_REQUEST["au"])) {
                    echo "<H1> A esta hora usted ya no tiene citas disponibles para hoy </H1>";
                } else {
                    echo <<<tt
                    <tr>
                    <td class="c">N°</td>
                    <td class="c">Medico</td>
                    <td class="c">Fecha</td>
                    <td class="c">Hora</td>
                    <td class="c b"></td>
                    </tr>
tt;
                }

                if(isset($_REQUEST["au"])){
                    $indice = $_REQUEST["au"]+0;
                    $mod_date = @strtotime($fecha."+ $indice days");
                    $fecha_au = @date("d-m-Y",$mod_date);
                    $fecha = $fecha_au;
                    $fecha_au = date("d-m-Y");
                }

                for ($i = 1; $i <= 36; $i++) {

                    @$auxi = strtotime('+20 minute', $auxi);
                    $hora = @date('H:i:s', $auxi);

                    $print = <<<pp
                    <tr>
                        <th class="n">{$i}</th>
                        <td>{$data["name"]} {$data["apellidos"]}</td>
                        <td>{$fecha}</td>
                        <td>{$hora}</td>
                        <td class="btn">
                        <a href="../function/registrar_cita.php?fh={$fecha} {$hora}&u={$data["user"]}" class="buton" type="submit" >
                        <img src="../icons/agregar.png" alt="+">
                        </a>
                        </td>
                    </tr>
pp;
                    if ($auxi  > $auxi2) {
                        echo $print;
                    }

                    if(strtotime($fecha) > strtotime($fecha_au)){
                        echo $print;
                    }
                }
            } else {
                echo "<H1>No hay medico " . $_SESSION['especializacion'] . " disponible</H1>";
            }

            ?>

            <!--  -->
        </table>
    </form>
    <div class="dias">
        <?php

        if (@$data["user"] != null) {

            for ($p = 1; $p <= 30; $p++) {
                echo <<<oo
                <a href="listado.php?au=$p"><button class="chid">$p</button></a>
oo;
            }
        } else {
            echo "<a href='home-usuario.php'><input class='retroceso' type='button' value='Atras'></a>";
        }
        ?>


    </div>

</body>

</html>