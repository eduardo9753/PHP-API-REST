<?php

//MODELOS
include_once "models/GeneroModel.php";

//DATOS
include_once "data/Genero.php";


//UTILS


class GeneroController
{

    //VARIABLES MODELOS
    public $GENEROMODELO;

    //CONSTRUCTOR
    public function __construct()
    {
        $this->GENEROMODELO = new GeneroModel();
    }


    //METODO INSERTAR GENERO (POST)
    public function guardarGenero()
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
                    $genero = new Genero();
                    $genero->setGenero($datos->genero); //VARIABLE EN LA CUAL SE MANDA POR HTTP

                    $guardar = $this->GENEROMODELO->insertarGenero($genero);

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

    //VER LOS DATOS DE GENERO (GET)
    public function verDatoGenero()
    {
        try {
            $datos = $this->GENEROMODELO->dataGenero();

            if ($datos) {
                echo json_encode($datos);
            } else {
                echo json_encode("NO HAY DATOS REGISTRADOS EN LA BD DEL SISTEMA");
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    //VER UN GENERO POR ID
    public function verDatoGeneroPorId()
    {
        try {
            $metodo_http = $_SERVER['REQUEST_METHOD'];

            switch ($metodo_http):
                case 'GET':

                    $datos = json_decode(file_get_contents('php://input'), false);
                    $genero = new Genero();
                    $genero->setId($datos->id);

                    $datos = $this->GENEROMODELO->dataGeneroPorId($genero);

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

    //ACTUALIZAR DATOS GENERO
    public function actualizarDatoGenero()
    {
        try {
            $metodo_http = $_SERVER['REQUEST_METHOD'];

            switch ($metodo_http):
                case 'PUT':

                    $datos = json_decode(file_get_contents('php://input'), false);
                    $genero = new Genero();
                    $genero->setId($datos->id);
                    $genero->setGenero($datos->genero);

                    $guardar = $this->GENEROMODELO->actualizarGenero($genero);

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
