<?php
require_once "persistencia/Conexion.php";
require_once "persistencia/TallaDAO.php";

class Talla{

    private $id;
    private $nombre;
    private $tallaDAO;
    private $conexion;

     function __construct($id = "",$nombre =""){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->conexion = new Conexion();
        $this->tallaDAO = new TallaDAO($id,$nombre);
    }

    public function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> tallaDAO -> consultarTodos());

        $tallas = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($tallas, new Talla($resultado[0], $resultado[1]));            
        }
        $this -> conexion -> cerrar();
        return $tallas;
    }

    public function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> tallaDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0]; 
        $this -> conexion -> cerrar();
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