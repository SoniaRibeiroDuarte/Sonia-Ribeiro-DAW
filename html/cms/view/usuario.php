<?php require("partials/header.php") ?>
<?php require ("partials/menu.php");?>
<?php require ("partials/mensajes.php");?>
    <div id="contusu">
        <h2 id="titulous">Editar usuario</h2>
        <form method="POST">
            <span class="titdatos">Usuario</span><br>
            <input class="intdatos" type="text" name="usuario" value="<?php $datos->usuario?>"><br>
            <span class="titdatos">Clave</span><br>
            <input class="intdatos" type="checkbox" name="cambiarclave">
            (marcar para cambiar la clave)<br>
            <input class="intdatos" type="password" name="clave"><br>
            <span class="titdatos">Permisos</span><br>
            <?php $usuarios = ($datos->usuario == 1) ? 'checked':''?>
            <?php $noticias = ($datos->noticias == 1) ? 'checked':''?>
            <input class="intdatos" type="checkbox" name="noticias" <?php $noticias?>>Noticias<br>
            <input class="intdatos" type="checkbox" name="usuarios" <?php $usuario?>>Usuarios<br>
            <input type="submit" value="Guardar" name="guardar" class="guardar">
        </form>
    </div>

<?php require("partials/footer.php") ?>