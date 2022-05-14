<?php
session_start();
$_SESSION['tipo'] = "usuarios";
$name = $_SESSION['name'];
$edad = $_SESSION['edad'];
$email = $_SESSION['email'];
$telefono = $_SESSION['telefono'];
$direccion = $_SESSION['direccion'];

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-user</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/style-home-usuario.css">
</head>
<body>
    <nav>
        <div class="btn-nav">
             <img class="calendario" src="../icons/calendario.png" onclick="location='citas.html'" >
             <img class="registros" src="../icons/verificacion.png" onclick="location='registros.php'; " >
        </div>
    </nav>
    <section class="container">
        <div class="tarjetero1">
            <form action="./edit.php" method="post" class="card-user" >
                <img class="user" src="../icons/usuario.png" alt="PERFIL">
                <h2><?= $name ?></h2>

                <div class="datos">
                    <p><b>Edad:</b> <br><?= $edad?></p>
                    <p><b>Email:</b> <br><?= $email?></p>
                    <p><b>Telefono:</b> <br><?= $telefono?></p>
                    <p><b>Dirección:</b> <br><?= $direccion?></p>
                </div>
                <button class="btn-editar" type="submit">Editar</button>
            </form>
            </div>
            <form action="./listado.html" method="post" class="tarjetero2">
                <div class="tarjeta t2">
                    <img src="../img/general.jpg" alt="Medico General">
                    <h5>Medico general</h5>
                    <p>El médico general tiene la responsabilidad de ofrecer una atención integral al paciente. Esto hace que tenga un total conocimiento del historial médico y clínico del paciente.</p>
                    <button type="submit" name="accion" value="general"><h5>Agendar</h5> <img src="../icons/fecha-derecha.svg" alt="flecha"></button>

                </div>
                <div class="tarjeta t2">
                    <img src="../img/ginecologo.jpg" alt="Ginecologo">
                    <h5>Ginecologia</h5>
                    <p>La finalidad de la revisión ginecológica es la prevención y detección precoz de alteraciones de los órganos reproductores.</p>
                    <button type="submit" name="accion" value="ginecologo" ><h5>Agendar</h5><img src="../icons/fecha-derecha.svg" alt="flecha"></button>
                </div>
                <div class="tarjeta t2">
                    <img src="../img/pediatria.jpg" alt="Pediatria">
                    <h5>Pediatria</h5>
                    <p>Ofrecer consejos para evitar enfermedades y lesiones. Proporcionar cuidado anticipado y adecuado en caso de enfermedades graves para evitar que progresen.</p>
                    <button type="submit" name="accion" value="pediatria" ><h5>Agendar</h5> <img src="../icons/fecha-derecha.svg" alt="flecha"></button>
                </div>
                <div class="tarjeta t2" >
                    <img src="../img/odontologia.jpg" alt="Odontologia">
                    <h5>Odontologia</h2>
                    <p>La odontologia es la mejor manera de que tus dientes y tu boca se mantengan sanos con el paso de los años, y de que además, evites enfermedades causadas por una mala higiene bucodental.</p>
                    <button type="submit" name="accion" value="odontologia" ><h5>Agendar</h5> <img src="../icons/fecha-derecha.svg" alt="flecha"></button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>