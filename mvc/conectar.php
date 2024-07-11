<?php
    class Conectar{
        protected $pdo;
        public function __construct(){
            try {
                $this->pdo = new PDO("mysql:host=localhost;dbname=dbsistemaboletos", 'root', 'niko4831');
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e) {
                echo "Fallo de conexion";
            }
        }
    }
?>
