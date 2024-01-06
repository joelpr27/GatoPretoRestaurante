<?php

        class Bebidas extends Productos {

                protected $pajita;
        
                public function __construct(){
                }


                public function getPajita()
                {
                        return $this->pajita;
                }

                public function setPajita($pajita)
                {
                        $this->pajita = $pajita;

                        return $this;
                }
        }
?>
