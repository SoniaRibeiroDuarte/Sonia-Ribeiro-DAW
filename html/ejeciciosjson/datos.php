<?php
//Para evitar que los warning salgan en la pantalla y se traten como texto JSON
error_reporting(0);
$objeto ="";
$objeto->nombre = "sonia";
$objeto->nacimiento = 1996;
$objeto->pais = "España";
$objeto->edad = 21;
//Codificamos el objeto a JSON
$miJSON = json_encode($objeto);
echo $miJSON;
?>


