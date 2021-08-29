<?php
class ProductoDAO
{
    private $idproducto;
    private $nombre;
    private $precio;
    private $talla;
    private $categoria;

    function __construct($id = "", $nombre = "", $precio = "", $talla = "", $categoria = "")
    {
        $this->idproducto = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->talla = $talla;
        $this->categoria = $categoria;
    }

    public function insertar()
    {
        return "insert into producto (nombre, precio, talla_idtalla, categoria_idcategoria )
                values (
                '" . $this->nombre . "',
                '" . $this->precio . "',
                '" . $this->talla . "',
                '" . $this->categoria . "'
                )";
    }


    public function consultarTodos($filas, $pag)
    {
        return "SELECT `idproducto`, `nombre`, `precio`, `talla_idtalla`, `categoria_idcategoria`
                 FROM `producto` limit " . (($pag - 1) * $filas) . ", " . $filas;
    }

    public function consultarTotalFilas(){
        return "select count(idproducto) 
                from producto";
    }

}
