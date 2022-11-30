<?php
   $baseUrl = 'http://localhost/BDM/BDM-CI-paoly';
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
  

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="cssarely/checkout.css">
   <link rel="stylesheet" href="cssarely/carrito.css">

</head>
<body>

<?php include 'header.php'; ?>

<div class="heading">
   <h3>Confirmar compra</h3>
   <p> <a href="dashboard.php">Regresar al inicio</a></p>
</div>

<section class="shopping-cart">

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
      </div>
      <div class="cart-total">
         <p>total a pagar : <span>$ <?php echo number_format($TotalPrecio,2,'.',','); ?></span></p>
      </div>

</section>

<section class="checkout">

   <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="form_pay">
      <!-- datos que pide la api  -->
      <input type="hidden" name="business" value="sb-wmaxm22790115@business.example.com">
      <input type="hidden" name="cmd" value="_xclick">

      <!--label for="item_name" class="form-label">item_name</label-->
      <input type="hidden" name="item_name" id="" value="Carrito" required=""><br>

      <!--label for="amount" class="form-label">amount</label-->
      <input type="hidden" name="amount" id="" value="<?php echo $TotalPrecio; ?>" required=""><br>

      <input type="hidden" name="currency_code" value="MXN">

      <!--label for="quantity" class="form-label">quantity</label-->
      <input type="hidden" name="quantity" id="" value="1" required=""><br>
      <input type="hidden" name="item_number" value="1">

      <!-- datos extra  -->
      <h3>datos de envio</h3>
      <div class="flex">
         <div class="inputBox">
            <span>Nombre completo:</span>
            <input type="text" id="name" name="name" placeholder="Ingrese su nombre">
         </div>
         <div class="inputBox">
            <span>Número de telefono o celular:</span>
            <input type="number" id="number" name="number" placeholder="Ingrese su número">
         </div>
         <div class="inputBox">
            <span>your email :</span>
            <input type="email" id="email" name="email" placeholder="Ingrese su correo">
         </div>
         <div class="inputBox">
            <span>Calle y número:</span>
            <input type="Text" id="calle" placeholder="Santiago Tapia #826">
         </div>
         <div class="inputBox">
            <span>Colonia:</span>
            <input type="text" id="street" name="street" placeholder="Villa Vista">
         </div>
         <div class="inputBox">
            <span>Ciudad:</span>
            <input type="text" id="city" name="city" placeholder="Monterrey">
         </div>
         <div class="inputBox">
            <span>Estado:</span>
            <input type="text" id="state" name="state" placeholder="Nuevo León">
         </div>
         <div class="inputBox">
            <span>Pais:</span>
            <input type="text" id="country" name="country" placeholder="México">
         </div>
         <div class="inputBox">
            <span>Codigo postal:</span>
            <input type="number" id="pin_code" min="0" name="pin_code" placeholder="66548 ">
         </div>
      </div>

      <input type="hidden" name="lc" value="es_ES">
      <input type="hidden" name="no_shipping" value="1">
      <input type="hidden" name="image_url" value="logo2.png">
      <input type="hidden" name="return" value="<?= $baseUrl ?>/receptor.php">
      <input type="hidden" name="cancel_return" value="<?= $baseUrl ?>/dashboard.php">
      <hr>

      <button type="submit">Pagar ahora con Paypal!</button>
      <!-- <input value="Hacer compra" class="btn" name="order_btn" onclick=vDatosIncompletosUsuario()> -->
      
   </form>

</section>

         <template id="AlertDatosIncompletos">
            <swal-title>
                Aun no puedes realizar tu compra
            </swal-title>
            <swal-html>
                <p>por favor llena todos los datos primero</p>
            </swal-html>
            <swal-icon type="warning" color="red"></swal-icon>
            <swal-button type="confirm" color="#c9729f">
                OK
            </swal-button>
        </template>

      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="jsarely/checkout.js"></script>
</body>
</html>