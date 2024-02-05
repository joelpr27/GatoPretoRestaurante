<?php

    class Clientes{

        protected $id;
        protected $nombre;
        protected $apellido;
        protected $correo; 
        protected $contraseña;
        protected $rol;
        protected $puntos;



        public function __construct(){
        }


        public function getId()
        {
                return $this->id;
        }

        public function setId($id)
        {
                $this->id = $id;

                return $this;
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


        
        public function getRol()
        {
                return $this->rol;
        }

        public function setRol($rol)
        {
                $this->rol = $rol;

                return $this;
        }

 
        public function getPuntos()
        {
                return $this->puntos;
        }

 
        public function setPuntos($puntos)
        {
                $this->puntos = $puntos;

                return $this;
        }
    }

?>