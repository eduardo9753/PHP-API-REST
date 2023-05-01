<?php

//MODELOS
include_once "models/TallaModel.php";

//DATOS
include_once "data/Talla.php";


//UTILS


class TallaController
{

    //VARIABLES MODELOS
    public $TALLAMODELO;

    //CONSTRUCTOR
    public function __construct()
    {
        $this->TALLAMODELO = new TallaModel();
    }


    //METODO INSERTAR TALLA (POST)
    public function guardarTalla()
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
                    $talla = new Talla();
                    $talla->setTalla($datos->talla); //VARIABLE EN LA CUAL SE MANDA POR HTTP

                    $guardar = $this->TALLAMODELO->insertarTalla($talla);

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

    //VER LOS DATOS DE TALLA (GET)
    public function verDatoTalla()
    {
        try {
            $datos = $this->TALLAMODELO->dataTalla();

            if ($datos) {
                echo json_encode($datos);
            } else {
                echo json_encode("NO HAY DATOS REGISTRADOS EN LA BD DEL SISTEMA");
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    //VER UNA TALLA POR ID
    public function verDatoTallaPorId()
    {
        try {
            $metodo_http = $_SERVER['REQUEST_METHOD'];

            switch ($metodo_http):
                case 'GET':

                    $datos = json_decode(file_get_contents('php://input'), false);
                    $talla = new Talla();
                    $talla->setId($datos->id);

                    $datos = $this->TALLAMODELO->dataTallaPorId($talla);

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

    //ACTUALIZAR DATOS TALLA
    public function actualizarDatoTalla()
    {
        try {
            $metodo_http = $_SERVER['REQUEST_METHOD'];

            switch ($metodo_http):
                case 'PUT':

                    $datos = json_decode(file_get_contents('php://input'), false);
                    $talla = new Talla();
                    $talla->setId($datos->id);
                    $talla->setTalla($datos->talla);

                    $guardar = $this->TALLAMODELO->actualizarTalla($talla);

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
