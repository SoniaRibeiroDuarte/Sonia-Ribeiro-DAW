<?php

?>
    <div id="menu">
        <h2 id="titulo">Hola, <?php echo $_SESSION['usuario'];?></h2>
        <nav>
            <ul>
                <li><a href="<?php echo $_SESSION['home'] ?>panel">Inicio</li>
                <li><a href="">Noticias</li>
                <li><a href="<?php echo $_SESSION['home'] ?>panel/usuarios">Usuarios</li>
                <li><a href="<?php echo $_SESSION['home'] ?>panel/salir">Salir</li>
            </ul>
        </nav>
    </div>
