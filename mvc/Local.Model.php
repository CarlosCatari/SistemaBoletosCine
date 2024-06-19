<?php
    require_once "conectar.php";
    require_once "Local.entidad.php";
    
    class LocalModel extends Conectar{
        public function buscarUsuario($dni){
            try {
                $result = array();
                $stm = $this->pdo->prepare('SELECT * FROM clientes WHERE dni = '.$dni);
                $stm->Execute();
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                    $loc = new local();
                    $loc->__Set('dni', $r->dni);
                    $loc->__Set('pwd', $r->pwd);
                    $loc->__Set('nombre', $r->nombre);
                    $result[] = $loc;
                }
                return $result;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function AgregarUsuario(Local $data){
            try {
                $stm = "INSERT INTO clientes (dni, pwd, nombre, apellido, telefono, correo) VALUES (?, ?, ?, ?, ?, ?)";
                $this->pdo->prepare($stm)->execute(array(
                    $data->__GET('dni'),
                    $data->__GET('pwd'),
                    $data->__GET('nombre'),
                    $data->__GET('apellido'),
                    $data->__GET('telefono'),
                    $data->__GET('correo')
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        } 

        public function listarUsuario($dni){
            try {
                $result = array();
                $stm = $this->pdo->prepare( 'SELECT * FROM clientes WHERE dni = '.$dni);
                $stm->Execute();
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                    $loc = new local();
                    $loc->__Set('dni', $r->dni);
                    $loc->__Set('pwd', $r->pwd);
                    $loc->__Set('nombre', $r->nombre);
                    $loc->__Set('apellido', $r->apellido);
                    $loc->__Set('telefono', $r->telefono);
                    $loc->__Set('correo', $r->correo);
                    $result[] = $loc;
                }
                return $result;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function ActualizarCliente(Local $data){
            try {
                $stm = "UPDATE clientes SET pwd = ?, nombre = ?, apellido = ?, telefono = ?, correo = ?  WHERE dni = ?";
                $this->pdo->prepare($stm)->execute(array(
                    $data->__GET('pwd'),
                    $data->__GET('nombre'),
                    $data->__GET('apellido'),
                    $data->__GET('telefono'),
                    $data->__GET('correo'),
                    $data->__GET('dni')
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function listarPelicula(){
            try {
                $result = array();
                $stm = $this->pdo->prepare('SELECT * FROM pelicula');
                $stm->Execute();
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                    $loc = new local();
                    $loc->__Set('idpelicula', $r->idpelicula);
                    $loc->__Set('nombrepelicula', $r->nombrepelicula);
                    $loc->__Set('sinopsis', $r->sinopsis);
                    $loc->__Set('director', $r->director);
                    $loc->__Set('genero', $r->genero);
                    $loc->__Set('idioma', $r->idioma);
                    $loc->__Set('fechaestreno', $r->fechaestreno);
                    $loc->__Set('duracion', $r->duracion);
                    $loc->__Set('imagen', $r->imagen);
                    $result[] = $loc;
                }
                return $result;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function buscarPelicula($idpelicula){
            try {
                $result = array();
                $stm = $this->pdo->prepare( 'SELECT * FROM pelicula WHERE idpelicula = '.$idpelicula);
                $stm->Execute();
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                    $loc = new local();
                    $loc->__Set('idpelicula', $r->idpelicula);
                    $loc->__Set('nombrepelicula', $r->nombrepelicula);
                    $loc->__Set('sinopsis', $r->sinopsis);
                    $loc->__Set('director', $r->director);
                    $loc->__Set('genero', $r->genero);
                    $loc->__Set('idioma', $r->idioma);
                    $loc->__Set('fechaestreno', $r->fechaestreno);
                    $loc->__Set('duracion', $r->duracion);
                    $loc->__Set('imagen', $r->imagen);
                    $result[] = $loc;
                }
                return $result;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }


        public function listarhorario(){
            try {
                $result = array();
                $stm = $this->pdo->prepare('SELECT * FROM horario');
                $stm->Execute();
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                    $loc = new local();
                    $loc->__Set('turno', $r->turno);
                    $result[] = $loc;
                }
                return $result;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function listardulceria(){
            try {
                $result = array();
                $stm = $this->pdo->prepare('SELECT * FROM dulceria');
                $stm->Execute();
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                    $loc = new local();
                    $loc->__Set('tipo', $r->tipo);
                    $loc->__Set('producto', $r->producto);
                    $loc->__Set('descripcion', $r->descripcion);
                    $loc->__Set('precio', $r->precio);
                    $result[] = $loc;
                }
                return $result;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function listarboleto(){
            try {
                $result = array();
                $stm = $this->pdo->prepare('SELECT * FROM boleto');
                $stm->Execute();
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                    $loc = new local();
                    $loc->__Set('idboleto', $r->idboleto);
                    $loc->__Set('tipoboleto', $r->tipoboleto);
                    $loc->__Set('descripcionboleto', $r->descripcionboleto);
                    $loc->__Set('precioboleto', $r->precioboleto);
                    $result[] = $loc;
                }
                return $result;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }
?>