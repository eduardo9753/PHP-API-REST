<?php

class Usuario
{
    //ATRIBUTOS
    private $id;
    private $nombre;
    private $email;
    private $pass;


    //CONSTRUCTOR
    public function __construct()
    {
        $this->id = 0;
        $this->nombre = "";
        $this->email = "";
        $this->pass = "";
    }

    //SET(ASIGNA UN ELEMENTO)
    public function setId($id)
    {
        $this->id = $id;
    }

    //RETORNA ESE ELEMENTO
    public function getId()
    {
        return $this->id;
    }


    //SET(ASIGNA UN ELEMENTO)
    public function setnombre($nombre)
    {
        $this->nombre = $nombre;
    }

    //RETORNA ESE ELEMENTO
    public function getnombre()
    {
        return $this->nombre;
    }


    public function setemail($email)
    {
        $this->email = $email;
    }

    //RETORNA ESE ELEMENTO
    public function getemail()
    {
        return $this->email;
    }

    public function setpass($pass)
    {
        $this->pass = $pass;
    }

    //RETORNA ESE ELEMENTO
    public function getpass()
    {
        return $this->pass;
    }
}
