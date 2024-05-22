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

/*         public function listar(){
            try {
                $result = array();
                $stm = $this->pdo->prepare( 'SELECT * FROM cetpagolocal');
                $stm->Execute();
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                    $loc = new local();
                    $loc->__Set('id', $r->id);
                    $loc->__Set('denominacion', $r->denominacion);
                    $loc->__Set('direccion', $r->direccion);
                    $result[] = $loc;
                }
                return $result;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function Eliminar($id){
            try{
                $stm = $this->pdo->prepare("DELETE FROM cetpagolocal WHERE id = ?");                     
                $stm->execute(array($id));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function Actualizar(Local $data){
            try {
                $stm = "UPDATE cetpagolocal SET denominacion = ?, direccion = ? WHERE id = ?";
                $this->pdo->prepare($stm)->execute(array(
                    $data->__GET('denominacion'),
                    $data->__GET('direccion'),
                    $data->__GET('id')
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        */
    }
?>