<?php 
    include_once 'includes/usuario.php';
    include_once 'includes/sesion_usuario.php';

    $usuarioSesion = new UsuarioSesion();
    $usuario = new Usuario();

    if(isset($_SESSION['usuario'])){
        //echo "Hay sesión";
        $usuario->setUsuario($usuarioSesion->getCurrentUsuario(), $usuarioSesion->getCurrentUsuario(), $usuarioSesion->getCurrentUsuario());
        include_once "perfil-admin.php";
    }  else {
        //echo "Login";
        include_once "login.php";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <link rel="stylesheet"  href="cssarely/perfil-admin.css">

</head>
<body>

<header class="header">

   <div class="flex">

            <div class="logo-details"> 
                <img href="dashboard.php" src="img/logo2.png" alt="LogoImg"> 
            </div>

      <nav class="navbar">
         <a href="dashboard.php">Inicio</a>
         <a href="producto-admin.php">Productos</a>
         <a href="pedidos-admin.php">Pedidos</a>
         <a href="registroUsuarios-admin.php">Usuarios</a>
         <a href="includes/logout.php">Salir</a>
      </nav>

      <div class="icons">


      </div>

   </div>

</header>

    <section class="dashboard">

        <h1 class="title">dashboard</h1>
        <div class="box-container">

            <div class="box">

                <h3><?php echo 1; ?></h3>
                <p>cuentas de compradores</p>
            </div>

            <div class="box">

                <h3><?php echo 1; ?></h3>
                <p>cuentas de vendedores</p>
            </div>

            <div class="box">

                <h3><?php echo 2; ?></h3>
                <p>cuentas en total</p>
            </div>

        </div>

    </section>

</body>
</html>