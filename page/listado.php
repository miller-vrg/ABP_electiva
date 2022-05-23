<?php
session_start();
require_once "../databases/conexion_db.php";

@$ex = $_SESSION['expecializacion'];

$sql = "SELECT * FROM medicos
WHERE lower(expecializacion)  like '%$ex%'";

$row = mysqli_query($conexion, $sql);
@$data;
if (@mysqli_num_rows($row) > 0) {
    $data = mysqli_fetch_assoc($row);

    echo $data["apellidos"];
    echo $data["name"];
    echo $data["user"];
}

// general
// ginecologo
// pediatria
// odontologia


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
</head>

<body>
    <form class="contenedor">
        <table class="t" BORDER CELLPADDING=10 CELLSPACING=0>

            <?php
            if (@$data["user"] != null) {
                echo <<<tt
                    <tr>
                    <td class="c">N°</td>
                    <td class="c">Medico</td>
                    <td class="c">Fecha</td>
                    <td class="c">Hora</td>
                    <td class="c b"></td>
                    </tr>
tt;

                @$fecha = date("d-m-Y");
                @$hora = date("6:0:0");
                @$auxi = strtotime($hora);
                
                for ($i = 1; $i <= 36; $i++) {
                    
                    if ($i == 1) {
                        $hora = @date('H:i:s A',$auxi);
                        echo <<<pp
                        <tr>
                            <th class="n">{$i}</th>
                            <td>{$data["name"]} {$data["apellidos"]}</td>
                            <td>{$fecha}</td>
                            <td>{$hora}</td>
                            <td class="btn">
                            <a href="home-usuario.php" class="buton" type="submit" >
                            <img src="../icons/agregar.png" alt="+">
                            </a>
                            </td>
                        </tr>
pp;
                    } else {
                        @$auxi = strtotime('+20 minute', $auxi);
                        $hora = @date('H:i:s A',$auxi);
                        echo <<<pp
                        <tr>
                            <th class="n">{$i}</th>
                            <td>{$data["name"]} {$data["apellidos"]}</td>
                            <td>{$fecha}</td>
                            <td>{$hora}</td>
                            <td class="btn">
                            <a href="home-usuario.php" class="buton" type="submit" >
                            <img src="../icons/agregar.png" alt="+">
                            </a>
                            </td>
                        </tr>
pp;
                    }

                    // echo $auxi."<br>";
                    // echo @$fecha."----------------".date('H:i:s',$auxi)."<br>";
                }
            } else {
                echo "<H1>No hay medico " . $_SESSION['expecializacion'] . " disponible</H1>";
            }

            ?>


            <!--  -->

        </table>
    </form>
    <div class="dias">
        <button class="chid"></button>
        <button class="chid"></button>
        <button class="chid"></button>
        <button class="chid"></button>
        <button class="chid"></button>
        <button class="chid"></button>
        <button class="chid"></button>
        <button class="chid"></button>
        <button class="chid"></button>
        <button class="chid"></button>
        <button class="chid"></button>
        <button class="chid"></button>
        <button class="chid"></button>
        <button class="chid"></button>
        <button class="chid"></button>
        <button class="chid"></button>
        <button class="chid"></button>
        <button class="chid"></button>
        <button class="chid"></button>
        <button class="chid"></button>
        <button class="chid"></button>
        <button class="chid"></button>
        <button class="chid"></button>
        <button class="chid"></button>
        <button class="chid"></button>
        <button class="chid"></button>
        <button class="chid"></button>
        <button class="chid"></button>
        <button class="chid"></button>
        <button class="chid"></button>



    </div>

</body>

</html>