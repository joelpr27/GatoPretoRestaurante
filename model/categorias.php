<?php 

        class Categorias{

                protected $id;
                protected $nombre;
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