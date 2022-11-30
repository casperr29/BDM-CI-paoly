<?php 
    include_once 'includes/usuario.php';
    include_once 'includes/sesion_usuario.php';

    $usuarioSesion = new UsuarioSesion();
    $usuario = new Usuario();

    if(isset($_SESSION['usuario'])){
        //echo "Hay sesión";
        $usuario->setUsuario($usuarioSesion->getCurrentUsuario(), $usuarioSesion->getCurrentUsuario(), $usuarioSesion->getCurrentContrasenia());
        include_once "dashboard.php";
    } else if(isset($_POST['userSession']) && isset($_POST['passSession'])){
        //echo "Validacion de login";

        $userFormSession = $_POST['userSession'];
        $passFormSession = $_POST['passSession'];

        if($usuario->usuarioExiste($userFormSession, $userFormSession, $passFormSession)){
            //echo "usuario valido";
            $usuarioSesion->setCurrentUsuario($userFormSession, $passFormSession);
            $usuario->setUsuario($userFormSession, $userFormSession, $passFormSession);
            $_SESSION['contrasenia'] = $passFormSession;
            include_once "dashboard.php";
        } else {
            //echo "correo/nickname y/o contraseña invalidos";
            $errorLogin= "correo/nickname y/o contraseña invalidos";
            include_once "login.php";
        }
        
    } else {
        //echo "Login";
        include_once "login.php";
    }
?>