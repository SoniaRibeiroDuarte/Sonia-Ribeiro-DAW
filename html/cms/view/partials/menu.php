<?php

?>
    <div id="menu">
        <h2 id="titulo">Bienvenido</h2>
        <nav id="navmenu">
            <ul id="ulmenu">
                <li class="limenu"><a class="amenu" href="<?php echo $_SESSION['home'] ?>panel">Inicio</a></li>
                <li class="limenu"><a class="amenu" href="">Noticias</a></li>
                <li class="limenu"><a class="amenu" href="<?php echo $_SESSION['home'] ?>panel/usuarios">Usuarios</a></li>
                <li class="limenu"><a class="amenu" href="<?php echo $_SESSION['home'] ?>panel/salir">Salir</a></li>
            </ul>
        </nav>
    </div>
