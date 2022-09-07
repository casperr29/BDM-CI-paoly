<!DOCTYPE html>
<html>
<head>
	<title> Tienda </title>
    <!-- ICONO -->
	<link rel="shortcut icon" href="img/quran.png">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="cssarely/dashboard.css"/>
     <!-- FONT AWESOME  -->
     
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <!-- SWIPER -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

</head>
<body>
    <header>
        <?php include 'header.php'?> 
        <div class="header-2">
            <nav class="navbar">
                <a href="login.php">inicio</a>
                <a href="login.php">categorias</a>
            </nav>
        </div> 
    </header>
    <section class="Inicio">

        <div class="content">
            <h3>Los mejores libros hasta la puerta de tu casa.</h3>
            <p>Compra los libros que mas te gusten sin tener que salir de la comodidad de tu casa.</p>
            <a href="buscar.php" class="white-btn">Descubre más</a>
        </div>

    </section>
    <section class="Vendidos">
           
   <h1 class="title">latest products</h1>

<div class="box-container">

  
  <form action="" method="post" class="box">
   <img class="image" src="img/freefall.jpg">
   <div class="name">Alice</div>
   <div class="price">100</div>
   <input type="number" min="1" name="product_quantity" value="1" class="qty">
   <input type="hidden" name="product_name" value="Alice">
   <input type="hidden" name="product_price" value="100">
   <input type="hidden" name="product_image" value="image">
   <input type="submit" value="Favorito" name="wishlist" class="btn">
   <input type="submit" value="Agregar al Carrito" name="cart" class="btn">
  </form>
  
</div>

<div class="load-more" style="margin-top: 2rem; text-align:center">
   <a href="shop.php" class="option-btn">load more</a>
</div>
    </section>

</body>
</html>