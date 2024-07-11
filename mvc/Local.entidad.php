<?php
    class local{
        private $idadmin;
        private $dniadmin;
        private $pwdadmin;
        private $nombreadmin;
        private $apellidoadmin;
        private $telefonoadmin;
        private $correoadmin;
        
        private $idcliente;
        private $dni;
        private $pwd;
        private $nombre;
        private $apellido;
        private $telefono;
        private $correo;

        public $idpelicula;
        public $nombrepelicula;
        public $sinopsis;
        public $director;
        public $genero;
        public $idioma;
        public $fechaestreno;
        public $duracion;
        public $imagen;

        public $tipo;
        public $producto;
        public $descripcion;
        public $precio;

        public $idboleto;
        public $tipoboleto;
        public $descripcionboleto;
        public $precioboleto;

        public $idhorario;
        public $turno;

        public $idfactura;
        public $codfactura;
        public $fecha;
        public $hora;
        public $butaca;
        
        public function __get($k){
            return $this->$k;
        }
        public function __set($k, $value){
            $this->$k = $value;
        }
    }
?>
