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
        $datos->mensaje = "hola";
        if(isset($_POST['acceder'])){
            
            $usuario = filter_input(INPUT_POST,'usuario',FILTER_SANITIZE_STRING);
            $clave = filter_input(INPUT_POST,'clave',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if($usuario AND $clave){
                //compruebo que el usuario existe
                if($this->comprueba_usuario($usuario,$clave)){
                    $datos->mensaje = "hola majete";
                }else{
                    $datos->mensaje = " usuario  y/o clave incorectos";
                }
            }
        }
        //le paso los datos
        $this->view->vista("acceso",$datos);
        
    }
    function comprueba_usuario($usuario,$clave){
         //inicializo la conexion
        $db = new DbHelper();
        //Select con OBJ
        $resultado = $this->db->query("SELECT * FROM usuarios where usuario='".$usuario."'");
        //asigno la consulta a una variable
        $data = $resultado->fetch(\PDO::FETCH_OBJ);
        //return
        return($data) ? 1 : 0;
    }
    public function index() {
        //inicializo la conexion
        $db = new DbHelper();
        //Select con OBJ
        $resultado = $this->db->query('SELECT * FROM usuarios where id=1');
        
        //asigno la consulta a una variable
        $data = $resultado->fetch(\PDO::FETCH_OBJ);
        
        //paso esa variable al constructor de usuario
        $usuario = new Usuario($data);
        
        //le paso los datos
        $this->view->vista("index",$usuario);
        
    }
}
