<?php require("partials/header_home.php") ?>
<?php require("partials/menu_font.php") ?>
    <div id="contenedor_noticia">
        <?php foreach ($datos as $dato){ ?>
            <div id="titulo_noticia">
                <h1 id="titulo_n"><?php echo $dato->titulo ?></h1>
            </div >
            <div id="imagen_noticia">
                <img id="imagen_n"src="<?php echo $dato->imagen ?>">
            </div>
            <div id="entradilla_noticia">
                <div id="entradilla_n"> <?php echo $dato->entradilla ?></div> 
            </div>
            <div id="texto_noticia">
                <div id="texto_n"><?php echo $dato->texto ?></div>
            </div>
            <div id="autor_noticia">
                <p id="autor_n">Autor: <?php echo $dato->autor?></p> 
             </div>

        <?php }?>   
    </div>
<?php require("partials/footer_home.php") ?>
