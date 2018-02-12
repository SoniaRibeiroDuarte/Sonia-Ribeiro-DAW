<div id="conlog">
<?php require ("partials/menu.php");?>
<?php require ("partials/mensajes.php");?>
    <div id="contusu">
        <h2>Editar usuario</h2>
        <form method="POST">
            <span>Usuario</span><br>
            <input type="text" name="usuario" value="<?php $datos->usuario?>"><br>
            <span>clave</span>
            <input type="checkbox" name="cambiarclave">
            (marcar para cambiar la clave)<br>
            <input type="password" name="clave"><br><br>
            <span>Permisos</span>
            <?php $usuarios = ($datos->usuario == 1) ? 'checked':''?>
            <?php $noticias = ($datos->noticias == 1) ? 'checked':''?>
            <input type="checkbox" name="noticias" <?php $noticias?>>Noticias<br>
            <input type="checkbox" name="usuarios" <?php $usuario?>>Usuarios<br>
            <a type="button" href="<?php echo $_SESSION['home']?>panel/usuarios">Volver</a>
            <input type="submit" value="Guardar" name="guardar">
        </form>
    </div>
</div>
