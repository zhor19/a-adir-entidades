<?php
include("./functions.php");
include("./comentario_view.php");
$mysql = connection();
headerhtml("Título de ejemplo");
formInsert();
formComment($mysql);
footerhtml();
$mysql ->close()
?>
    
