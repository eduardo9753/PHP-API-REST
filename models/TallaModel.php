<?php

//CONEXION BASE DE DATOS
include_once('config/Conexion.php');


class TallaModel
{
    //VARIABLE CONEXION
    public $MYSQL;

    //INCIALIZAMOS LA CONEXION CON LA BASE DE DATOS
    public function __construct()
    {
        try {
            //INSTANCIA DE LA CLASE CONEXION
            $this->MYSQL = new Conexion();
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    //INSERTAR TALLA
    public function insertarTalla(Talla $talla)
    {
        try {
            $sql = "INSERT INTO dbotalla(talla) VALUES(?)";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute(array(
                $talla->getTalla()
            ));
            return $stm;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    //ACTUALZAR DATO TALLA POR ID 
    public function actualizarTalla(Talla $talla)
    {
        try {
            $sql = "UPDATE dbotalla SET talla =? WHERE id=?";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute(array(
                $talla->getTalla(),
                $talla->getId()
            ));
            return $stm;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }


    //SELECT DE LA TABLA TALLA
    public function dataTalla()
    {
        try {
            $sql = "SELECT * FROM zapatosphp.dbotalla";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }


    //SELECT DE UNA FILA DE LA TABLA TALLA POR ID
    public function dataTallaPorId(Talla $talla)
    {
        try {
            $sql = "SELECT * FROM zapatosphp.dbotalla e WHERE e.id =?";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute(
                array($talla->getId())
            );
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
