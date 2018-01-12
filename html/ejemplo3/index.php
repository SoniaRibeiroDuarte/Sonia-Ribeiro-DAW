<?php

echo "<h1>Introduccion a la programacion orientada a objetos </h1>";
echo "<h2>Ejemplo3: Instaciar una clase externa </h2>";

require("Contacto.php");
//o include para que de warming y continue en vez de error
$mi_contacto = new Contacto ("Jairo","Garcia",43,"jairogarcia@gmail.com");
echo"El contacto se llama $mi_contacto->nombre,$mi_contacto->apellido";