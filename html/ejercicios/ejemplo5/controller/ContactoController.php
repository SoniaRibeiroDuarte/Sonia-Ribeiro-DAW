<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContactoController
 *
 * @author web
 */
class ContactoController {
    public function index() {
        $contacto = new Contacto ("Jairo","Garcia",43,"");
        
        $contacto ->setEmail("soniiribeiro96@gmail.com");
        
        require ("view/index.php");
        
    }
}
