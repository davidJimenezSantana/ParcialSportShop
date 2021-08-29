<?php

    class CategoriaDAO{

        private $id;
        private $nombre;

        function __construct($id="", $nombre=""){
            $this -> id = $id;
            $this -> nombre = $nombre;
        }

        public function consultarTodos(){
            return "select idcategoria, nombre
                    from categoria
                    order by idcategoria asc";
        }

        public function consultar(){
            return "select nombre
                    from categoria
                    where idcategoria = " . $this -> id;        
        }
        

    }

?>