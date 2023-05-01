<?php

class  Estilo
{

    //ATRIBUTOS
    private $id;
    private $estilo;

    //CONSTRUCTOR
    public function __construct()
    {
        $this->id = 0;
        $this->estilo = "";
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
    public function setEstilo($estilo)
    {
        $this->estilo = $estilo;
    }

    //RETORNA ESE ELEMENTO
    public function getEstilo()
    {
        return $this->estilo;
    }
}
