<?php

namespace App\Model;

class Noticia {
    
    //Variables o atributos
    var $id;
    var $titulo;
    var $entradilla;
    var $texto;
    var $fecha_alta; 
    var $fecha_mod;
    var $fecha_pub;
    var $activo;
    var $autor;
    var $borrado;
    var $home;
    
    function __construct($data){
        
        $this->id = $data->id;
        $this->titulo = $data->titulo;
        $this->entradilla = $data->entradilla;
        $this->texto = $data->texto;
        $this->fecha_alta = $data->fecha_alta;
        $this->fecha_mod = $data->fecha_mod;
        $this->fecha_pub = $data->fecha_pub;
        $this->activo = $data->activo;
        $this->autor = $data->autor;
        $this->borrado = $data->borrado;
        $this->home = $data->home;
        
    }
}