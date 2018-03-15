<?php

namespace App;
session_start();

use App\Controller\UsuarioController;
use App\Controller\NoticiaController;
use App\Controller\AppController;

//Ruta de la carpeta public
$public = '/cms/public/';
//Llamo a la cabecera
require("../view/partials/header.php");
//Ruta de la home
$home = '/cms/public/index.php/';
//La guardo a la sesión
$_SESSION['home'] = $home;
//Defino la función que autocargará la clase cuando se instancie (incluyendo el namespace)
spl_autoload_register('App\autoload');

function autoload($clase,$dir=null) {

    //Directorio raíz de mi proyecto
    if (is_null($dir)){
        $dirname = str_replace('/public', '',dirname(__FILE__));

        $dir = realpath($dirname);
    }

    //Escaneo en busca de la clase de forma recursiva
    foreach (scandir($dir) as $file) {
        //Si es un directorio (y no es de sistema), busco la clase dentro de él
        if (is_dir($dir."/".$file) AND substr($file, 0, 1 ) !== '.'){
            autoload($clase, $dir."/".$file);
        }
        //Si es archivo y el nombre coincide con la clase (quitando el namespace)
        else if (is_file($dir."/".$file) AND $file == substr(strrchr($clase, "\\"), 1).".php"){
            require($dir."/".$file);
        }
    }

}

//compruebo la ruta que me esta pidiendo
$home = '/cms/public/index.php/';

//la guardo a la sesión
$_SESSION['home'] = $home;

$ruta = str_replace($home, '',$_SERVER["REQUEST_URI"]);

//enrutamientos
/*
$array_ruta = explode('/',$ruta);

switch (count($array_ruta)){
    case 1: ruta1($array_ruta);
        break;
    case 2: ruta1($array_ruta);
            ruta2($array_ruta);
        echo "estoy en salir , en panel/usuarios,panel/noticias,";
        break;
    case 3: echo "Estoy en el panel/noticias/crear";
        break;
    case 4: echo "estoy editando,activando o borrando";
        break;
    default: echo "pagina incorrecta";
}

function ruta1($array_ruta){
    switch ($array_ruta[0]){
        case "":        return  "";
        case "panel":   return "UsuarioController";
        case "noticias": return "NoticiaController";
        default:        return "Error";
    }
}
//saco la accion
function ruta2($array_ruta){

    $controlador = ruta1($array_ruta);

    switch ($controlador){

        case "UsuarioController": return $array_ruta[1];
        case "NoticiaController": return

    }

    switch ($array_ruta[1]){
        case "":        return  "";
        case "panel":   return "UsuarioController"
        case "noticias": return "NoticiaController";
        default:        return "Error";
    }
}
*/

$array_ruta = explode("/",$ruta);



    if (count($array_ruta) == 2 && isset($array_ruta[1]) && $array_ruta[0] == 'noticia' && isset($array_ruta[1])){
        switch($array_ruta[0]){
            case 'noticia':
                $slug = $array_ruta[1];
                //Instancio el controlador
                require("../view/partials/home-header.php");
                require("../view/partials/home-menu.php");
                $controller = new AppController;
                //le mando el panel de acceso
                $controller->mostrarNoticia($slug);
                require("../view/partials/home-footer.php");
        }

    }else if (count($array_ruta) == 4){

    if ($array_ruta[0].$array_ruta[1] == "panelusuarios"){
        if ($array_ruta[2] == "editar" OR
            $array_ruta[2] == "borrar" OR
            $array_ruta[2] == "desactivar" OR
            $array_ruta[2] == "activar"){
            require("../view/partials/header.php");
            $controller = new UsuarioController;
            $accion = $array_ruta[2];
            $id = $array_ruta[3];
            //Llamo a la accion
            $controller->$accion($id);
            require("../view/partials/footer.php");
        }else{
            $controller = new AppController;
            $controller->index();
        }



    }else if ($array_ruta[0].$array_ruta[1] == "panelnoticias"){
        if ($array_ruta[2] == "editar" OR
            $array_ruta[2] == "borrar" OR
            $array_ruta[2] == "desactivar" OR
            $array_ruta[2] == "activar" OR
            $array_ruta[2] == "destacar" OR
            $array_ruta[2] == "nodestacar"){
            require("../view/partials/header.php");
            $controller = new NoticiaController;
            $accion = $array_ruta[2];
            $id = $array_ruta[3];
            //Llamo a la accion
            $controller->$accion($id);
            require("../view/partials/footer.php");
        }else{
            $controller = new AppController;
            $controller->index();
        }


    }else{
        $controller = new AppController;

        //le mando al metodo index
        $controller->index();
    }

}else{
    switch ($ruta){
        //Panel
        case 'noticias' :
            //Instancio el controlador
            require("../view/partials/home-header.php");
            require("../view/partials/home-menu.php");
            $controller = new AppController;

            //le mando al panel de acceso
            $controller->noticias();
            require("../view/partials/home-footer.php");

            break;
        case 'sobre-nosotros' :
            //Instancio el controlador
            require("../view/partials/home-header.php");
            require("../view/partials/home-menu.php");
            $controller = new AppController;

            //le mando al panel de acceso
            $controller->nosotros();
            require("../view/partials/home-footer.php");

            break;
        case 'panel' :
            //Instancio el controlador
            require("../view/partials/header.php");
            $controller = new UsuarioController;

            //le mando al panel de acceso
            $controller->acceso();
            require("../view/partials/footer.php");
            break;
        case 'panel/salir':
            //Instancio el controlador
            require("../view/partials/header.php");
            $controller = new UsuarioController;

            //le mando al metodo salir
            $controller->salir();
            require("../view/partials/footer.php");
            break;
        case 'panel/usuarios':
            //Instancio el controlador
            require("../view/partials/header.php");
            $controller = new UsuarioController;

            //le mando al metodo index
            $controller->index();
            require("../view/partials/footer.php");
            break;
        case 'panel/noticias':
            //Instancio el controlador
            require("../view/partials/header.php");
            $controller = new NoticiaController;

            //le mando al metodo index
            $controller->index();
            require("../view/partials/footer.php");
            break;
        case 'panel/usuarios/crear':
            //Instancio el controlador
            require("../view/partials/header.php");
            $controller = new UsuarioController;

            //le mando al metodo index
            $controller->crear();
            require("../view/partials/footer.php");
            break;
        case 'panel/noticias/crear':
            //Instancio el controlador
            require("../view/partials/header.php");
            $controller = new NoticiaController;

            //le mando al metodo index
            $controller->crear();
            require("../view/partials/footer.php");
            break;
        default: //Instancio el controlador
            require("../view/partials/home-header.php");
            require("../view/partials/home-menu.php");
            $controller = new AppController;

            //le mando al metodo index
            $controller->index();

            require("../view/partials/home-footer.php");


    }
}





//Llamo al pie

?>