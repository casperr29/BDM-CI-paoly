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
         <a href="includes/logout.php">Salir</a>
      </nav>

      <div class="icons">


      </div>

   </div>

</header>

    <section class="dashboard" style="font-size: medium;">

        <?php
            include_once 'apiUsuarios.php';

            $api = new ApiUsuarios();

            $api->getAll();
        ?>

    </section>

</body>
</html>