<div id="conlog">
<?php require("partials/menu.php") ?>
<?php require("partials/mensajes.php") ?>
    <div id="contusu">
        <h2 id="titulous">Entradas</h2>
            <ul id="titulosus">
                <li id="titizq">Entradas
                    <a class="acciones2" class="añadir"  href="<?php echo $_SESSION['home'] ?>panel/noticias/crear">
                        <i class="fas fa-plus"></i>
                    </a>
                </li>
                <li id="titdrch">Acciones</li>
            </ul>    
            <?php foreach ($datos as $dato){ ?>
                <ul id="titulosus">
                    <li id="titizq">
                        <a id="negro" href="">
                            <?php echo $dato->titulo ?>
                        </a>    
                    </li>
                    <li id="acciones">
                        <?php $ruta = $_SESSION['home']."panel/noticias/editar/".$dato->id ?>
                        <a class="acciones2" href="<?php echo $ruta ?>"><i class="far fa-edit"></i></a>
                        <?php if ($_SESSION['usuarios']){?>
                            <?php $color = ($dato->home == 1) ? 'activo':'inactivo';?>
                            <?php $texto = ($dato->home == 1) ? 'desactivar_home':'activar_home';?>
                            <?php $ruta = $_SESSION['home']."panel/noticias/".$texto."/".$dato->id;?>
                            <a id="<?php echo $color?>" class="acciones2"  href="<?php echo $ruta ?>" title="<?php echo $texto?>"><i class="fas fa-home"></i></a>
                         <?php } ?>
                        <?php $color = ($dato->activo == 1) ? 'activo':'inactivo';?>
                        <?php $texto = ($dato->activo == 1) ? 'desactivar':'activar';?>
                        <?php $ruta = $_SESSION['home']."panel/noticias/".$texto."/".$dato->id;?>
                        <a id="<?php echo $color?>" class="acciones2"  href="<?php echo $ruta ?>" title="<?php echo $texto?>"><i class="fas fa-check"></i></a>
                         <?php $ruta = $_SESSION['home']."panel/noticias/borrar"."/".$dato->id ?>
                        <a class="acciones2" href="<?php echo $ruta ?>" title="borrar"><i class="far fa-trash-alt"></i></a>
                    </li>
                </ul>    
            <?php } ?>
    </div>
</div>
<?php require("partials/footer.php") ?>
   