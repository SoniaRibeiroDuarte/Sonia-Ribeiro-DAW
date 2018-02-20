<?php require("partials/header_home.php") ?>
    <div id="">
        <?php foreach ($datos as $dato){ ?>
            <div>
                <h1><?php echo $dato->titulo ?></h1>
            </div>
            <div>
                <img src="<?php echo $dato->imagen ?>">
            </div>
            <div>
                <p><?php echo $dato->entradilla ?></p> 
            </div>
            <div>
                <p><?php echo $dato->texto ?></p>
            </div>
            <div>
                <p><?php echo $dato->autor?></p>
             </div>

        <?php }?>   
    </div>
<?php require("partials/footer_home.php") ?>
