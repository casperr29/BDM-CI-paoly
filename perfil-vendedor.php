<?php 
    include_once 'includes/usuario.php';
    include_once 'includes/sesion_usuario.php';

    $usuarioSesion = new UsuarioSesion();
    $usuario = new Usuario();

    if(isset($_SESSION['usuario'])){
        //echo "Hay sesión";
        $usuario->setUsuario($usuarioSesion->getCurrentUsuario(), $usuarioSesion->getCurrentUsuario(), $usuarioSesion->getCurrentUsuario());
        include_once "perfil-vendedor.php";
    }  else {
        //echo "Login";
        include_once "login.php";
    }
?>
<!DOCTYPE html>
<html lang= "en" >
<head>
     <meta charset= "UTF - 8" >
     <meta name= "viewport" content = "width = device - width , initial - scale = 1.0">
     <link rel="shortcut icon" href="img/quran.png">
     <title>Perfil de vendedor</title>
     <link rel="stylesheet" type="text/css" href = "cssarely/perfil.css"/>

</head>
<body>
    <header>
    <?php include 'header.php'?> 
        <div class="header-2">
            <nav class="navbar">
                <a href="dashboard.php">inicio</a>
                <a href="includes/logout.php">salir</a>
            </nav>
        </div> 
    </header>

    <div class="cols__container">
        <div class="left__col">
            <div class="img__container">
                <img src="img/user.jpeg" alt="Anna Smith" />
            </div>
            <h2>Anna Smith</h2>
            <p>anna@example.com</p>


        </div>
        <div class="right__col">
          <nav>
            <ul>
              <li><a href="">Productos</a></li>

            </ul>
            <a href="crear_producto.php" class="btn">Agrega un producto</a>
          </nav>

          <div class="photos">
            <div class="box" style="height: 20rem;">
                <a href="producto.php"><img class="image" src="img/freefall.jpg"></a>
            </div>
            <div class="box" style="height: 20rem;">
                <a href="producto.php"><img class="image" src="img/blue_period.jpg"></a>
            </div>
            <div class="box" style="height: 20rem;">
                <a href="producto.php"><img class="image" src="img/castillo_vagabundo.jpg"></a>
            </div>
            <div class="box" style="height: 20rem;">
                <a href="producto.php"><img class="image" src="img/el_nombre_del_viento.jpg"></a>
            </div>

          </div>
        </div>

</body >
</html>