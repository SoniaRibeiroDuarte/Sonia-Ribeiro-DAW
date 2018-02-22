<?php
namespace App\Controller;

use App\Model\Noticia;
use App\Helper\ViewHelper;
use App\Helper\DbHelper;

class AppController {
    
    var $db;
    var $viewHelper;
    var $datos;
    
    function __construct() {
        
        $dbHelper = new DbHelper();
        $this->db = $dbHelper->db ;
        //instancio el viewHelper
        $viewHelper = new ViewHelper();
        $this->view = $viewHelper;
    }
    public function index() {
        //Select con OBJ
        $resultado = $this->db->query("SELECT * FROM noticias WHERE activo=1 AND home=1");
        //Asigno la consulta a una variable
        while ($data = $resultado->fetch(\PDO::FETCH_OBJ)){ //Recorro el resultado
            $noticias[] = new Noticia($data);
        }
        
        //Le paso los datos
        $this->view->vista("home",$noticias);
        
    }
    public function todasNoticias() {
        //Select con OBJ
        $resultado = $this->db->query("SELECT * FROM noticias WHERE activo=1");
        //Asigno la consulta a una variable
        while ($data = $resultado->fetch(\PDO::FETCH_OBJ)){ //Recorro el resultado
            $noticias[] = new Noticia($data);
        }
        
        //Le paso los datos
        $this->view->vista("todas_noticias",$noticias);
        
    }
    public function contacto() {
        
        //Le paso los datos
        $this->view->vista("contacto","");
        
    }
    function mostrarNoticia ($slug)
    {
        if ($slug) {
            //Select con OBJ
            $resultado = $this->db->query("SELECT * FROM noticias WHERE slug='" .$slug . "' LIMIT 1");
            
            while ($data = $resultado->fetch(\PDO::FETCH_OBJ)){ //Recorro el resultado
            $noticias[] = new Noticia($data);
            }
            // Le paso los datos
            $this->view->vista("mostrar_noticia",$noticias);
        }
    }

}

