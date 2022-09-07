<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>cart</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="cssarely/carrito.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>shopping cart</h3>
   <p> <a href="dashboard.php">home</a></p>
</div>

<section class="shopping-cart">

   <h1 class="title">Productos agregados</h1>

   <div class="box-container">
      
      <div class="box">

      <?php echo '<p class="empty">your cart is empty</p>'; ?>
   </div>

   <div style="margin-top: 2rem; text-align:center;">
      <a href="cart.php?delete_all" class="delete-btn">delete all</a>
   </div>

   <div class="cart-total">
      <p>grand total : <span>$</span></p>
      <div class="flex">
         <a href="shop.php" class="option-btn">continue shopping</a>
         <a href="checkout.php" class="btn"> proceed to checkout</a>
      </div>
   </div>

</section>

</body>
</html>