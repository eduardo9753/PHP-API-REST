<?php

class  Zapato
{

    //ATRIBUTOS
    private $id;
    private $foto;
    private $precio;
    private $color;
    private $cantidad;
    private $id_dboUsuario;
    private $dboestilo_id;
    private $dbotalla_id;
    private $dbogenero_id;


    //CONSTRUCTOR
    public function __construct()
    {
        $this->id = 0;
        $this->foto = "";
        $this->precio = "";
        $this->color = "";
        $this->cantidad = 0;
        $this->id_dboUsuario = 0;
        $this->dboestilo_id = 0;
        $this->dbotalla_id = 0;
        $this->dbogenero_id = 0;
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
    public function setfoto($foto)
    {
        $this->foto = $foto;
    }

    //RETORNA ESE ELEMENTO
    public function getfoto()
    {
        return $this->foto;
    }


    public function setprecio($precio)
    {
        $this->precio = $precio;
    }

    //RETORNA ESE ELEMENTO
    public function getprecio()
    {
        return $this->precio;
    }

    public function setcolor($color)
    {
        $this->color = $color;
    }

    //RETORNA ESE ELEMENTO
    public function getcolor()
    {
        return $this->color;
    }

    public function setcantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    //RETORNA ESE ELEMENTO
    public function getcantidad()
    {
        return $this->cantidad;
    }

    public function setid_dboUsuario($id_dboUsuario)
    {
        $this->id_dboUsuario = $id_dboUsuario;
    }

    //RETORNA ESE ELEMENTO
    public function getid_dboUsuario()
    {
        return $this->id_dboUsuario;
    }

    public function setdboestilo_id($dboestilo_id)
    {
        $this->dboestilo_id = $dboestilo_id;
    }

    //RETORNA ESE ELEMENTO
    public function getdboestilo_id()
    {
        return $this->dboestilo_id;
    }

    public function setdbotalla_id($dbotalla_id)
    {
        $this->dbotalla_id = $dbotalla_id;
    }

    //RETORNA ESE ELEMENTO
    public function getdbotalla_id()
    {
        return $this->dbotalla_id;
    }

    public function setdbogenero_id($dbogenero_id)
    {
        $this->dbogenero_id = $dbogenero_id;
    }

    //RETORNA ESE ELEMENTO
    public function getdbogenero_id()
    {
        return $this->dbogenero_id;
    }
}
