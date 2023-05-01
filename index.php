<?php

//CONTROLADORES
include_once "controllers/EstiloController.php";
include_once "controllers/GeneroController.php";
include_once "controllers/TallaController.php";
include_once "controllers/ZapatoController.php";
include_once "controllers/UsuarioController.php";


//HORA LATINOAMERICANA
date_default_timezone_set("America/Lima");


//VARIABLES CONTROLADORES
$EstiloController = new EstiloController();
$GeneroController = new GeneroController();
$TallaController = new TallaController();
$ZapatoController = new ZapatoController();
$UsuarioController = new UsuarioController();

//LLAMADA DE LOS METODOS
if (!isset($_REQUEST['ruta'])) { //SI NO HAY PETION DEL USUARIO MOSTRAMOS ESE MENSAJE
    echo "SIN CONSUMO DE DATOS";
} else {
    $peticion = $_REQUEST['ruta']; //VARIABLE DONDE ALMACENAMOS LA PETICION

    if (method_exists($EstiloController, $peticion)) { //NOS ASEGURAMOS QUE EXISTA EL METODO
        call_user_func(array($EstiloController, $peticion));  //SI EXISTE ENTONCES LOS LLAMAMOS
    } else if (method_exists($GeneroController, $peticion)) {
        call_user_func(array($GeneroController, $peticion));
    } else if (method_exists($TallaController, $peticion)) {
        call_user_func(array($TallaController, $peticion));
    } else if (method_exists($ZapatoController, $peticion)) {
        call_user_func(array($ZapatoController, $peticion));
    } else if (method_exists($UsuarioController, $peticion)) {
        call_user_func(array($UsuarioController, $peticion));
    } else {
        echo "EL METODO O FUNCION NO ESTA DISPONIBLE O NO EXISTE";
    }
}
