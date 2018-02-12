<?php
namespace App\Model;

class Noticia {
    var $id;
    var $titulo;
    var $entradilla;
    var $texto;
    var $fecha_alta;
    var $fecha_mod;
    var $activo;
    var $autor;
    var $borrado;
    var $slug;
    var $fecha_pub;
    var $home;
    //constructor
    function __construct($data){
        $this->id = $data->id;
        $this->titulo = $data->titulo;
        $this->entradilla = $data->entradilla;
        $this->texto = $data->texto;
        $this->fecha_alta = $data->fecha_alta;
        $this->fecha_mod = $data->fecha_mod;
        $this->activo = $data->activo;
        $this->autor = $data->autor;
        $this->borrado = $data->borrado;
        $this->slug = $data->slug;
        $this->fecha_pub = $data->fecha_pub;
        $this->home = $data->home;
    }
}