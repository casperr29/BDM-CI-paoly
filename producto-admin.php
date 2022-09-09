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
         <a href="perfil-admin.php">Panel de administrador</a>
      </nav>

      <div class="icons">

      </div>

   </div>

</header>

<section class="show-products">

<div class="box-container">

   <div class="box">

   <a href="producto.php"><img class="image" src="img/freefall.jpg"></a>
        <div class="name">Free Fall</div>
        <div class="price">100</div>
      <a class="option-btn">update</a>
      <a class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
   </div>
   
   
   
</div>

</section>

</body>
</html>