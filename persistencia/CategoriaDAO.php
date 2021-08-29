<?php

    class CategoriaDAO{

        private $id;
        private $nombre;

        public function CategoriaDAO($id="", $nombre=""){
            $this -> id = $id;
            $this -> nombre = $nombre;
        }

        public function consultarTodos(){
            return "select idcategoria, nombre
                    from categoria
                    order by idcategoria asc";
        }
        

    }

?>