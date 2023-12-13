<?php

    class Clientes{

        protected $nombre;
        protected $apellido;
        protected $correo; 
        protected $contraseña;

        public function __construct(){
        }




        public function getNombre()
        {
                return $this->nombre;
        }


        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        public function getApellido()
        {
                return $this->apellido;
        }


        public function setApellido($apellido)
        {
                $this->apellido = $apellido;

                return $this;
        }

        public function getCorreo()
        {
                return $this->correo;
        }


        public function setCorreo($correo)
        {
                $this->correo = $correo;

                return $this;
        }

        public function getContraseña()
        {
                return $this->contraseña;
        }


        public function setContraseña($contraseña)
        {
                $this->contraseña = $contraseña;

                return $this;
        }
    }

?>