<?php
    include_once 'includes/config.php';
    include_once 'includes/usuario.php';
    include_once 'includes/sesion_usuario.php';

    $Total=0;
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
    libro.Nombre_libro,
    libro_carrito.LibroID,
    libro_carrito.Precio_compra,
    libro_carrito.Cantidad_compra,
    libro_carrito.PrecioTotal_compra,
    media.imagen1
    FROM Carrito
    INNER JOIN libro_carrito ON Carrito.CarritoID=libro_carrito.CarritoID
    INNER JOIN libro ON libro_carrito.LibroID=libro.LibroID
    INNER JOIN media ON libro.LibroID=media.LibroID
    INNER JOIN usuario ON carrito.UsuarioID=usuario.UsuarioID
    WHERE usuario.UsuarioID=:usuario AND Carrito.estatus_carrito=1;');
    $sql->execute(['usuario' => $usuario->getID()]);
    $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="shortcut icon" href="img/quran.png">
   <title>Carrito</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="cssarely/carrito.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>Carrito de compras</h3>
   <p> <a href="dashboard.php">Regresar al inicio</a></p>
</div>

<section class="shopping-cart">
    
   <h1 class="title">Productos agregados</h1>
    
   <div class="box-container">
      <?php foreach($resultado as $row) {?>
         <div class="box" style="display: contents;"> 
            <?php 
                $id=$row['LibroID'];
                $imagen=$row['imagen1'];

                if(!file_exists($imagen)){
                    $imagen="images/no-photo.jpg";
                }
            ?>
            <a href="producto.php?id=<?php echo $row['LibroID']; ?>&token=<?php echo hash_hmac('sha1',$row['LibroID'], KEY_TOKEN); ?>">
            <img class="image" src="<?php echo $imagen; ?>"></a>
            <div class="name"><?php echo $row['Nombre_libro']; ?></div>
            <div class="price">$<?php echo number_format($row['Precio_compra'],2,'.',','); ?></div>
            <?php $Total= $row['Precio_compra']; $TotalPrecio=$TotalPrecio+$Total;?>
         </div>
      <?php } ?>
            
      
      <!--<div class="box" style="display: contents;">
         <a href="producto.php"><img class="image" src="img/freefall.jpg"></a>
         <div class="name">Alice</div>
         <div class="price">$140</div>
      </div>

      <div class="box" style="display: contents;">
         <a href="producto.php"><img class="image" src="img/heartstopper.jpg"></a>
         <div class="name">Volumen uno</div>
         <div class="price">$200</div>
      </div>

      <div class="box" style="display: contents;">
         <a href="producto.php"><img class="image" src="img/libro_troll.jpg"></a>
         <div class="name">El libro troll</div>
         <div class="price">$100</div>
      </div>-->
      <!--</*?php echo '<p class="empty">Tu carrito esta vacio</p>'; ?>-->
   </div>

   <div style="margin-top: 2rem; text-align:center;">
      <a href="cart.php?delete_all" class="delete-btn">Vaciar carrito</a>
   </div>

   <div class="cart-total">
      <p>total a pagar : <span>$ <?php echo number_format($TotalPrecio,2,'.',','); ?></span></p>
      <div class="flex">
         <a href="Dashboard.php" class="option-btn">Seguir comprando</a>
         <a href="checkout.php" class="btn"> Pagar</a>
      </div>
   </div>

</section>

</body>
</html>