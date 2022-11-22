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
        //include_once "dashboard.php";
    }  else {
        //echo "Login";
        include_once "login.php";
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title> Tienda </title>
    <!-- ICONO -->
	<link rel="shortcut icon" href="img/quran.png">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="cssarely/header.css"/>
     <!-- FONT AWESOME  -->
     
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <!-- SWIPER -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

</head>
<body>
    <header class="header">
        <div class="header-1">

            <div class="logo-details"> 
                <img href="dashboard.php" src="img/logo2.png" alt="LogoImg"> 
            </div>


            
            <div class="icons">
                <a href="buscador.php" class="bx bx-search-alt"></a>
                <?php  if($usuario->getRol()=="comprador"){
                    echo '<a href="perfil.php" class="bx bx-user"></a>';
                };?>
                <?php  if($usuario->getRol()=="vendedor"){
                    echo '<a href="perfil-vendedor.php" class="bx bx-user"></a>';
                };?>
                <?php  if($usuario->getRol()=="administrador"){
                    echo '<a href="perfil-admin.php" class="bx bx-user"></a>';
                };?>
                <?php  if($usuario->getRol()=="superadministrador"){
                    echo '<a href="perfil-admin.php" class="bx bx-user"></a>';
                };?>
                <a href="carrito.php" class="bx bx-cart"></a>

            </div>

        </div>
    
        
    </header>
</body>
</html>