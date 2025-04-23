<?php
function listComentario() {}
function formInsert()
{
?>
    <div class=" container border border-black container-fluid m-3 p-2">
        <form method="post" action="comentarios_sql.php?option=insertar">
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
    </body>

    </html>
    <?php
}

function formComment($mysql)
{
    $comentarios = "SELECT * FROM comentarios";
    $consulta = $mysql->query($comentarios);
    while ($registro = $consulta->fetch_assoc()) {
        $id = $registro["id"];
        $nombre = $registro["nombre"];
        $apellido = $registro["apellido"];
        $fecha = $registro["fecha"];
        $email = $registro["email"];
        $mensaje = $registro["comentario"];

    ?>
    <?php
    }
    ?>

    <div>
        <div class="m-4 border border-black ">
            <p class="bg-light m-1">

                <?php echo $nombre ?>
                <?php echo $apellido ?>
                <a href="mailto: <?php echo $email ?>"><?php echo $email ?></a>
                <?php echo $fecha ?>
                <span class="btn btn-danger"><a href="comentarios_sql.php?option=borrar&id=<?php echo $id ?>" class="text-light ">Borrar mensaje</a></span>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $id ?>">
                    Editar
                </button>

            </p>

            <p class="m-1"><?php echo $mensaje ?></p>


            <?php echo formUpdate($id, $nombre, $email, $mensaje); ?>

        </div>
    <?php

}
function formUpdate($id, $nombre, $email, $mensaje)
{
    ?>
        <div class="modal fade" id="exampleModal<?php echo $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edite su comentario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="comentarios_sql.php?option=editar">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <label>Nombre</label><br>
                            <input type="text" name="nombre" value="<?php echo $nombre ?>"> <br>
                            <label>Email (opcional)</label><br>
                            <input type="email" name="email" value="<?php echo $email ?>"> <br>
                            <label>Mensaje</label><br>
                            <textarea name="comentario"><?php echo $mensaje ?></textarea> <br>
                            <button class="btn btn-primary m-2">Mandar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php
}
function confirmDeleteComent($id) {}
    ?>