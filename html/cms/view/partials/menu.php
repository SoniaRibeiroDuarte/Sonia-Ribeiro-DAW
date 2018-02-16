<?php

?>
    <div id="menu">
        <img id ="logomenu" src="<?php echo '/cms/public/img/logo2.png'?>">
        <nav id="navmenu">
            <ul id="ulmenu">
                <li class="limenu"><a class="amenu" href="<?php echo $_SESSION['home'] ?>panel">Inicio</a></li>
                <li class="limenu"><a class="amenu" href="<?php echo $_SESSION['home'] ?>panel/noticias">Entradas</a></li>
                <?php if ($_SESSION['usuarios']){?>
                <li class="limenu"><a class="amenu" href="<?php echo $_SESSION['home'] ?>panel/usuarios">Usuarios</a></li>
                <?php } ?>
                <li class="limenu"><a class="amenu" href="<?php echo $_SESSION['home'] ?>panel/salir">Salir</a></li>
            </ul>
        </nav>
    </div>
