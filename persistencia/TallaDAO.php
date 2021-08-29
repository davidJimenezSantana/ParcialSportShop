<?php

    class TallaDAO{

        private $id;
        private $nombre;

        public function TallaDAO($id="", $nombre=""){
            $this -> id = $id;
            $this -> nombre = $nombre;
        }

        public function consultarTodos(){
            return "select idtalla, nombre
                    from talla
                    order by idtalla asc";
        }
        

    }

?>