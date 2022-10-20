<?php 

    class UsuarioSesion{

        public function __construct(){
            session_start();
        }

        public function setCurrentUsuario(string $usuario){
            $_SESSION['usuario'] = $usuario;
        }

        public function getCurrentUsuario(){
            return $_SESSION['usuario'];
        }

        public function cerrarSesion(){
            session_unset();
            session_destroy();
        }
    }
?>