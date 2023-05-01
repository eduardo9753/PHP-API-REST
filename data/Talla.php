<?php

class  Talla
{

    //ATRIBUTOS
    private $id;
    private $talla;

    //CONSTRUCTOR
    public function __construct()
    {
        $this->id = 0;
        $this->talla = "";
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
    public function setTalla($talla)
    {
        $this->talla = $talla;
    }

    //RETORNA ESE ELEMENTO
    public function getTalla()
    {
        return $this->talla;
    }
}
