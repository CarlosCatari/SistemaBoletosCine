<?php
    class local{
        private $dni;
        private $pwd;
        private $nombre;
        private $apellido;
        private $telefono;
        private $correo;

        public function __get($k){
            return $this->$k;
        }
        public function __set($k, $value){
            $this->$k = $value;
        }
    }
?>