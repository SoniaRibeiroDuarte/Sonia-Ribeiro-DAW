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
        $view = new ViewHelper();
        $this->view = $viewHelper;
    }
    public function acceso() {
        
        //instancio el viewHelper
        $view = new ViewHelper();
        
        //le paso los datos
        $this ->view->vista("acesso",NULL);
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
