<div id="conlog">
<?php require ("partials/menu.php");?>
<?php require ("partials/mensajes.php");?>
    <div id="contusu">
        <h2>Editar Entrada</h2>
        <form method="POST">
            <span>Titulo</span><br>
            <input type="text" name="titulo" value="<?php $datos->titulo?>"><br>
            <span>Entradilla</span><br>
            <input type="text" name="entradilla" value="<?php $datos->entradilla?>"><br>
            <span>Texto</span><br>
            <input type="text" name="texto" value="<?php $datos->texto?>"><br>
            <a type="button" href="<?php echo $_SESSION['home']?>panel/noticias">Volver</a>
            <input type="submit" value="Guardar" name="guardar">
        </form>
    </div>
</div>