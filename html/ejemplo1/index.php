<?php
echo "<h1>Introduccion a la programacion orientada a objetos <h1>";
class Contacto{
    var $nombre;
    var $apellido;
    var $edad;
    var $email;
    
    //funciones
    function setNombre($miNombre){
        $this->nombre = $miNombre;
    }
    function getNombre(){
        $this->nombre;
    }
    
}
//instanciar o utilizar clase
$mi_contacto= new Contacto;
//accedo a las funciones o metodos  mediante $nombre_del_obejeto->nombre
$mi_contacto->setNombre("jairo");
echo "el contacto se llama".$mi_nombre->getNombre();

//o bien accedo a las variables o atibutos mediante $nombre_del_objeto
echo "<br> el contacto se llama $mi_contacto->nombre";
?>

