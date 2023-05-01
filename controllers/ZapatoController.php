<?php

//MODELOS
include_once "models/ZapatoModelo.php";

//DATOS
include_once "data/Zapato.php";


//UTILS


class ZapatoController
{

    //VARIABLES MODELOS
    public $ZAPATOMODELO;

    //CONSTRUCTOR
    public function __construct()
    {
        $this->ZAPATOMODELO = new ZapatoModelo();
    }


    //METODO INSERTAR ZAPATO (POST)
    public function guardarZapato()
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
                    $zapato = new Zapato();
                    $zapato->setfoto($datos->foto); //VARIABLE EN LA CUAL SE MANDA POR HTTP
                    $zapato->setprecio($datos->precio); //VARIABLE EN LA CUAL SE MANDA POR HTTP
                    $zapato->setcolor($datos->color); //VARIABLE EN LA CUAL SE MANDA POR HTTP
                    $zapato->setcantidad($datos->cantidad); //VARIABLE EN LA CUAL SE MANDA POR HTTP
                    $zapato->setid_dboUsuario($datos->id_dboUsuario); //VARIABLE EN LA CUAL SE MANDA POR HTTP
                    $zapato->setdboestilo_id($datos->dboestilo_id); //VARIABLE EN LA CUAL SE MANDA POR HTTP
                    $zapato->setdbotalla_id($datos->dbotalla_id); //VARIABLE EN LA CUAL SE MANDA POR HTTP
                    $zapato->setdbogenero_id($datos->dbogenero_id); //VARIABLE EN LA CUAL SE MANDA POR HTTP

                    $guardar = $this->ZAPATOMODELO->insertarZapato($zapato);

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

    //VER LOS DATOS DE ZAPATO (GET)
    public function verDatoZapato()
    {
        try {
            $datos = $this->ZAPATOMODELO->dataZapato();

            if ($datos) {
                echo json_encode($datos);
            } else {
                echo json_encode("NO HAY DATOS REGISTRADOS EN LA BD DEL SISTEMA");
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    //VER UN ZAPATO POR ID
    public function verDatoZapatoPorId()
    {
        try {
            $metodo_http = $_SERVER['REQUEST_METHOD'];

            switch ($metodo_http):
                case 'GET':

                    $datos = json_decode(file_get_contents('php://input'), false);
                    $zapato = new Zapato();
                    $zapato->setId($datos->id);

                    $datos = $this->ZAPATOMODELO->dataZapatoPorId($zapato);

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

    //ACTUALIZAR DATOS ZAPATO
    public function actualizarDatoZapato()
    {
        try {
            $metodo_http = $_SERVER['REQUEST_METHOD'];

            switch ($metodo_http):
                case 'PUT':

                    $datos = json_decode(file_get_contents('php://input'), false);
                    $zapato = new Zapato();
                    $zapato->setfoto($datos->foto); //VARIABLE EN LA CUAL SE MANDA POR HTTP
                    $zapato->setprecio($datos->precio); //VARIABLE EN LA CUAL SE MANDA POR HTTP
                    $zapato->setcolor($datos->color); //VARIABLE EN LA CUAL SE MANDA POR HTTP
                    $zapato->setcantidad($datos->cantidad); //VARIABLE EN LA CUAL SE MANDA POR HTTP
                    $zapato->setid_dboUsuario($datos->id_dboUsuario); //VARIABLE EN LA CUAL SE MANDA POR HTTP
                    $zapato->setdboestilo_id($datos->dboestilo_id); //VARIABLE EN LA CUAL SE MANDA POR HTTP
                    $zapato->setdbotalla_id($datos->dbotalla_id); //VARIABLE EN LA CUAL SE MANDA POR HTTP
                    $zapato->setdbogenero_id($datos->dbogenero_id); //VARIABLE EN LA CUAL SE MANDA POR HTTP
                    $zapato->setId($datos->id); //VARIABLE EN LA CUAL SE MANDA POR HTTP

                    $guardar = $this->ZAPATOMODELO->actualizarZapato($zapato);

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
