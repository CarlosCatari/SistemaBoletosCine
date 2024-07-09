<?php
    require_once "conectar.php";
    require_once "Local.entidad.php";
    
    class LocalModel extends Conectar{
        public function listarAdministrador(){
            try {
                $result = array();
                $stm = $this->pdo->prepare( 'SELECT * FROM administrador');
                $stm->Execute();
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                    $loc = new local();
                    $loc->__Set('idadmin', $r->idadmin);
                    $loc->__Set('dniadmin', $r->dniadmin);
                    $loc->__Set('pwdadmin', $r->pwdadmin);
                    $loc->__Set('nombreadmin', $r->nombreadmin);
                    $loc->__Set('apellidoadmin', $r->apellidoadmin);
                    $loc->__Set('telefonoadmin', $r->telefonoadmin);
                    $loc->__Set('correoadmin', $r->correoadmin);
                    $result[] = $loc;
                }
                return $result;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function AgregarAdministrador(Local $data){
            try {
                $stm = "INSERT INTO administrador (dniadmin, pwdadmin, nombreadmin, apellidoadmin, telefonoadmin, correoadmin) VALUES (?, ?, ?, ?, ?, ?)";
                $this->pdo->prepare($stm)->execute(array(
                    $data->__GET('dniadmin'),
                    $data->__GET('pwdadmin'),
                    $data->__GET('nombreadmin'),
                    $data->__GET('apellidoadmin'),
                    $data->__GET('telefonoadmin'),
                    $data->__GET('correoadmin')
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        } 
        public function buscaradministrador($idadmin){
            try {
                $result = array();
                $stm = $this->pdo->prepare( 'SELECT * FROM administrador WHERE idadmin = '.$idadmin);
                $stm->Execute();
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                    $loc = new local();
                    $loc->__Set('idadmin', $r->idadmin);
                    $loc->__Set('dniadmin', $r->dniadmin);
                    $loc->__Set('pwdadmin', $r->pwdadmin);
                    $loc->__Set('nombreadmin', $r->nombreadmin);
                    $loc->__Set('apellidoadmin', $r->apellidoadmin);
                    $loc->__Set('telefonoadmin', $r->telefonoadmin);
                    $loc->__Set('correoadmin', $r->correoadmin);
                    $result[] = $loc;
                }
                return $result;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function ActualizarAdministrador(Local $data){
            try {
                $stm = "UPDATE administrador SET dniadmin= ?, pwdadmin = ?, nombreadmin = ?, apellidoadmin = ?, telefonoadmin = ?, correoadmin = ?  WHERE idadmin = ?";
                $this->pdo->prepare($stm)->execute(array(
                    $data->__GET('dniadmin'),
                    $data->__GET('pwdadmin'),
                    $data->__GET('nombreadmin'),
                    $data->__GET('apellidoadmin'),
                    $data->__GET('telefonoadmin'),
                    $data->__GET('correoadmin'),
                    $data->__GET('idadmin')
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function EliminarAdministrador($idadmin){
            try{
                $stm = $this->pdo->prepare("DELETE FROM administrador WHERE idadmin = ?");     
                $stm->execute(array($idadmin));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function buscarAdmin($dniadmin){
            try {
                $result = array();
                $stm = $this->pdo->prepare( 'SELECT * FROM administrador WHERE dniadmin = '.$dniadmin);
                $stm->Execute();
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                    $loc = new local();
                    $loc->__Set('idadmin', $r->idadmin);
                    $loc->__Set('dniadmin', $r->dniadmin);
                    $loc->__Set('pwdadmin', $r->pwdadmin);
                    $loc->__Set('nombreadmin', $r->nombreadmin);
                    $loc->__Set('apellidoadmin', $r->apellidoadmin);
                    $loc->__Set('telefonoadmin', $r->telefonoadmin);
                    $loc->__Set('correoadmin', $r->correoadmin);
                    $result[] = $loc;
                }
                return $result;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function buscarCliente($dni){
            try {
                $result = array();
                $stm = $this->pdo->prepare( 'SELECT * FROM clientes WHERE dni = '.$dni);
                $stm->Execute();
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                    $loc = new local();
                    $loc->__Set('idcliente', $r->idcliente);
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
        /* public function buscarClientenombre($nombre){
            try {
                $result = array();
                $stm = $this->pdo->prepare( 'SELECT * FROM clientes WHERE nombre = '.$nombre);
                $stm->Execute();
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                    $loc = new local();
                    $loc->__Set('idcliente', $r->idcliente);
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
        } */
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
        public function AgregarCliente(Local $data){
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
        public function listarCliente(){
            try {
                $result = array();
                $stm = $this->pdo->prepare( 'SELECT * FROM clientes');
                $stm->Execute();
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                    $loc = new local();
                    $loc->__Set('idcliente', $r->idcliente);
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
        public function buscarIdCliente($idcliente){
            try {
                $result = array();
                $stm = $this->pdo->prepare( 'SELECT * FROM clientes WHERE idcliente = '.$idcliente);
                $stm->Execute();
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                    $loc = new local();
                    $loc->__Set('idcliente', $r->idcliente);
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
        public function ActualizarIdCliente(Local $data){
            try {
                $stm = "UPDATE clientes SET dni = ?, pwd = ?, nombre = ?, apellido = ?, telefono = ?, correo = ?  WHERE idcliente = ?";
                $this->pdo->prepare($stm)->execute(array(
                    $data->__GET('dni'),
                    $data->__GET('pwd'),
                    $data->__GET('nombre'),
                    $data->__GET('apellido'),
                    $data->__GET('telefono'),
                    $data->__GET('correo'),
                    $data->__GET('idcliente')
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function EliminarCliente($idcliente){
            try{
                $stm = $this->pdo->prepare("DELETE FROM clientes WHERE idcliente = ?");                 
                $stm->execute(array($idcliente));
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
        public function ActualizarPelicula(Local $data){
            try {
                $stm = "UPDATE pelicula SET nombrepelicula = ?, sinopsis = ?, director = ?, genero = ?, idioma = ? , fechaestreno = ? , duracion = ? , imagen = ? WHERE idpelicula = ?";
                $this->pdo->prepare($stm)->execute(array(
                    $data->__GET('nombrepelicula'),
                    $data->__GET('sinopsis'),
                    $data->__GET('director'),
                    $data->__GET('genero'),
                    $data->__GET('idioma'),
                    $data->__GET('fechaestreno'),
                    $data->__GET('duracion'),
                    $data->__GET('imagen'),
                    $data->__GET('idpelicula')
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function AgregarPelicula(Local $data){
            try {
                $stm = "INSERT INTO pelicula (nombrepelicula, sinopsis, director, genero, idioma, fechaestreno, duracion, imagen) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $this->pdo->prepare($stm)->execute(array(
                    $data->__GET('nombrepelicula'),
                    $data->__GET('sinopsis'),
                    $data->__GET('director'),
                    $data->__GET('genero'),
                    $data->__GET('idioma'),
                    $data->__GET('fechaestreno'),
                    $data->__GET('duracion'),
                    $data->__GET('imagen')
                ));
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
        public function EliminarPelicula($idpelicula){
            try{
                $stm = $this->pdo->prepare("DELETE FROM pelicula WHERE idpelicula = ?");                     
                $stm->execute(array($idpelicula));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function buscarNombrePelicula($nombrepelicula){
            try {
                $result = array();
                $stm = $this->pdo->prepare('SELECT * FROM cetpagolocal WHERE nombrepelicula LIKE :nombrepelicula');
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
                    $loc->__Set('idhorario', $r->idhorario);
                    $loc->__Set('turno', $r->turno);
                    $result[] = $loc;
                }
                return $result;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function ActualizarHorario(Local $data){
            try {
                $stm = "UPDATE horario SET turno = ? WHERE idhorario = ?";
                $this->pdo->prepare($stm)->execute(array(
                    $data->__GET('turno'),
                    $data->__GET('idhorario')
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function buscarHorario($idhorario){
            try {
                $result = array();
                $stm = $this->pdo->prepare( 'SELECT * FROM horario WHERE idhorario = '.$idhorario);
                $stm->Execute();
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                    $loc = new local();
                    $loc->__Set('idhorario', $r->idhorario);
                    $loc->__Set('turno', $r->turno);
                    $result[] = $loc;
                }
                return $result;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function AgregarHorario(Local $data){
            try {
                $stm = "INSERT INTO horario (turno) VALUES (?)";
                $this->pdo->prepare($stm)->execute(array(
                    $data->__GET('turno'),
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function EliminarHorario($idhorario){
            try{
                $stm = $this->pdo->prepare("DELETE FROM horario WHERE idhorario = ?");                     
                $stm->execute(array($idhorario));
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
                    $loc->__Set('iddulceria', $r->iddulceria);
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
        public function ActualizarDulceria(Local $data){
            try {
                $stm = "UPDATE dulceria SET tipo = ?, producto = ?, descripcion = ?, precio = ? WHERE iddulceria = ?";
                $this->pdo->prepare($stm)->execute(array(
                    $data->__GET('tipo'),
                    $data->__GET('producto'),
                    $data->__GET('descripcion'),
                    $data->__GET('precio'),
                    $data->__GET('iddulceria')
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function buscarDulceria($iddulceria){
            try {
                $result = array();
                $stm = $this->pdo->prepare( 'SELECT * FROM dulceria WHERE iddulceria = '.$iddulceria);
                $stm->Execute();
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                    $loc = new local();
                    $loc->__Set('iddulceria', $r->iddulceria);
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
        public function AgregarDulceria(Local $data){
            try {
                $stm = "INSERT INTO dulceria (tipo, producto, descripcion, precio) VALUES (?, ?, ?, ?)";
                $this->pdo->prepare($stm)->execute(array(
                    $data->__GET('tipo'),
                    $data->__GET('producto'),
                    $data->__GET('descripcion'),
                    $data->__GET('precio'),
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function EliminarDulceria($iddulceria){
            try{
                $stm = $this->pdo->prepare("DELETE FROM dulceria WHERE iddulceria = ?");
                $stm->execute(array($iddulceria));
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
        public function ActualizarBoleto(Local $data){
            try {
                $stm = "UPDATE boleto SET tipoboleto = ?, descripcionboleto = ?, precioboleto = ? WHERE idboleto = ?";
                $this->pdo->prepare($stm)->execute(array(
                    $data->__GET('tipoboleto'),
                    $data->__GET('descripcionboleto'),
                    $data->__GET('precioboleto'),
                    $data->__GET('idboleto')
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function buscarBoleto($idboleto){
            try {
                $result = array();
                $stm = $this->pdo->prepare( 'SELECT * FROM boleto WHERE idboleto = '.$idboleto);
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
        public function AgregarBoleto(Local $data){
            try {
                $stm = "INSERT INTO boleto (tipoboleto,descripcionboleto, precioboleto ) VALUES (? ,? ,?)";
                $this->pdo->prepare($stm)->execute(array(
                    $data->__GET('tipoboleto'),
                    $data->__GET('descripcionboleto'),
                    $data->__GET('precioboleto'),

                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function EliminarBoleto($idboleto){
            try{
                $stm = $this->pdo->prepare("DELETE FROM boleto WHERE idboleto = ?");                     
                $stm->execute(array($idboleto));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }
?>