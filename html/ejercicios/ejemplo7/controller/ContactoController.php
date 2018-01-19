<?php
namespace App\Controller;
use App\Model\Contacto;
use App\Helper\ViewHelper;

class ContactoController {
    public function index() {
        $contacto = new Contacto ("Sonia","Ribeiro",21,"");
        
        $contacto ->setEmail("soniiribeiro96@gmail.com");
        
        //instancio el view helper
        $view = new ViewHelper();
        
        //le paso los datos
        $view->vista("index",$contacto);
        
    }
}
