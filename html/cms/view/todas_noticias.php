 <?php require("partials/header_home.php") ?>
<?php require("partials/menu_font.php") ?>
    <div id="cuerpo_noticias">
        <div id="noticias2">
            <?php foreach ($datos as $dato){ ?>
            
                <?php $ruta = $_SESSION['home']."noticia/".$dato->slug?>
            <a class="noticia_enlace" href="<?php echo $ruta ?>"><div class="noticia" style="background:url('<?php echo $dato->imagen; ?>');"><?php echo $dato->titulo ?></div></a>
            
            <?php }?>   
        </div>
    </div>

 <?php require("partials/footer_home.php") ?>

