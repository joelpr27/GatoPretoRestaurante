<?php

    class Resenas{
         
        protected $id_cliente;
        protected $nombre_cliente;
        protected $valoracion;
        protected $resena;


        public function __construct(){
        }

        

        public function getId_cliente()
        {
                return $this->id_cliente;
        }

       
        public function setId_cliente($id_cliente)
        {
                $this->id_cliente = $id_cliente;

                return $this;
        }


        public function getNombre_cliente()
        {
                return $this->nombre_cliente;
        }

        
        public function setNombre_cliente($nombre_cliente)
        {
                $this->nombre_cliente = $nombre_cliente;

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
       
        
        public function getResena()
        {
                return $this->resena;
        }

       
        public function setResena($resena)
        {
                $this->resena = $resena;

                return $this;
        }

    }
?>