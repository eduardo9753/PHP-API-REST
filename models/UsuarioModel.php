<?php

//CONEXION BASE DE DATOS
include_once('config/Conexion.php');


class UsuarioModelo
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

    //INSERTAR USUARIO
    public function insertarUsuario(Usuario $usuario)
    {
        try {
            $sql = "INSERT INTO dbousuarios(nombre,email,pass) VALUES(?,?,?)";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute(array(
                $usuario->getnombre(),
                $usuario->getemail(),
                $usuario->getpass()
            ));
            return $stm;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    //ACTUALZAR DATO USUARIO POR ID 
    public function actualizarUsuario(Usuario $usuario)
    {
        try {
            $sql = "UPDATE dbousuarios SET nombre =?, 
                                           email=?,
                                           pass =? WHERE id=?";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute(array(
                $usuario->getnombre(),
                $usuario->getemail(),
                $usuario->getpass(),
                $usuario->getId()
            ));
            return $stm;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }


    //SELECT DE LA TABLA USUARIO
    public function dataUsuario()
    {
        try {
            $sql = "SELECT * FROM zapatosphp.dbousuarios";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }


    //SELECT DE UNA FILA DE LA TABLA USUARIO POR ID
    public function dataUsuarioPorId(Usuario $usuario)
    {
        try {
            $sql = "SELECT * FROM zapatosphp.dbousuarios e WHERE e.id =?";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute(
                array($usuario->getId())
            );
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
