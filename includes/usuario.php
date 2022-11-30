<?php

    include_once 'includes/config.php';
    
    class Usuario extends DB{
        private $usuarioID;
        private $rol;

        public function usuarioExiste(string $correo, $nickname, $contrasenia){

            $query = $this->connect()->prepare('CALL sp_InicioSesion(:correo,:nickname,:contrasenia)');
            $query->execute(['correo' => $correo, 'nickname' => $nickname, 'contrasenia' => $contrasenia]);
            
            if($query->rowCount()){
                return true;
            } else {
                return false;
            }
        }

        public function setUsuario(string $correo, $nickname, $contrasenia){
            $query = $this->connect()->prepare('CALL sp_InicioSesion(:correo,:nickname,:contrasenia)');
            $query->execute(['correo' => $correo, 'nickname' => $nickname, 'contrasenia' => $contrasenia]);
            
            foreach ($query as $currentUsuario) {
                $this->usuarioID = $currentUsuario['UsuarioID'];
                $this->rol = $currentUsuario['Rol'];
            }
        }

        public function getRol(){
            return $this->rol;
        }

        public function getID(){
            return $this->usuarioID;
        }

        function obtenerUsuarios(){
            $query = $this->connect()->query('SELECT* FROM usuario');

            return $query;
        }

        function insertarUsuario(string $correo, $nickname, $contrasenia, $nombre, $fechaNacimiento){
            $query = $this->connect()->prepare('CALL sp_RegistroUsuario(:correo,:nickname,:contrasenia,:nombre,:fechaNacimiento)');
            $query->execute(['correo' => $correo, 'nickname' => $nickname, 'contrasenia' => $contrasenia, 'nombre' => $nombre, 'fechaNacimiento' => $fechaNacimiento]);

            return $query;
        }

        /*function realizarPedido(int $usuarioID, $Numero, $CodigoPostal, string $Calle, $Colonia, $Municipio, $Estado, $Pais){
            $query=$this->connect()->prepare('CALL sp_RealizarPedido(:usuario, :calle, :numero, :colonia, :municipio, :codigopostal, :estado, :pais)');
            query->execute(['usuario' => $usuarioID, 'calle' => $Calle,, 'numero' => $Numero,, 'colonia' => $Colonia,, 'municipio' => $Municipio, 'codigopostal' => $CodigoPostal, 'estado' => $Estado, 'pais' => $Pais]);

            return $query;
        }*/
    }
?>