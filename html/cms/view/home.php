<div id="contenedor_home">
    <div id="banner">
        <img id ="logo_home" src="<?php echo'/cms/public/img/logo2.png'?>"><br>
        <input id="campo_buscar" type="text" name="campo_buscar">
        <input id="buscar" type="button" name="buscar" value="Buscar">
    </div>
    <div id="cuerpo_noticias">
        <div id="noticias">
            <?php foreach ($datos as $dato){ ?>
            <div class="noticia">
                <a class="noticia_enlace" href=""><?php echo $dato->titulo ?></a>
            </div>
            <?php }?>   
        </div>
    </div>
</div>


