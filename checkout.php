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

</head>
<body>
<?php
$baseUrl = 'http://localhost/BDM-CI-paoly';
?>  
<?php include 'header.php'; ?>

<div class="heading">
   <h3>Confirmar compra</h3>
   <p> <a href="dashboard.php">Regresar al inicio</a></p>
</div>

<section class="display-order">

     <?php echo '<p class="empty">Tu carrito esta vacio</p>'; ?>
   <div class="grand-total"> total a pagar: <span>$</span> </div>

</section>

<section class="checkout">

   <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="form_pay">
      <!-- datos que pide la api  -->
      <input type="hidden" name="business" value="sb-wmaxm22790115@business.example.com">
      <input type="hidden" name="cmd" value="_xclick">

      <!--label for="item_name" class="form-label">item_name</label-->
      <input type="hidden" name="item_name" id="" value="Carrito" required=""><br>

      <!--label for="amount" class="form-label">amount</label-->
      <input type="hidden" name="amount" id="" value="13.00" required=""><br>

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