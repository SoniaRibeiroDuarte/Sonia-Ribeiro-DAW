<?php
namespace App\Model;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contacto
 *
 * @author web
 */
class Contacto {
    var $nombre;
    var $apellido;
    var $edad;
    var $email;

    //constructor nuevo
    function __construct($miNombre,$miApellidos,$miEdad,$miEmail){
        $this->nombre = $miNombre;
        $this->apellido = $miApellidos;
        $this->edad = $miEdad;
        $this->email = $miEmail;
    }
    function setEmail($miEmail){
        $this->email = $miEmail;
    }
    function getEmail(){
        return $this->email;
    }
}

