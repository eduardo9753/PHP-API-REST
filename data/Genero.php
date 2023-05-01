<?php

class  Genero
{

    //ATRIBUTOS
    private $id;
    private $genero;

    //CONSTRUCTOR
    public function __construct()
    {
        $this->id = 0;
        $this->genero = "";
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
    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    //RETORNA ESE ELEMENTO
    public function getGenero()
    {
        return $this->genero;
    }
}
