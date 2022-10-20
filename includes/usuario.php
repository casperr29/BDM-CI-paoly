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
    }
?>