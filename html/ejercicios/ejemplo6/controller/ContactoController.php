<?php
namespace App\Controller;
use App\Model\Contacto;

class ContactoController {
    public function index() {
        $contacto = new Contacto ("Jairo","Garcia",43,"");
        
        $contacto ->setEmail("soniiribeiro96@gmail.com");
        
        require ("view/index.php");
        
    }
}
