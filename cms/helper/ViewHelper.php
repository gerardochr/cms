<?php
namespace App\helper;

class ViewHelper {

    public function vista($vista,$datos){

        $archivo = "../view/$vista.php";
        require($archivo);

    }

}
?>