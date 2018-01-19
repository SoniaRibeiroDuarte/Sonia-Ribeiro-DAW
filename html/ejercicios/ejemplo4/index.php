<?php
echo "<h1>indroduccion a la programacion orientada a objetos</h1>";
echo "<h2>Ejemplo 4 modelo vista controlador</h2>";

//incluyo los archivos necesarios
require ("./controller/ContactoController.php");
require ("./model/Contacto.php");
//instacio controlador
$controller = new ContactoController;

//ejecuto el metodo por defecto del controlador

$controller->index();
