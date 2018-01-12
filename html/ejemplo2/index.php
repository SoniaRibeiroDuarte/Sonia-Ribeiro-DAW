<?php

echo "<h1>Introduccion a la programacion orientada a objetos </h1>";

class Contacto{
    var $nombre;
    var $apellido;
    var $edad;
    var $email;
    
    //metodo constructor antiguo
  /*function Contacto($miNombre,$miApellidos,$miEdad,$miEmail){
        $this->nombre = $miNombre;
        $this->apellido = $miApellidos;
        $this->edad = $miEdad;
        $this->email = $miEmail;
    }*/
    //constructor nuevo
    function __construct($miNombre,$miApellidos,$miEdad,$miEmail){
        $this->nombre = $miNombre;
        $this->apellido = $miApellidos;
        $this->edad = $miEdad;
        $this->email = $miEmail;
    }
}
$mi_contacto = new Contacto ("Jairo","Garcia",43,"jairogarcia@gmail.com");

echo"El contacto se llama $mi_contacto->nombre,$mi_contacto->apellido";
?>


