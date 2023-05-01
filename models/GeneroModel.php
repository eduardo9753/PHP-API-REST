<?php

//CONEXION BASE DE DATOS
include_once('config/Conexion.php');


class GeneroModel
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

    //INSERTAR GENERO
    public function insertarGenero(Genero $genero)
    {
        try {
            $sql = "INSERT INTO dbogenero(genero) VALUES(?)";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute(array(
                $genero->getGenero()
            ));
            return $stm;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    //ACTUALZAR DATO GENERO POR ID 
    public function actualizarGenero(Genero $genero)
    {
        try {
            $sql = "UPDATE dbogenero SET genero =? WHERE id=?";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute(array(
                $genero->getGenero(),
                $genero->getId()
            ));
            return $stm;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }


    //SELECT DE LA TABLA GENERO
    public function dataGenero()
    {
        try {
            $sql = "SELECT * FROM zapatosphp.dbogenero";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }


    //SELECT DE UNA FILA DE LA TABLA GENERO POR ID
    public function dataGeneroPorId(Genero $genero)
    {
        try {
            $sql = "SELECT * FROM zapatosphp.dbogenero e WHERE e.id =?";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute(
                array($genero->getId())
            );
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
