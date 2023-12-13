<?php

    class Pedido{

        private $producto;
        private $cantidad = 1;

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



        public function getCantidad()
        {
                return $this->cantidad;
        }

        public function setCantidad($cantidad)
        {
                $this->cantidad = $cantidad;

                return $this;
        }

        public function getPrecioTotal()
        {       
                $precio = $this->producto->getPrecio();
                $precioTotal = $precio * $this->cantidad;

                return $precioTotal;
        }

        public function getDescuentoTotal()
        {       $precioDescuento = 0; 
                $precioTotal = 0;
                $descuentoTotal = 0;

                $precioDescuento += $this->producto->getPrecioDescuento() * $this->cantidad;
                $precioTotal += $this->producto->getPrecio() * $this->cantidad;


                $descuentoTotal = $precioDescuento - $precioTotal;

                return $descuentoTotal;
        }

        public function getPrecioTotalConDescuento()
        {       
                $precioDescuento = $this->producto->getPrecioDescuento();

                $precioTotal = $precioDescuento * $this->cantidad;

                return $precioTotal;
        }

        

    }
?>