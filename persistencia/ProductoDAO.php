<?php
class ProductoDAO{
    private $idproducto;
    private $nombre;
    private $precio;
    private $talla;
    private $categoria;    
    
    public function ProductoDAO($id="", $nombre="", $precio="", $talla="", $categoria=""){
        $this -> idproducto = $id;
        $this -> nombre = $nombre;
        $this -> precio = $precio;
        $this -> talla = $talla;
        $this -> categoria = $categoria;
    }
    
    public function insertar(){
        return "insert into producto (nombre, precio, talla_idtalla, categoria_idcategoria )
                values (
                '" . $this -> nombre . "',
                '" . $this -> precio . "',
                '" . $this -> talla . "',
                '" . $this -> categoria . "'
                )";
    }
    
    
    // public function consultarTodos($atributo, $direccion, $filas, $pag){
    //     return "select idProducto, nombre, precio, cantidad, imagen, administrador_idadministrador, marca_idmarca, tipoproducto_idtipoproducto
    //             from producto " . 
    //             (($atributo != "" && $direccion != "")?"order by " . $atributo . " " . $direccion:"") . 
    //             " limit " . (($pag-1)*$filas) . ", " . $filas; 
    // }
    
    // public function consultarTotalFilas(){
    //     return "select count(idProducto) 
    //             from producto";
    // }
    
}