<?php require("partials/menu.php") ?>
<?php require("partials/mensajes.php") ?>
<div id="conlog">
    <div id="contusu">
        <h2 id="titulous">Usuarios</h2>
        <a class="añadir"  href="<?php echo $_SESSION['home'] ?>panel/usuarios/crear">
                <i class="fas fa-plus"></i>
        </a>
            <ul id="titulosus">
                <li id="titizq">Usuarios</li>
                <li id="titdrch">Acciones</li>
            </ul>    
            <?php foreach ($datos as $dato){ ?>
                <ul id="titulosus">
                    <li id="titizq">
                        <a id="negro" href="">
                            <?php echo $dato->usuario ?>
                        </a>    
                    </li>
                    <li id="acciones">
                        <a class="acciones2" href=""><i class="far fa-edit"></i></a>
                        <?php $color = ($dato->activo == 1) ? 'activo':'inactivo';?>
                        <?php $texto = ($dato->activo == 1) ? 'desactivar':'activar';?>
                        <?php $ruta = $_SESSION['home']."panel/usuarios/".$texto-"/".$dato->id;?>
                        <a id="<?php echo $color?>" class="acciones2"  href="<?php echo $ruta ?>" title="<?php echo $texto?>"><i class="fas fa-check"></i></a>
                        <a class="acciones2" href=""><i class="far fa-trash-alt"></i></a>
                    </li>
                </ul>    
            <?php } ?>
    </div>
</div>
   

