<!DOCTYPE html>
<html lang= "en" >
<head>
     <meta charset= "UTF - 8" >
     <meta name= "viewport" content = "width = device - width , initial - scale = 1.0">
     <link rel="shortcut icon" href="img/quran.png">
     <title>Panel para actualizar estados de los pedidos</title>
     <link rel="stylesheet" type="text/css" href = "cssarely/pedidos-admin.css"/>

</head>
<body>
    <header>
    <?php include 'header.php'?> 
        <div class="header-2">
            <nav class="navbar">
                <a href="dashboard.php">inicio</a>
                <a href="perfil-admin.php">panel de administrador</a>
            </nav>
        </div> 
    </header>

    <section class="orders">

   <h1 class="title">Panel para actualizar estados de los pedidos</h1>

   <div class="box-container">

      <div class="box">
        <a href="producto.php"><img class="image" src="img/freefall.jpg"></a>
         <p> Número de pedido : <span>543123</span> </p>
         <p> Libro : <span>Freefall</span> </p>
         <p> Precio : <span>$200</span> </p>
         <p> Autor : <span>Peter Cawdron</span> </p>
         
         <form action="" method="post">
            
            <select >
               <option value=""></option>
               <option value="preparacion">en preparación</option>
               <option value="pendiente">pendiente</option>
               <option value="entrgado">entregado</option>

               <a  class="btn">Actualizar</a>
            </select>
            
         </form>


      </div>

   </div>

</section>


</body >
</html>