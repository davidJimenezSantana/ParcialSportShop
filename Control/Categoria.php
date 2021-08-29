<?php
require_once "persistencia/Conexion.php";
require_once "persistencia/CategoriaDAO.php";

class Categoria{

    private $id;
    private $nombre;
    private $categoriaDaO;
    private $conexion;

    function __construct($id = "",$nombre =""){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->conexion = new Conexion();
        $this->categoriaDaO = new CategoriaDAO($id,$nombre);
    }

    public function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> categoriaDaO -> consultarTodos());

        $categorias = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($categorias, new Categoria($resultado[0], $resultado[1]));            
        }
        $this -> conexion -> cerrar();
        return $categorias;
    }

    public function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> categoriaDaO -> consultar());
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