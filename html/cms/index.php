<?php
namespace App;
use App\Controller\UsuarioController;

echo "<h1>Cms</h1>";

//defino la funcion que que autocargara las clases cuando se instacien
spl_autoload_register('App\autoload');

function autoload ($clase, $dir=null){
    
    //plantear ruta absoluta del proyecto(directorio raiz de mi proyecto)
    if(is_null($dir)){
        $dir = realpath(dirname(__FILE__));
    }
    //escaneo la clase de forma recursiva
    foreach (scandir($dir)as $file){
        //si es un dirrectorio (y no es de sistema)accedo y busco la clase dentro de el
        if (is_dir($dir."/".$file) AND substr($file, 0, 1) !== '.'){
            autoload($clase, $dir."/".$file); 
        }
        //si es un fichero y el nombre coincide con el de la clase
        else if(is_file($dir."/".$file) AND $file == substr (strrchr ($clase, "\\"), 1).".php"){
            require ($dir."/".$file);
        }
    }
}
//instacio controlador
$controller = new UsuarioController;

//ejecuto el metodo por defecto del controlador

$controller->index();
