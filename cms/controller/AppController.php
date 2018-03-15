<?php


namespace App\controller;


use App\model\Noticia;
use App\helper\ViewHelper;
use App\helper\DbHelper;


class AppController
{

    var $db;
    var $view;
    var $datos;

    function __construct()
    {
        //inicializo la conexion
        $dbHelper = new DbHelper();
        $this->db = $dbHelper->db;
        //Instancio el gestor de vistas
        $viewHelper = new ViewHelper();
        $this->view = $viewHelper;


    }

    public function index()
    {
        //Select con OBJ
        $resultado = $this->db->query("SELECT * FROM noticias WHERE activo =1 AND home=1 AND destacado = 1");
        //Asigno la consulta a una variable
        $noticias = [];
        while ($data = $resultado->fetch(\PDO::FETCH_OBJ)) { //Recorro el resultado
            $noticias[] = new Noticia($data);
        }

        //Le paso los datos
        $this->view->vista("home", $noticias);

    }
    public function noticias()
    {
        //Select con OBJ
        $resultado = $this->db->query("SELECT * FROM noticias WHERE activo =1 AND home=1 AND destacado = 0 ");
        //Asigno la consulta a una variable
        $noticias = [];
        while ($data = $resultado->fetch(\PDO::FETCH_OBJ)) { //Recorro el resultado
            $noticias[] = new Noticia($data);
        }

        //Le paso los datos
        $this->view->vista("front_noticias", $noticias);

    }
    public function nosotros()
    {
        //Select con OBJ
        $resultado = $this->db->query("SELECT * FROM noticias WHERE activo =1 AND home=1 ");
        //Asigno la consulta a una variable
        $noticias = [];
        while ($data = $resultado->fetch(\PDO::FETCH_OBJ)) { //Recorro el resultado
            $noticias[] = new Noticia($data);
        }

        //Le paso los datos
        $this->view->vista("home-nosotros", $noticias);

    }

    public function mostrarNoticia($slug)
    {

        if ($slug){
            $resultado = $this->db->query("SELECT * FROM noticias WHERE slug ='".$slug."' LIMIT 1");
            //Select con OBJ

            //Asigno la consulta a una variable
            $noticias = [];
            while ($data = $resultado->fetch(\PDO::FETCH_OBJ)) { //Recorro el resultado
                $noticias[] = new Noticia($data);

            }
            //Le paso los datos
            $this->view->vista("mostrar_noticia", $noticias);

        }


    }




}