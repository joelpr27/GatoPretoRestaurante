<?php

    class DetallePedidoDB extends PedidoDB{

        protected $id_pedido;
        protected $id_producto;
        protected $cantidad_producto;
        protected $precio_producto;
        protected $tiempo_total;
        protected $valoracion;
        protected $reseña;


        
        public function __construct(){
        }

        
        public function getId_pedido()
        {
                return $this->id_pedido;
        }

        public function setId_pedido($id_pedido)
        {
                $this->id_pedido = $id_pedido;

                return $this;
        }

        public function getId_producto()
        {
                return $this->id_producto;
        }


        public function setId_producto($id_producto)
        {
                $this->id_producto = $id_producto;

                return $this;
        }


        public function getCantidad_producto()
        {
                return $this->cantidad_producto;
        }


        public function setCantidad_producto($cantidad_producto)
        {
                $this->cantidad_producto = $cantidad_producto;

                return $this;
        }


        public function getPrecio_producto()
        {
                return $this->precio_producto;
        }


        public function setPrecio_producto($precio_producto)
        {
                $this->precio_producto = $precio_producto;

                return $this;
        }


        public function getTiempo_total()
        {
                return $this->tiempo_total;
        }


        public function setTiempo_total($tiempo_total)
        {
                $this->tiempo_total = $tiempo_total;

                return $this;
        }

        public function getValoracion()
        {
                return $this->valoracion;
        }

        
        public function setValoracion($valoracion)
        {
                $this->valoracion = $valoracion;

                return $this;
        }

        public function getReseña()
        {
                return $this->reseña;
        }

        
        public function setReseña($reseña)
        {
                $this->reseña = $reseña;

                return $this;
        }

         

    }
?>