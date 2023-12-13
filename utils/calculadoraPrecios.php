<?php
    Class CalculadoraPrecios{
        const IVA = 21;

        public static function  calculadoraPrecioPedido($pedidos){
            $precioTotal = 0;

            foreach($pedidos as $pedido){
                $precioTotal += $pedido->getPrecioTotal();

            }

            return round($precioTotal,2);
        }

        public static function  calculadoraDescuentoFinal($pedidos){
            $descuentoTotal = 0;
            foreach($pedidos as $pedido){
                if ($pedido->getProducto()->getDescuento() != null) {
                    $descuentoTotal += $pedido->getDescuentoTotal();
                }
            }

            return $descuentoTotal;
        }

        public static function  calculadoraPrecioIVA($pedidos){
            $precioTotal = 0;
            $IVAPedido = 0;

            foreach($pedidos as $pedido){
                $precioTotal += $pedido->getPrecioTotal();

            }

            $IVAPedido = $precioTotal * (CalculadoraPrecios::IVA/100);

            return round($IVAPedido,2);
            
        }

        public static function  calculadoraPrecioFinal($pedidos){
            $precioTotal = 0;
            $precioTotalSinIva = 0;
            $IVAPedido = 0;
            $descuentoTotal = 0;


            foreach($pedidos as $pedido){
                $precioTotalSinIva += $pedido->getPrecioTotal();
                $descuentoTotal += $pedido->getDescuentoTotal();

            }

            $IVAPedido = $precioTotalSinIva * (CalculadoraPrecios::IVA/100);
            $precioTotal = ($precioTotalSinIva + $IVAPedido) + $descuentoTotal;

            return round($precioTotal,2);
            
        }



        public static function  calculadoraPrecioFavoritos($favoritos){
            $precioTotal = 0;

            foreach($favoritos as $favorito){
                $precioTotal += $favorito->getProducto()->getPrecio();

            }

            return round($precioTotal,2);
        }


        public static function  calculadoraPrecioIVAFavoritos($favoritos){
            $precioTotal = 0;
            $IVAPedido = 0;

            foreach($favoritos as $favorito){
                $precioTotal += $favorito->getProducto()->getPrecio();

            }

            $IVAPedido = $precioTotal * (CalculadoraPrecios::IVA/100);

            return round($IVAPedido,2);
            
        }
    } 
?>