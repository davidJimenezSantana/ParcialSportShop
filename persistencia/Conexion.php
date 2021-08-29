<?php
class Conexion{
    private $mysqli;
    private $resultado;
    
    public function abrir(){
        $this -> mysqli = new mysqli("localhost","root","","sportshop");

        if (mysqli_connect_errno()) {
            echo ("Conexion a la base de datos fallida: " .  mysqli_connect_error());
            exit();
        }
        //$this -> mysqli = new mysqli("localhost", "itiud_amazonas", "86Q2fyaICa", "itiud_amazonas"); 
               
        $this -> mysqli -> set_charset("utf8");
    }

    public function cerrar(){
        $this -> mysqli -> close();
    }
    
    public function ejecutar($sentencia){
        $this -> resultado = $this -> mysqli -> query($sentencia);
    }
    
    public function extraer(){
        return $this -> resultado -> fetch_row();
    }

      
    public function numFilas(){
        return ($this -> resultado != null) ? $this -> resultado -> num_rows : 0; 
    }
}
?>