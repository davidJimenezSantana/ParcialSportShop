<?php
require_once "persistencia/Conexion.php";
require_once "persistencia/TallaDAO.php";

class Talla{

    private $id;
    private $nombre;
    private $tallaDaO;
    private $conexion;

     function __construct($id = "",$nombre =""){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->conexion = new Conexion();
        $this->tallaDaO = new TallaDAO($id,$nombre);
    }

    public function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> tallaDaO -> consultarTodos());

        $tallas = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($tallas, new Talla($resultado[0], $resultado[1]));            
        }
        $this -> conexion -> cerrar();
        return $tallas;
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }
}

?>