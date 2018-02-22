<?php

?>
    <div id="menu_home">
        <img id ="logomenu2" src="<?php echo '/cms/public/img/lobo.png'?>">
        <nav id="navmenu"> 
            <ul id="ulmenu">
                <li class="limenu"><a class="amenu" href="<?php echo $_SESSION['home'] ?>">Home</a></li>
                <li class="limenu"><a class="amenu" href="<?php echo $_SESSION['home'] ?>todasnoticias">Entradas</a></li>
                <li class="limenu"><a class="amenu" href="<?php echo $_SESSION['home'] ?>contacto">Contacto</a></li>

            </ul>
        </nav>
    </div>
