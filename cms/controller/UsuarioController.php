<?php
namespace App\controller;

use App\model\Usuario;
use App\helper\ViewHelper;
use App\helper\DbHelper;

class UsuarioController
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

    public function acceso()
    {
        $datos = new \stdClass();

        //vista por defecto
        if ($_SESSION['usuario']) {
            $datos->usuario = $_SESSION['usuario'];
            $vista = "panel";
        } else {
            $vista = "acceso";
        }


        //inicializo mensaje

        $datos->mensaje = "Por favor, introduce usuario y clave.";


        //compruebo si ha rellenado el formulario
        if (isset($_POST['acceder'])) {
            $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
            $clave = filter_input(INPUT_POST, 'clave', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if ($usuario AND $clave) {
                //compruebo que existe el usuario
                if ($this->comprueba_usuario($usuario, $clave)) {
                    //entro al panel
                    $datos->usuario = $_SESSION['usuario'];
                    $vista = "panel";
                } else {
                    $datos->mensaje = "<span class='rojo'>Usuario y/o incorrectos.<br> Vuelve a intentarlo.</span>";
                }
            }
        }
        //Le paso los datos a la vista

        $this->view->vista($vista, $datos);

    }

    function comprueba_usuario($usuario, $clave)
    {

        //select de OBJ
        $resultado = $this->db->query("SELECT * FROM usuarios WHERE usuario ='" . $usuario . "' AND activo = 1");

        //asigno la consulta a una variable
        $data = $resultado->fetch(\PDO::FETCH_OBJ);

        //compruebo la contraseña
        if ($data AND hash_equals($data->clave, crypt($clave, $data->clave))) {
            //añado el nombre de usuario a la sesion
            $_SESSION['usuario'] = $data->usuario;
            $_SESSION['usuarios'] = $data->usuarios;
            return 1;

        } else {
            return 0;
        }

        //Return
        return ($data) ? 1 : 0;


    }

    public function index()
    {
        $this->permisos();
        //Select con OBJ
        $resultado = $this->db->query("SELECT * FROM usuarios");
        //Asigno la consulta a una variable
        while ($data = $resultado->fetch(\PDO::FETCH_OBJ)) { //Recorro el resultado
            $usuarios[] = new Usuario($data);
        }

        //Le paso los datos
        $this->view->vista("usuarios", $usuarios);

    }



    public function salir()
    {
        //Borro el nombre de usuario a la sesion
        $_SESSION['usuario'] = "";
        $_SESSION['usuarios'] = "";

        //Le redirijo al panel
        header("location: " . $_SESSION['home'] . "panel");


    }

    public function crear()
    {

        $this->permisos();
        //Insert
        $nombre = "usuario" . rand(1000, 9999);
        $registros = $this->db->exec('INSERT INTO usuarios (usuario) VALUES ("' . $nombre . '")');

        if ($registros) {

            $mensaje[] = ['tipo' => 'success',
                'texto' => 'El usuario se ha creado correctamente.',
            ];


        } else {
            $mensaje[] = ['tipo' => 'danger',
                'texto' => 'Ha ocurrido un erro al añadir un nuevo usuario.',
            ];
        }
        $_SESSION['mensajes'] = $mensaje;


        //Le redirijo al panel
        header("location: " . $_SESSION['home'] . "panel/usuarios");


    }


    function activar($id)
    {
        $this->permisos();

        if ($id) {
            $registros = $this->db->exec("UPDATE usuarios SET activo=1 WHERE id=" . $id . "");

            if ($registros) {

                $mensaje[] = ['tipo' => 'success',
                    'texto' => 'El usuario se ha activado correctamente.',
                ];


            } else {
                $mensaje[] = ['tipo' => 'danger',
                    'texto' => 'Ha ocurrido un error al activar usuario.',
                ];
            }
        } else {
            $mensaje[] = ['tipo' => 'danger',
                'texto' => 'El usuario no existe.',
            ];
        }
        $_SESSION['mensajes'] = $mensaje;
        //Le redirijo al panel
        header("location: " . $_SESSION['home'] . "panel/usuarios");


    }

    function desactivar($id)
    {
        $this->permisos();

        if ($id) {
            $registros = $this->db->exec("UPDATE usuarios SET activo=0 WHERE id=" . $id . "");

            if ($registros) {

                $mensaje[] = ['tipo' => 'success',
                    'texto' => 'El usuario se ha desactivado correctamente.',
                ];


            } else {
                $mensaje[] = ['tipo' => 'danger',
                    'texto' => 'Ha ocurrido un error al desactivar usuario.',
                ];
            }
        } else {
            $mensaje[] = ['tipo' => 'danger',
                'texto' => 'El usuario no existe.',
            ];
        }
        $_SESSION['mensajes'] = $mensaje;
        //Le redirijo al panel
        header("location: " . $_SESSION['home'] . "panel/usuarios");


    }

    function borrar($id)
    {
        $this->permisos();

        if ($id) {
            $registros = $this->db->exec("DELETE FROM usuarios WHERE id=" . $id . " ");

            if ($registros) {

                $mensaje[] = ['tipo' => 'success',
                    'texto' => 'El usuario se ha borrado correctamente.',
                ];


            } else {
                $mensaje[] = ['tipo' => 'danger',
                    'texto' => 'Ha ocurrido un error al borrar el usuario.',
                ];
            }
        } else {
            $mensaje[] = ['tipo' => 'danger',
                'texto' => 'El usuario no existe.',
            ];
        }
        $_SESSION['mensajes'] = $mensaje;
        //Le redirijo al panel
        header("location: " . $_SESSION['home'] . "panel/usuarios");


    }


    function editar($id) {
        $this->permisos();

        if ($id) {
            if(isset($_POST['guardar']) AND  $_POST['guardar'] == "guardar"){
                $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $clave = filter_input(INPUT_POST, 'cambiar_clave', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $usuarios = (filter_input(INPUT_POST, 'usuarios', FILTER_SANITIZE_STRING)) == 'on' ? 1 : 0;
                $noticias = (filter_input(INPUT_POST, 'noticias', FILTER_SANITIZE_STRING)) == 'on' ? 1 : 0;

                $this->db->beginTransaction();
                $this->db->exec("UPDATE usuarios SET usuario='".$usuario."' WHERE id='".$id."'");
                $this->db->exec("UPDATE usuarios SET clave='".crypt($clave)."' WHERE id='".$id."'");
                $this->db->exec("UPDATE usuarios SET usuarios='".$usuarios."' WHERE id='".$id."'");
                $this->db->exec("UPDATE usuarios SET noticias='".$noticias."' WHERE id='".$id."'");
                $this->db->commit();

                $mensaje[] = ['tipo' => 'success',
                    'texto' => 'El usuario se ha guardado correctamente.',
                ];
                header("location: " . $_SESSION['home'] . "panel/usuarios");

            }else{
                $resultado = $this->db->query("SELECT * FROM usuarios WHERE id='" . $id . "'");
                $usuario = $resultado->fetch(\PDO::FETCH_OBJ);
                if ($usuario) {
                    $this->view->vista('usuario-editar', $usuario);
                } else {
                    $mensaje[] = ['tipo' => 'danger',
                        'texto' => 'Ha ocurrido un error al editar el usuario'];
                    $_SESSION['mensajes'] = $mensaje;
                    header("location: " . $_SESSION['home'] . "panel/usuarios");
                }
            }
        } else {
            $mensaje[] = ['tipo' => 'danger',
                'texto' => 'Ha ocurrido un error al editar el usuario'];
            $_SESSION['mensajes'] = $mensaje;
            header("location: " . $_SESSION['home'] . "panel/usuarios");
        }
    }
    function permisos(){
        if(!isset($_SESSION['usuarios']) || $_SESSION['usuarios'] != 1){
            $mensaje[] = [
                'tipo' => 'danger',
                'mensaje' => 'Usuario no autorizado.',
            ];
            $_SESSION['mensajes'] = $mensaje;

            header("Location: ".$_SESSION['home']."panel");
        }
    }




}




?>