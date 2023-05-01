<?php

//MODELOS
include_once "models/UsuarioModel.php";

//DATOS
include_once "data/Usuario.php";


//UTILS


class UsuarioController
{

    //VARIABLES MODELOS
    public $USUARIOMODELO;

    //CONSTRUCTOR
    public function __construct()
    {
        $this->USUARIOMODELO = new UsuarioModelo();
    }


    //METODO INSERTAR USUARIO (POST)
    public function guardarUsuario()
    {
        try {
            $metodo_http = $_SERVER['REQUEST_METHOD'];

            switch ($metodo_http):
                case 'POST':

                    /*PRIMERA FORMA COMO ARREGLO ASOCIATIVO ['variable']
                    $_POST = json_decode(file_get_contents('php://input'),true);
                    $estilo = new Estilo();
                    $estilo->setEstilo($_POST['estilo']); //VARIABLE EN LA CUAL SE MANDA POR HTTP*/

                    /*SEGUNDO FORMA COMO TIPO OBJETO ->variable*/
                    $datos = json_decode(file_get_contents('php://input'), false);
                    $usuario = new Usuario();
                    $usuario->setnombre($datos->nombre); //VARIABLE EN LA CUAL SE MANDA POR HTTP
                    $usuario->setemail($datos->email); //VARIABLE EN LA CUAL SE MANDA POR HTTP
                    $usuario->setpass($datos->pass); //VARIABLE EN LA CUAL SE MANDA POR HTTP

                    $guardar = $this->USUARIOMODELO->insertarUsuario($usuario);

                    if ($guardar) {
                        echo json_encode("SE GUARDO CORRECTAMENTE LOS DATOS");
                    } else {
                        echo json_encode("NO SE PUDO GUARDAR LOS DATOS");
                    }
                    break;

                default:
                    echo json_encode("EL PROTOCOLO NO ES SEGURO");;
            endswitch;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    //VER LOS DATOS DE USUARIO (GET)
    public function verDatoUsuario()
    {
        try {
            $datos = $this->USUARIOMODELO->dataUsuario();

            if ($datos) {
                echo json_encode($datos);
            } else {
                echo json_encode("NO HAY DATOS REGISTRADOS EN LA BD DEL SISTEMA");
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    //VER UN USUARIO POR ID
    public function verDatoUsuarioPorId()
    {
        try {
            $metodo_http = $_SERVER['REQUEST_METHOD'];

            switch ($metodo_http):
                case 'GET':

                    $datos = json_decode(file_get_contents('php://input'), false);
                    $usuario = new Usuario();
                    $usuario->setId($datos->id);

                    $datos = $this->USUARIOMODELO->dataUsuarioPorId($usuario);

                    if ($datos) {
                        echo json_encode($datos);
                    } else {
                        echo json_encode("NO SE ECONTRO DATOS CON EL ID ENVIADO");
                    }
                    break;

                default:
                    echo json_encode("EL PROTOCOLO NO ES SEGURO");;
            endswitch;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    //ACTUALIZAR DATOS USUARIO
    public function actualizarDatoUsuario()
    {
        try {
            $metodo_http = $_SERVER['REQUEST_METHOD'];

            switch ($metodo_http):
                case 'PUT':

                    $datos = json_decode(file_get_contents('php://input'), false);
                    $usuario = new Usuario();
                    $usuario->setnombre($datos->nombre); //VARIABLE EN LA CUAL SE MANDA POR HTTP
                    $usuario->setemail($datos->email); //VARIABLE EN LA CUAL SE MANDA POR HTTP
                    $usuario->setpass($datos->pass); //VARIABLE EN LA CUAL SE MANDA POR HTTP
                    $usuario->setId($datos->id);

                    $guardar = $this->USUARIOMODELO->actualizarUsuario($usuario);

                    if ($guardar) {
                        echo json_encode("SE ACTUALIZO CORRECTAMENTE LOS DATOS");
                    } else {
                        echo json_encode("NO SE PUDO ACTUALIZAR LOS DATOS");
                    }
                    break;

                default:
                    echo json_encode("EL PROTOCOLO NO ES SEGURO");;
            endswitch;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
