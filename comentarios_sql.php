<?php
include("./functions.php");
include("./comentario_view.php");
$mysql = connection();
// delete
$opcion = $_GET["option"];
if ($opcion =="borrar") {
    $id=$_GET["id"];
    $mysql->query("delete from comentarios where id=$id");
}
//insertar
if ($opcion == "insertar") {
    $nombre = trim($_POST["nombre"]);
    $email = trim($_POST["email"]);
    $mensaje = trim($_POST["comentario"]);

    $query = "Insert into comentarios (nombre,email,comentario) values ('$nombre','$email','$mensaje');";
    $mysql->query($query);
}
//editar
if ($opcion == "editar") {
    $id=$_POST["id"];
    $nombre = trim($_POST["nombre"]);
    $email = trim($_POST["email"]);
    $mensaje = trim($_POST["comentario"]);

    $query="update comentarios set nombre='$nombre',comentario='$mensaje',email='$email' where id='$id'";
    $mysql->query($query);
}
header("Location:index.php");
$mysql ->close()
?>