<?php 
    include_once 'includes/usuario.php';
    include_once 'includes/sesion_usuario.php';

    $usuarioSesion = new UsuarioSesion();
    $usuarioTemp = $usuarioSesion->getCurrentUsuario();
    $passTemp = $usuarioSesion->getCurrentContrasenia();
    //session_start();

    if(isset($_SESSION['usuario'])){
        //echo "Hay sesión";
        $usuario = new Usuario();
        $usuario->setUsuario($usuarioTemp, $usuarioTemp, $passTemp);
        $user=$usuario->getID();
        //include_once "dashboard.php";
    }  else {
        //echo "Login";
        include_once "login.php";
    }
    include_once 'includes/config.php';
    $db=new DB;
    $con=$db->connect();
    $sql=$con->prepare('SELECT MAX(LibroID) FROM Libro;');
    $sql->execute();

    if(!empty($_POST['name']) && !empty($_POST['autor']) && !empty($_POST['year']) && !empty($_POST['descripcion'])){
        $nombre = $_POST['name'];
        $precio = $_POST['price'];
        $autor = $_POST['autor'];
        $anio = $_POST['year'];
        $descripcion = $_POST['descripcion'];
        $categoria = $_POST['categoria'];

        $imagen1='';
        if (isset($_FILES["Fotografia1"])){
            $file = $_FILES["Fotografia1"];
            $filenombre = $file["name"];
            $tipo = $file["type"];
            $ruta_provisional = $file["tmp_name"];
            $size = $file["size"];
            $dimensiones = getimagesize($ruta_provisional);
            $width = $dimensiones[0];
            $height = $dimensiones[1];
            $carpeta = "images/productos/";
            if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png'){
                echo "Error, el archivo no es una imagen";
            } else if($size>3*1024*1024){
                echo "Error, el tamaño máximo permitido es un 3MB";
            } else {
                $src=$carpeta.$filenombre;
                move_uploaded_file($ruta_provisional, $src);
                $imagen1="images/productos/".$filenombre;
            }
        }
        $imagen2='';
        if (isset($_FILES["Fotografia2"])){
            $file = $_FILES["Fotografia2"];
            $filenombre = $file["name"];
            $tipo = $file["type"];
            $ruta_provisional = $file["tmp_name"];
            $size = $file["size"];
            $dimensiones = getimagesize($ruta_provisional);
            $width = $dimensiones[0];
            $height = $dimensiones[1];
            $carpeta = "images/productos/";
            if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png'){
                echo "Error, el archivo no es una imagen";
            } else if($size>3*1024*1024){
                echo "Error, el tamaño máximo permitido es un 3MB";
            } else {
                $src=$carpeta.$filenombre;
                move_uploaded_file($ruta_provisional, $src);
                $imagen2="images/productos/".$filenombre;
            }
        }
        $imagen3='';
        if (isset($_FILES["Fotografia3"])){
            $file = $_FILES["Fotografia3"];
            $filenombre = $file["name"];
            $tipo = $file["type"];
            $ruta_provisional = $file["tmp_name"];
            $size = $file["size"];
            $dimensiones = getimagesize($ruta_provisional);
            $width = $dimensiones[0];
            $height = $dimensiones[1];
            $carpeta = "images/productos/";
            if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png'){
                echo "Error, el archivo no es una imagen";
            } else if($size>3*1024*1024){
                echo "Error, el tamaño máximo permitido es un 3MB";
            } else {
                $src=$carpeta.$filenombre;
                move_uploaded_file($ruta_provisional, $src);
                $imagen3="images/productos/".$filenombre;
            }
        }
        $video='';
        if (isset($_FILES["video"])){
            $file = $_FILES["video"];
            $filenombre = $file["name"];
            $tipo = $file["type"];
            $ruta_provisional = $file["tmp_name"];
            $size = $file["size"];
            $dimensiones = getimagesize($ruta_provisional);
            $carpeta = "images/productos/";
            if($tipo != 'video/mp4'){
                echo "Error, el archivo no es un video";
            } else {
                $src=$carpeta.$filenombre;
                move_uploaded_file($ruta_provisional, $src);
                $video="images/productos/".$filenombre;
            }
        }

        $query=$con->prepare('CALL sp_AgregarLibro(:nombre,:descripcion,:precio, 1, :autor, :anio, :usuario, :imagen1, :imagen2, :imagen3, :video, :categoria)');
        $query->execute(['nombre' => $nombre, 'descripcion' => $descripcion, 'precio' => $precio, 'autor' => $autor, 'anio' => $anio, 'usuario' => $user, 'imagen1' => $imagen1, 'imagen2' => $imagen2, 'imagen3' => $imagen3, 'video' => $video, 'categoria' => $categoria]);
    
        header("location: index.php");
    }
    //header("location: index.php");
?>