<?php
session_start();
$tipo = $_SESSION['tipo'];
$name = $_SESSION['name'];
$edad = $_SESSION['edad'];
$email = $_SESSION['email'];
$telefono = $_SESSION['telefono'];
$direccion = $_SESSION['direccion'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.::Edit user::.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/style-edit.css">
</head>
<body>
            <form action="../controllers/usuarioControllers.php"  class="card-user" >
                    <img class="user" src="../icons/usuario.png" alt="PERFIL">
                    <p id="title"><?= $name?></p>
                    <div class="datos">
                        <p id="subtitle">Telefono:</p>
                        <input class="campos" name="telefono" min="30000000" max="3499999999" type="number" value="<?=$telefono?>" required>
                        <p id="subtitle">Email: </p>
                        <input class="campos" name="email" type="text" value="<?=$email?>" required>
                        <p id="subtitle">Dirección: </p>
                        <input class="campos" name="direccion" type="text" value="<?=$direccion?>" required>
                    </div>
                    <button class="btn-editar" type="submit">Guadar</button>
            </form>
</body>
</html>