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

        public function getDescuentoTotal()
        {       $precioDescuento = 0; 
                $precio = $this->producto->getPrecio();
                $descuentoTotal = 0;

                $precioDescuento += $this->producto->getPrecioDescuento();


                $descuentoTotal = $precioDescuento - $precio;

                return $descuentoTotal;
        }

        public function getPrecioTotalConDescuento()
        {       
                $precioDescuento = $this->producto->getPrecioDescuento();

                return $precioDescuento;
        }

    }
?>