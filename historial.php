<?php
    include_once 'includes/config.php';
    include_once 'includes/usuario.php';
    include_once 'includes/sesion_usuario.php';

    $TotalPrecio=0;
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

    $db=new DB;
    $con=$db->connect();
    $sql=$con->prepare('SELECT
    libro.LibroID,
    libro.Nombre_libro,
    libro.Autor_libro,
    media.imagen1,
    libro_carrito.Precio_compra,
    orden.OrdenID,
    orden.Estatus_orden
    FROM Carrito 
    INNER JOIN libro_carrito ON Carrito.CarritoID=libro_carrito.CarritoID
    INNER JOIN libro ON libro_carrito.LibroID=libro.LibroID
    INNER JOIN media ON libro.LibroID=media.LibroID
    INNER JOIN orden ON Carrito.CarritoID=Orden.CarritoID
    WHERE Carrito.Estatus_Carrito=0 AND Carrito.UsuarioID=:usuario;
    
    ');
    $sql->execute(['usuario' => $usuario->getID()]);
    $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang= "en" >
<head>
     <meta charset= "UTF - 8" >
     <meta name= "viewport" content = "width = device - width , initial - scale = 1.0">
     <link rel="shortcut icon" href="img/quran.png">
     <title>Historial de compras</title>
     <link rel="stylesheet" type="text/css" href = "cssarely/historial.css"/>

</head>
<body>
    <header>
    <?php include 'header.php'?> 
        <div class="header-2">
            <nav class="navbar">
                <a href="dashboard.php">inicio</a>
                <a href="perfil.php">perfil</a>
            </nav>
        </div> 
    </header>

    <section class="orders">

   <h1 class="title">Historial de compras</h1>

   <div class="box-container">
   <?php foreach($resultado as $row) {?>
      <div class="box">
            <?php 
                $id=$row['LibroID'];
                $imagen=$row['imagen1'];

                if(!file_exists($imagen)){
                    $imagen="images/no-photo.jpg";
                }
            ?>
        <a href="producto.php">
         <img class="image" src="<?php echo $imagen; ?>"></a>
         <p> Libro : <span><?php echo $row['Nombre_libro']?></span> </p>
         <p> Precio : <span>$<?php echo number_format($row['Precio_compra'],2,'.',','); ?></span> </p>
         <p> Autor : <span><?php echo $row['Autor_libro']?></span> </p>
         <p> Número de pedido : <span>543123</span> </p>
         <p> Estado del pedido : <span>Entregado</span> </p>
         <p> Llegó el día <span>20/08/2022</span> </p>


      </div>
   <?php } ?>
   </div>

</section>


</body >
</html>