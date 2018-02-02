<?php
namespace App;
session_start();
use App\Controller\UsuarioController;
//ruta de la publica
$public ='/cms/public/';
//llamo a la cabecera
require ("../view/partials/header.php");
//ruta de la home
$home ='/cms/public/index.php/';

//la guardo a la sesion
$_SESSION['home']=$home;

//defino la funcion que que autocargara las clases cuando se instacien
spl_autoload_register('App\autoload');

function autoload ($clase, $dir=null){
    
    //plantear ruta absoluta del proyecto(directorio raiz de mi proyecto)
    if(is_null($dir)){
        $dirname = str_replace('/public','', dirname(__FILE__));
        $dir = realpath($dirname);
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
//compruebo que ruta me estan pidiendo
$ruta= str_replace($home,'',$_SERVER['REQUEST_URI']);

//enrutamiento
switch ($ruta){
    //panel
    case 'panel':
        //instacio el controlador
        $controller = new UsuarioController;
        //le mando al panel de acceso
        $controller->acceso();
    break;
    case 'panel/usuarios':
       //instacio el controlador
        $controller = new UsuarioController;
        //le mando al metodo salir
        $controller->index();
    break;
    case 'panel/salir':
       //instacio el controlador
        $controller = new UsuarioController;
        //le mando al metodo salir
        $controller->salir();
    break;
}

//llamo al pie
require ("../view/partials/footer.php");