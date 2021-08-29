<?php

    class TallaDAO{

        private $id;
        private $nombre;

        function __construct($id="", $nombre=""){
            $this -> id = $id;
            $this -> nombre = $nombre;
        }

        public function consultarTodos(){
            return "select idtalla, nombre
                    from talla
                    order by idtalla asc";
        }

        public function consultar(){
            return "select nombre
                    from talla
                    where idtalla = " . $this -> id;        
        }
        

    }

?>