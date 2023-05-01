<?php

//CONEXION BASE DE DATOS
include_once('config/Conexion.php');


class EstiloModel
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

    //INSERTAR ESTILO
    public function insertarEstilo(Estilo $estilo)
    {
        try {
            $sql = "INSERT INTO dboestilo(estilo) VALUES(?)";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute(array(
                $estilo->getEstilo()
            ));
            return $stm;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    //ACTUALZAR DATO ESTILO POR ID 
    public function actualizarEstilo(Estilo $estilo)
    {
        try {
            $sql = "UPDATE dboestilo SET estilo =? WHERE id=?";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute(array(
                $estilo->getEstilo(),
                $estilo->getId()
            ));
            return $stm;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }


    //SELECT DE LA TABLA ESTILO
    public function dataEstilo()
    {
        try {
            $sql = "SELECT * FROM zapatosphp.dboestilo";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }


    //SELECT DE UNA FILA DE LA TABLA ESTILO POR ID
    public function dataEstiloPorId(Estilo $estilo)
    {
        try {
            $sql = "SELECT * FROM zapatosphp.dboestilo e WHERE e.id =?";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute(
                array($estilo->getId())
            );
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
