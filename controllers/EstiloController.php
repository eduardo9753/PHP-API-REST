<?php

//MODELOS
include_once "models/EstiloModel.php";

//DATOS
include_once "data/Estilo.php";


//UTILS


class EstiloController
{

    //VARIABLES MODELOS
    public $ESTILOMODELO;

    //CONSTRUCTOR
    public function __construct()
    {
        $this->ESTILOMODELO = new EstiloModel();
    }


    //METODO INSERTAR ESTILO (POST)
    public function guardarEstilo()
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
                    $estilo = new Estilo();
                    $estilo->setEstilo($datos->estilo); //VARIABLE EN LA CUAL SE MANDA POR HTTP

                    $guardar = $this->ESTILOMODELO->insertarEstilo($estilo);

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

    //VER LOS DATOS DE ESTILO (GET)
    public function verDatoEstilo()
    {
        try {
            $datos = $this->ESTILOMODELO->dataEstilo();

            if ($datos) {
                echo json_encode($datos);
            } else {
                echo json_encode("NO HAY DATOS REGISTRADOS EN LA BD DEL SISTEMA");
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    //VER UN ESTILO POR ID
    public function verDatoEstiloPorId()
    {
        try {
            $metodo_http = $_SERVER['REQUEST_METHOD'];

            switch ($metodo_http):
                case 'GET':

                    $datos = json_decode(file_get_contents('php://input'), false);
                    $estilo = new Estilo();
                    $estilo->setId($datos->id);

                    $datos = $this->ESTILOMODELO->dataEstiloPorId($estilo);

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

    //ACTUALIZAR DATOS ESTILO
    public function actualizarDatoEstilo()
    {
        try {
            $metodo_http = $_SERVER['REQUEST_METHOD'];

            switch ($metodo_http):
                case 'PUT':

                    $datos = json_decode(file_get_contents('php://input'), false);
                    $estilo = new Estilo();
                    $estilo->setId($datos->id);
                    $estilo->setEstilo($datos->estilo);

                    $guardar = $this->ESTILOMODELO->actualizarEstilo($estilo);

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
