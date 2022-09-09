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

   <form action="" method="post">
      <h3>place your order</h3>
      <div class="flex">
         <div class="inputBox">
            <span>Nombre completo:</span>
            <input type="text" name="name" required placeholder="Ingrese su nombre">
         </div>
         <div class="inputBox">
            <span>Número de telefono o celular:</span>
            <input type="number" name="number" required placeholder="Ingrese su número">
         </div>
         <div class="inputBox">
            <span>your email :</span>
            <input type="email" name="email" required placeholder="Ingrese su correo">
         </div>
         <div class="inputBox">
            <span>Metodo de pago:</span>
            <select name="method">
               <option value="credit card">Terjeta de crédito</option>
               <option value="paypal">Paypal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Calle y número:</span>
            <input type="number" min="0" name="flat" required placeholder="Santiago Tapia #826">
         </div>
         <div class="inputBox">
            <span>Colonia:</span>
            <input type="text" name="street" required placeholder="Villa Vista">
         </div>
         <div class="inputBox">
            <span>Ciudad:</span>
            <input type="text" name="city" required placeholder="Monterrey">
         </div>
         <div class="inputBox">
            <span>Estado:</span>
            <input type="text" name="state" required placeholder="Nuevo León">
         </div>
         <div class="inputBox">
            <span>Pais:</span>
            <input type="text" name="country" required placeholder="México">
         </div>
         <div class="inputBox">
            <span>Codigo postal:</span>
            <input type="number" min="0" name="pin_code" required placeholder="66548 ">
         </div>
      </div>
      <input type="submit" value="Hacer compra" class="btn" name="order_btn">
   </form>

</section>



</body>
</html>