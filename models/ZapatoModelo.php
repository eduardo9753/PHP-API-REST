<?php

//CONEXION BASE DE DATOS
include_once('config/Conexion.php');


class ZapatoModelo
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

    //INSERTAR ZAPATO
    public function insertarZapato(Zapato $zapato)
    {
        try {
            $sql = "INSERT INTO dbozapato(foto,precio,color,cantidad,id_dboUsuarios,dboestilo_id,dbotalla_id,dbogenero_id)
            VALUES(?,?,?,?,?,?,?,?)";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute(array(
                $zapato->getfoto(),
                $zapato->getprecio(),
                $zapato->getcolor(),
                $zapato->getcantidad(),
                $zapato->getid_dboUsuario(),
                $zapato->getdboestilo_id(),
                $zapato->getdbotalla_id(),
                $zapato->getdbogenero_id()
            ));
            return $stm;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    //ACTUALZAR DATO ZAPATO POR ID 
    public function actualizarZapato(Zapato $zapato)
    {
        try {
            $sql = "UPDATE dbozapato SET foto=?,
                   precio=?,
                   color=?,
                   cantidad=?,
                   id_dboUsuarios=?,
                   dboestilo_id=?,
                   dbotalla_id=?,
                   dbogenero_id=? WHERE id =?";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute(array(
                $zapato->getfoto(),
                $zapato->getprecio(),
                $zapato->getcolor(),
                $zapato->getcantidad(),
                $zapato->getid_dboUsuario(),
                $zapato->getdboestilo_id(),
                $zapato->getdbotalla_id(),
                $zapato->getdbogenero_id(),
                $zapato->getId()
            ));
            return $stm;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }


    //SELECT DE LA TABLA ZAPATO
    public function dataZapato()
    {
        try {
            $sql = "SELECT * FROM zapatosphp.dbozapato";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }


    //SELECT DE UNA FILA DE LA TABLA ZAPATO POR ID
    public function dataZapatoPorId(Zapato $zapato)
    {
        try {
            $sql = "SELECT * FROM zapatosphp.dbozapato e WHERE e.id =?";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute(
                array($zapato->getId())
            );
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
