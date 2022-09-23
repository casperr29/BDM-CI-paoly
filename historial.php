<!DOCTYPE html>
<html lang= "en" >
<head>
     <meta charset= "UTF - 8" >
     <meta name= "viewport" content = "width = device - width , initial - scale = 1.0">
     <link rel="shortcut icon" href="img/quran.png">
     <title>Perfil</title>
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

      <div class="box">
        <a href="producto.php"><img class="image" src="img/freefall.jpg"></a>
         <p> Libro : <span>Freefall</span> </p>
         <p> Precio : <span>$200</span> </p>
         <p> Autor : <span>Peter Cawdron</span> </p>
         <p> Número de pedido : <span>543123</span> </p>
         <p> Estado del pedido : <span>Entregado</span> </p>
         <p> Llegó el día <span>20/08/2022</span> </p>


      </div>

   </div>

</section>


</body >
</html>