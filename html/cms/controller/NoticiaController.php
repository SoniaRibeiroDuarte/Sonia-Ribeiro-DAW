<?php
namespace App\Controller;

use App\Model\Noticia;
use App\Helper\ViewHelper;
use App\Helper\DbHelper;

class NoticiaController {
    
    var $db;
    var $viewHelper;
    function __construct() {
        
        $dbHelper = new DbHelper();
        $this->db = $dbHelper->db ;
        //instancio el viewHelper
        $viewHelper = new ViewHelper();
        $this->view = $viewHelper;
    }
    public function index() {
        //Select con OBJ
        $resultado = $this->db->query("SELECT * FROM noticias");
        //Asigno la consulta a una variable
        while ($data = $resultado->fetch(\PDO::FETCH_OBJ)){ //Recorro el resultado
            $noticias[] = new Noticia($data);
        }
        
        //Le paso los datos
        $this->view->vista("noticias",$noticias);
        
    }
    public function crear() {
        //create
        $nombre = "entrada".rand(1000, 9999);
        $registros = $this->db->exec('INSERT INTO noticias (titulo) VALUES ("'.$nombre.'")');
        if($registros){
            $mensaje[] = [
                'tipo' => 'success',
                'texto' => "La noticia $nombre  se a creado correctamente"
            ];
            
        }else{
            $mensaje[] = [
                'tipo' => 'danger',
                'texto' => " A ocuurido un error al añadir la noticia"
            ];
        }
        $_SESSION['mensajes'] = $mensaje;
        //Le paso los datos
        header("Location:".$_SESSION['home']."panel/noticias");
        
    }
    function activar($id){

        if ($id) {
            $registros = $this->db->exec("UPDATE noticias SET activo=1 WHERE id=" . $id . "");

            if ($registros) {

                $mensaje[] = ['tipo' => 'success',
                    'texto' => 'La noticia se ha activado correctamente.',
                ];


            } else {
                $mensaje[] = ['tipo' => 'danger',
                    'texto' => 'Ha ocurrido un error al activar la noticia.',
                ];
            }
        }else{
            $mensaje[] = ['tipo' => 'danger',
                'texto' => 'La noticia no existe.',
            ];
        }
        $_SESSION['mensajes'] = $mensaje;
        //Le redirijo al panel
        header("location: ".$_SESSION['home']."panel/noticias");


    }
    function desactivar($id){

        if ($id) {
            $registros = $this->db->exec("UPDATE noticias SET activo=0 WHERE id=" . $id . "");

            if ($registros) {

                $mensaje[] = ['tipo' => 'success',
                    'texto' => 'La noticias se ha desactivado correctamente.',
                ];


            } else {
                $mensaje[] = ['tipo' => 'danger',
                    'texto' => 'Ha ocurrido un error al desactivar la noticia.',
                ];
            }
        }else{
            $mensaje[] = ['tipo' => 'danger',
                'texto' => 'La noticia no existe.',
            ];
        }
        $_SESSION['mensajes'] = $mensaje;
        //Le redirijo al panel
        header("location: ".$_SESSION['home']."panel/noticias");


    }
    function borrar($id){

        if ($id) {
            $registros = $this->db->exec("DELETE FROM noticias WHERE id=" . $id . " ");

            if ($registros) {

                $mensaje[] = ['tipo' => 'success',
                    'texto' => 'La noticia se ha borrado correctamente.',
                ];


            } else {
                $mensaje[] = ['tipo' => 'danger',
                    'texto' => 'Ha ocurrido un error al borrar la noticia.',
                ];
            }
        }else{
            $mensaje[] = ['tipo' => 'danger',
                'texto' => 'La noticia no existe.',
            ];
        }
        $_SESSION['mensajes'] = $mensaje;
        //Le redirijo al panel
        header("location: ".$_SESSION['home']."panel/noticias");


    }
    
