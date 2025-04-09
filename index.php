<?php
$mysqli = new mysqli("localhost", "root", "Cafeconleche", "social");

if (isset($_POST["nombre"])) {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $mensaje = $_POST["comentario"];

    $query = "Insert into comentarios (nombre,email,comentario) values ('$nombre','$email','$mensaje');";
    $mysqli->query($query);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class=" container border border-black container-fluid m-3 p-2">
        <form method="post" action="index.php">
            <h2><strong>Escriba un comentario por favor:</strong></h2>
            <label>Nombre</label><br>
            <input type="text" name="nombre"> <br>
            <label>Email (opcional)</label><br>
            <input type="email" name="email"> <br>
            <label>Mensaje</label><br>
            <textarea name="comentario"></textarea> <br>
            <button class="btn btn-primary m-2">Mandar</button>
        </form>
    </div>

    </a>

    <?php

    $comentarios = "SELECT * FROM comentarios";

    $consulta = $mysqli->query($comentarios);




    while ($registro = $consulta->fetch_assoc()) {
        $id = $registro["id"];
        $nombre = $registro["nombre"];
        $apellido = $registro["apellido"];
        $fecha = $registro["fecha"];
        $email = $registro["email"];
        $mensaje = $registro["comentario"];

    ?>

        <div class="m-4 border border-black ">
            <p class="bg-light m-1">

                <?php echo $nombre ?>
                <?php echo $apellido ?>
                <a href="mailto: <?php echo $email ?>"><?php echo $email ?></a>
                <?php echo $fecha ?>
            </p>
            <p class="m-1"><?php echo $mensaje ?></p>
        </div>
    <?php
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>