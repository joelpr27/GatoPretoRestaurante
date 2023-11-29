<?php 

        class Productos{

                protected $id;
                protected $nombre;
                protected $id_categoria;
                protected $nombre_categoria;
                protected $tiempo_preparacion;
                protected $precio;
                protected $img;



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


                public function getId_categoria()
                {
                        return $this->id_categoria;
                }

                public function setId_categoria($id_categoria)
                {
                        $this->id_categoria = $id_categoria;

                        return $this;
                }

                
                public function getNombre_categoria()
                {
                                return $this->nombre_categoria;
                }

                public function setNombre_categoria($nombre_categoria)
                {
                                $this->nombre_categoria = $nombre_categoria;

                                return $this;
                }


                public function getTiempo_preparacion()
                {
                        return $this->tiempo_preparacion;
                }

                public function setTiempo_preparacion($tiempo_preparacion)
                {
                        $this->tiempo_preparacion = $tiempo_preparacion;

                        return $this;
                }
        

                public function getPrecio()
                {
                        return $this->precio;
                }

                public function setPrecio($precio)
                {
                        $this->precio = $precio;

                        return $this;
                }


                public function getImg()
                {
                        return $this->img;
                }

                public function setImg($img)
                {
                        $this->img = $img;

                        return $this;
                }
        }
?>