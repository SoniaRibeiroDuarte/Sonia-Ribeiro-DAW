<?php
//esto es la vista de acceso
?>
<div id="conlog">
<div id="contLog">
    <img id ="logoacc" src="../../public/img/logo2.png"><br>
    <span id="meslo"><?php echo $datos->mensaje; ?></span>
    <form method="POST">
        <p class="datosus">Usuario:</p>
        <input class="intus" type="text" name="usuario">
        <p class="datosus">Contraseña:</p>
        <input class="intus"type="text" name="clave"><br>
        <button id="buttonlog" name="acceder">Acceder</button>
    </form>
</div>
</div>


