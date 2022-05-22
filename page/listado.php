<?php
session_start();
require_once "../databases/conexion_db.php";

@$ex = $_SESSION['expecializacion'];

$sql ="SELECT * FROM medicos
WHERE lower(expecializacion)  like '%$ex%'";

$row = mysqli_query($conexion,$sql);

if(@mysqli_num_rows($row) > 0){
    $data = mysqli_fetch_assoc($row);

    echo $data["apellidos"];
    echo $data["name"];
    echo"<br>". $ex;

}else{
      echo "nada de nada";
      echo"<br>". $ex;
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
            <tr>
                <td class="c">N°</td>
                <td class="c">Medico</td>
                <td class="c">Fecha</td>
                <td class="c">Hora</td>
                <td class="c b"></td>
            </tr>

            <!-- <tr>
                <th class="n">1</th>
                <td></td>
                <td></td>
                <td></td>
                <td class="btn">
                   <a href="home-usuario.php" class="buton" type="submit" >
                    <img src="../icons/agregar.png" alt="+">
                   </a>
                </td>
            </tr> -->
            
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