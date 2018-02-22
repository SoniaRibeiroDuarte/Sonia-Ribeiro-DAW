<?php
namespace App;
session_start();
use App\Controller\UsuarioController;
use App\Controller\NoticiaController;
use App\Controller\AppController;
//ruta de la publica
$public ='/cms/public/';


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
//compruebo la ruta que me esta pidiendo
$home = '/cms/public/index.php/';
//la guardo a la sesión
$_SESSION['home'] = $home;
$ruta = str_replace($home, '',$_SERVER["REQUEST_URI"]);
//enrutamientos
/*
$array_ruta = explode('/',$ruta);
switch (count($array_ruta)){
    case 1: ruta1($array_ruta);
        break;
    case 2: ruta1($array_ruta);
            ruta2($array_ruta);
        echo "estoy en salir , en panel/usuarios,panel/noticias,";
        break;
    case 3: echo "Estoy en el panel/noticias/crear";
        break;
    case 4: echo "estoy editando,activando o borrando";
        break;
    default: echo "pagina incorrecta";
}
function ruta1($array_ruta){
    switch ($array_ruta[0]){
        case "":        return  "";
        case "panel":   return "UsuarioController";
        case "noticias": return "NoticiaController";
        default:        return "Error";
    }
}
//saco la accion
function ruta2($array_ruta){
    $controlador = ruta1($array_ruta);
    switch ($controlador){
        case "UsuarioController": return $array_ruta[1];
        case "NoticiaController": return
    }
    switch ($array_ruta[1]){
        case "":        return  "";
        case "panel":   return "UsuarioController"
        case "noticias": return "NoticiaController";
        default:        return "Error";
    }
}
*/
$array_ruta = explode("/",$ruta);

    if (count($array_ruta) == 2 && isset($array_ruta[1]) && $array_ruta[0] == 'noticia' && isset($array_ruta[1])) {
        switch ($array_ruta[0]) {
            case 'noticia':
                $slug = $array_ruta[1];
                //Instancio el controlador
                $controller = new AppController;
                //Le mando el panel de acceso
                $controller->mostrarNoticia($slug);
                break;
        }
    }else if(count($array_ruta) == 4){

        if ($array_ruta[0].$array_ruta[1] == "panelusuarios"){
            if ($array_ruta[2] == "editar" OR
                $array_ruta[2] == "borrar" OR
                $array_ruta[2] == "desactivar" OR
                $array_ruta[2] == "activar"){
                $controller = new UsuarioController;
                $accion = $array_ruta[2];
                $id = $array_ruta[3];
                //Llamo a la accion
                $controller->$accion($id);
            }else{
                $controller = new AppController;
                $controller->index();
            }

    }else if ($array_ruta[0].$array_ruta[1] == "panelnoticias"){
        if ($array_ruta[2] == "editar" OR
            $array_ruta[2] == "borrar" OR
            $array_ruta[2] == "desactivarhome" OR
            $array_ruta[2] == "activarhome" OR
            $array_ruta[2] == "desactivar" OR
            $array_ruta[2] == "activar"){
            $controller = new NoticiaController;
            $accion = $array_ruta[2];
            $id = $array_ruta[3];
            //Llamo a la accion
            $controller->$accion($id);
        }else{
            $controller = new AppController;
            $controller->index();
        }


    }else{
        $controller = new AppController;

        //le mando al metodo index
        $controller->index();
    }

}else{
    switch ($ruta){
        //Panel
        case 'panel' :
            //Instancio el controlador
            $controller = new UsuarioController;

            //le mando al panel de acceso
            $controller->acceso();
            break;
        case 'panel/salir':
            //Instancio el controlador
            $controller = new UsuarioController;

            //le mando al metodo salir
            $controller->salir();
            break;
        case 'panel/usuarios':
            //Instancio el controlador
            $controller = new UsuarioController;

            //le mando al metodo index
            $controller->index();
            break;
        case 'panel/usuarios/crear':
            //Instancio el controlador
            $controller = new UsuarioController;

            //le mando al metodo index
            $controller->crear();
            break;
        case 'panel/noticias':
            //Instancio el controlador
            $controller = new NoticiaController;

            //le mando al metodo index
            $controller->index();
            break;
        case 'panel/noticias/crear':
            //Instancio el controlador
            $controller = new NoticiaController;

            //le mando al metodo index
            $controller->crear();
            break;
        case 'todasnoticias':
            //Instancio el controlador
            $controller = new AppController;
            //Le mando el panel de acceso
            $controller->todasNoticias();
            break;
        case 'contacto':
            //Instancio el controlador
            $controller = new AppController;
            //Le mando el panel de acceso
            $controller->contacto();
            break;
        default: //Instancio el controlador
            $controller = new AppController;

            //le mando al metodo index
            $controller->index();

    }
}


