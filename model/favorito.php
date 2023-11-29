<?php

    class Favorito{

        private $producto;

        public function __construct($producto){
            $this->producto = $producto;
        }


        
        public function getProducto()
        {
                return $this->producto;
        }

        public function setProducto($producto)
        {
                $this->producto = $producto;

                return $this;
        }
    }
?>