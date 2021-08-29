<?php
require_once "persistencia/Conexion.php";
require_once "persistencia/ProductoDAO.php";
class Producto{
    private $id;
    private $nombre;
    private $precio;
    private $talla;
    private $categoria;
    private $conexion;
    private $productoDAO;
   
    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getTalla()
    {
        return $this->talla;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }


    function __construct ($id="", $nombre="", $precio="", $talla="", $categoria=""){
        $this -> idproducto = $id;
        $this -> nombre = $nombre;
        $this -> precio = $precio;
        $this -> talla = $talla;
        $this -> categoria = $categoria;
        $this -> conexion = new Conexion();
        $this -> productoDAO = new ProductoDAO($id, $nombre, $precio, $talla, $categoria);
    }
    
    public function insertar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productoDAO -> insertar());
        $this -> conexion -> cerrar();
    }
        
    
    // public function consultarTodos($atributo, $direccion, $filas, $pag){
    //     $this -> conexion -> abrir(); 
    //     echo $this -> productoDAO -> consultarTodos($atributo, $direccion, $filas, $pag);
    //     $this -> conexion -> ejecutar($this -> productoDAO -> consultarTodos($atributo, $direccion, $filas, $pag));
    //     $productos = array();
    //     while(($resultado = $this -> conexion -> extraer()) != null){
    //         $administrador = new Administrador($resultado[5]);
    //         $administrador -> consultar();
    //         $marca = new Marca($resultado[6]);
    //         $marca -> consultar();
    //         $tipoproducto = new TipoProducto($resultado[7]);
    //         $tipoproducto -> consultar();
    //         array_push($productos, new Producto($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $administrador, $marca, $tipoproducto));            
    //     }
    //     $this -> conexion -> cerrar();
    //     return $productos;
    // }
    
    // public function consultarTotalFilas(){
    //     $this -> conexion -> abrir();        
    //     $this -> conexion -> ejecutar($this -> productoDAO -> consultarTotalFilas());
    //     return $this -> conexion -> extraer()[0];
    // }
    

}