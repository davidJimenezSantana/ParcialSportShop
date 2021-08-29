<?php
require_once "persistencia/Conexion.php";
require_once "persistencia/ProductoDAO.php";
require_once "Categoria.php";
require_once "Talla.php";
class Producto
{
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


    function __construct($id = "", $nombre = "", $precio = "", $talla = "", $categoria = "")
    {   
        
        $this->idproducto = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->talla = $talla;
        $this->categoria = $categoria;
        $this->conexion = new Conexion();
        $this->productoDAO = new ProductoDAO($id, $nombre, $precio, $talla, $categoria);
        
    }

    public function insertar()
    {
        
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->productoDAO->insertar());
        $this->conexion->cerrar();
    }


    public function consultarTodos( $filas, $pag)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->productoDAO->consultarTodos($filas, $pag));

        $productos = array();

        while (($resultado = $this->conexion->extraer()) != null){
            array_push($productos, new Producto($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4]));
        
        }

        while (($resultado = $this->conexion->extraer()) != null) {

            if ($resultado[3] != null && $resultado[3] != "") {
                $talla = new Talla($resultado[3]);
                $talla->consultar();
            }
            if ($resultado[4] != null && $resultado[4] != "") {
                $categoria = new Categoria($resultado[4]);
            }

            array_push($productos, new Producto($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4]));
        }

        $this->conexion->cerrar();
        return $productos;
    }


    public function consultarTotalFilas()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->productoDAO->consultarTotalFilas());
        $this->conexion->cerrar();
        return $this->conexion->extraer()[0];
        
    }
}