    function editar($id) {

        if ($id) {
            if(isset($_POST['guardar']) AND  $_POST['guardar'] == "Guardar"){
                
                $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                
                $entradilla = filter_input(INPUT_POST, 'entradilla', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                
                $texto = filter_input(INPUT_POST, 'texto');
                
                # Convierte todo a minúscula
                $slug = strtolower($titulo);
                # Caracteres en español (Aquí en este arreglo incluí muchos que no son del uso
                $tabla = array(
                    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'C'=>'C', 'c'=>'c', 'C'=>'C', 'c'=>'c',
                    'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                    'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
                    'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'S',
                    'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
                    'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
                    'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
                    'ÿ'=>'y', 'R'=>'R', 'r'=>'r', ','=>''
                );
                # Reemplazamos lo antes establecido
                $slug = strtr($slug, $tabla);
                # Removemos caracteres especiales que no hayan sido sustituidos anteriormente
                $slug = preg_replace('/[^a-zA-Z0-9]/i',' ', $slug);
                # Removemos si existen espacios en blanco en los extremos 
                $slug = trim($slug);
                # Rellenamos espacios con guiones
                $slug = preg_replace('/\s+/', ' ', $slug);
                $slug = preg_replace('/\s+/', '-', $slug);
  
                
                $ruta = "../public/img/noticias/";
                $imagen = $_FILES['imagen'];
                $archivo_subido = $ruta . basename($imagen['name']);
                if (is_uploaded_file($imagen['tmp_name']) AND move_uploaded_file($imagen['tmp_name'], $archivo_subido)) {
                        echo "El fichero es válido y se subió con éxito.\n";
                } else {
                        echo "¡Posible ataque de subida de ficheros!\n";
                }
               
                $this->db->beginTransaction();
                
                $this->db->exec("UPDATE noticias SET titulo='".$titulo."' WHERE id='".$id."'");
                $this->db->exec("UPDATE noticias SET entradilla='".$entradilla."' WHERE id='".$id."'");
                $this->db->exec("UPDATE noticias SET texto='".$texto."' WHERE id='".$id."'");
                $this->db->exec("UPDATE noticias SET imagen='".$ruta.$imagen."' WHERE id='".$id."'");
                $this->db->exec("UPDATE noticias SET autor='".$_SESSION['usuario']."' WHERE id='".$id."'");
                $this->db->exec("UPDATE noticias SET slug='".$slug."' WHERE id='".$id."'");
                $this->db->commit();
                
                $mensaje[] = ['tipo' => 'success',
                    'texto' => 'La noticia <strong>'.$titulo.'</strong> se ha editado correctamente'];
                header("location: " . $_SESSION['home'] . "panel/noticias");
                
            }else{
               $resultado = $this->db->query("SELECT * FROM noticias WHERE id='" . $id . "'");
                $noticia = $resultado->fetch(\PDO::FETCH_OBJ);
                if ($noticia) {
                    $this->view->vista('noticia', $noticia);
                } else {
                    $mensaje[] = ['tipo' => 'danger',
                        'texto' => 'Ha ocurrido un error al editar la noticia'];
                    $_SESSION['mensajes'] = $mensaje;
                    header("location: " . $_SESSION['home'] . "panel/noticias");
                } 
            }           
        } else {
            $mensaje[] = ['tipo' => 'danger',
                'texto' => 'Ha ocurrido un error al editar la noticia'];
            $_SESSION['mensajes'] = $mensaje;
            header("location: " . $_SESSION['home'] . "panel/noticias");
        }
    }
    function desactivarhome($id){

        if ($id) {
            $registros = $this->db->exec("UPDATE noticias SET home=0 WHERE id=" . $id . "");

            if ($registros) {

                $mensaje[] = ['tipo' => 'success',
                    'texto' => 'La noticia desaparecera de el home.',
                ];


            } else {
                $mensaje[] = ['tipo' => 'danger',
                    'texto' => 'Ha ocurrido un error al desactivar la noticia.',
                ];
            }
        }else{
            $mensaje[] = ['tipo' => 'danger',
                'texto' => 'La noticia no existe.',
            ];
        }
        $_SESSION['mensajes'] = $mensaje;
        //Le redirijo al panel
        header("location: ".$_SESSION['home']."panel/noticias");


    }
    function activarhome($id){

        if ($id) {
            $registros = $this->db->exec("UPDATE noticias SET home=1 WHERE id=" . $id . "");

            if ($registros) {

                $mensaje[] = ['tipo' => 'success',
                    'texto' => 'La noticia aparecera en el home.',
                ];


            } else {
                $mensaje[] = ['tipo' => 'danger',
                    'texto' => 'Ha ocurrido un error al activar la noticia.',
                ];
            }
        }else{
            $mensaje[] = ['tipo' => 'danger',
                'texto' => 'La noticia no existe.',
            ];
        }
        $_SESSION['mensajes'] = $mensaje;
        //Le redirijo al panel
        header("location: ".$_SESSION['home']."panel/noticias");


    }

}

