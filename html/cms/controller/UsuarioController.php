<?php
namespace App\Controller;

use App\Model\Usuario;
use App\Helper\ViewHelper;
use App\Helper\DbHelper;

class UsuarioController {
    
    var $db;
    var $viewHelper;
    function __construct() {
        
        $dbHelper = new DbHelper();
        $this->db = $dbHelper->db ;
        //instancio el viewHelper
        $viewHelper = new ViewHelper();
        $this->view = $viewHelper;
    }
    public function acceso() {
        //inicio mensaje
        $datos = new \stdClass();
        if (isset($_SESSION['usuario']) AND $_SESSION['usuario']) {
            
           $datos->usuario = $_SESSION['usuario'];
           $vista = "panel"; 
        }else{
            $vista = "acceso"; 
        }
        $datos->mensaje = "Introduce usuario y contraseña";
        if(isset($_POST['acceder'])){
            
            $usuario = filter_input(INPUT_POST,'usuario',FILTER_SANITIZE_STRING);
            $clave = filter_input(INPUT_POST,'clave',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if($usuario AND $clave){
                //compruebo que el usuario existe
                if($this->comprueba_usuario($usuario,$clave)){
                    $datos->usuario = $_SESSION['usuario'];
                    $vista = "panel";
                }else{
                    $datos->mensaje = "<span class='rojo'>Usuario o clave incorrecto</span>";
                }
            }
        }
        //le paso los datos
        $this->view->vista($vista,$datos);
        
    }
    function comprueba_usuario($usuario,$clave){
        
        //Select con OBJ
        $resultado = $this->db->query("SELECT * FROM usuarios where usuario='".$usuario."'");
        //asigno la consulta a una variable
        $data = $resultado->fetch(\PDO::FETCH_OBJ);
        //compruebo la contraseña
        if($data AND hash_equals($data->clave, crypt($clave, $data->clave))){
            //añado el nombre de usuario a la sesion
            $_SESSION['usuario'] = $data ->usuario;
            return 1;
        }else{
            return 0;
        }
        //return
        return($data) ? 1 : 0;
    }
    public function index() {
        //Select con OBJ
        $resultado = $this->db->query("SELECT * FROM usuarios");
        //Asigno la consulta a una variable
        while ($data = $resultado->fetch(\PDO::FETCH_OBJ)){ //Recorro el resultado
            $usuarios[] = new Usuario($data);
        }
        
        //Le paso los datos
        $this->view->vista("usuarios",$usuarios);
        
    }
    
    public function salir() {
        //añado el nombre de usuario a la sesion
        $_SESSION['usuario'] = "";
        //le redirijo al panel
        header("Location:".$_SESSION['home']."panel");
            
    }
    public function crear() {
        //create
        $nombre = "usuario".rand(1000, 9999);
        $registros = $this->db->exec('INSERT INTO usuarios (usuario) VALUES ("'.$nombre.'")');
        if($registros){
            $mensaje[] = [
                'tipo' => 'success',
                'texto' => "El usuario $nombre  se a creado correctamente"
            ];
            
        }else{
            $mensaje[] = [
                'tipo' => 'danger',
                'texto' => " A ocuurido un error al añadir usuario"
            ];
        }
        $_SESSION['mensajes'] = $mensaje;
        //Le paso los datos
        header("Location:".$_SESSION['home']."panel/usuarios");
        
    }
    function activar($id){

        if ($id) {
            $registros = $this->db->exec("UPDATE usuarios SET activo=1 WHERE id=" . $id . "");

            if ($registros) {

                $mensaje[] = ['tipo' => 'success',
                    'texto' => 'El usuario se ha activado correctamente.',
                ];


            } else {
                $mensaje[] = ['tipo' => 'danger',
                    'texto' => 'Ha ocurrido un error al activar usuario.',
                ];
            }
        }else{
            $mensaje[] = ['tipo' => 'danger',
                'texto' => 'El usuario no existe.',
            ];
        }
        $_SESSION['mensajes'] = $mensaje;
        //Le redirijo al panel
        header("location: ".$_SESSION['home']."panel/usuarios");


    }
    function desactivar($id){

        if ($id) {
            $registros = $this->db->exec("UPDATE usuarios SET activo=0 WHERE id=" . $id . "");

            if ($registros) {

                $mensaje[] = ['tipo' => 'success',
                    'texto' => 'El usuario se ha desactivado correctamente.',
                ];


            } else {
                $mensaje[] = ['tipo' => 'danger',
                    'texto' => 'Ha ocurrido un error al desactivar usuario.',
                ];
            }
        }else{
            $mensaje[] = ['tipo' => 'danger',
                'texto' => 'El usuario no existe.',
            ];
        }
        $_SESSION['mensajes'] = $mensaje;
        //Le redirijo al panel
        header("location: ".$_SESSION['home']."panel/usuarios");


    }
    function borrar($id){

        if ($id) {
            $registros = $this->db->exec("DELETE FROM usuarios WHERE id=" . $id . " ");

            if ($registros) {

                $mensaje[] = ['tipo' => 'success',
                    'texto' => 'El usuario se ha borrado correctamente.',
                ];


            } else {
                $mensaje[] = ['tipo' => 'danger',
                    'texto' => 'Ha ocurrido un error al borrar el usuario.',
                ];
            }
        }else{
            $mensaje[] = ['tipo' => 'danger',
                'texto' => 'El usuario no existe.',
            ];
        }
        $_SESSION['mensajes'] = $mensaje;
        //Le redirijo al panel
        header("location: ".$_SESSION['home']."panel/usuarios");


    }
    
    function editar($id) {

        if ($id) {
            if(isset($_POST['guardar']) AND  $_POST['guardar'] == "Guardar"){
                $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $clave = filter_input(INPUT_POST, 'clave', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $usuarios = (filter_input(INPUT_POST, 'usuarios', FILTER_SANITIZE_STRING)) == 'on' ? 1 : 0;
                $noticias = (filter_input(INPUT_POST, 'noticias', FILTER_SANITIZE_STRING)) == 'on' ? 1 : 0;
                $this->db->beginTransaction();
                $this->db->exec("UPDATE usuarios SET usuario='".$usuario."' WHERE id='".$id."'");
                if(isset($_POST['cambiarclave'])){
                    $this->db->exec("UPDATE usuarios SET clave='".$clave."' WHERE id='".$id."'");
                }
                $this->db->exec("UPDATE usuarios SET usuarios='".$usuarios."' WHERE id='".$id."'");
                $this->db->exec("UPDATE usuarios SET noticias='".$noticias."' WHERE id='".$id."'");
                $this->db->commit();
                
                $mensaje[] = ['tipo' => 'success',
                    'texto' => 'El usuario <strong>'.$usuario.'</strong> se ha editado correctamente'];
                header("location: " . $_SESSION['home'] . "panel/usuarios");
                
            }else{
               $resultado = $this->db->query("SELECT * FROM usuarios WHERE id='" . $id . "'");
                $usuario = $resultado->fetch(\PDO::FETCH_OBJ);
                if ($usuario) {
                    $this->view->vista('usuario', $usuario);
                } else {
                    $mensaje[] = ['tipo' => 'danger',
                        'texto' => 'Ha ocurrido un error al editar el usuario'];
                    $_SESSION['mensajes'] = $mensaje;
                    header("location: " . $_SESSION['home'] . "panel/usuarios");
                } 
            }           
        } else {
            $mensaje[] = ['tipo' => 'danger',
                'texto' => 'Ha ocurrido un error al editar el usuario'];
            $_SESSION['mensajes'] = $mensaje;
            header("location: " . $_SESSION['home'] . "panel/usuarios");
        }
    }

}
