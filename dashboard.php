<?php
    include_once 'includes/config.php';
    $db=new DB;
    $con=$db->connect();
    $sql=$con->prepare('SELECT 
    libro.LibroID,
    libro.Nombre_libro,
    libro.Precio_libro,
    media.imagen1
    FROM libro
    INNER JOIN media ON libro.LibroID=media.LibroID;');
    $sql->execute();
    $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
?>
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
                <a href="dashboard.php">inicio</a>
                <a href="dashboard.php">categorias</a>
                <a href="dashboard.php">nuevos</a>
            </nav>
        </div> > 
    </header>
    <section class="Inicio">

        <div class="content">
            <h3>Los mejores libros hasta la puerta de tu casa.</h3>
            <p>Compra los libros que mas te gusten sin tener que salir de la comodidad de tu casa.</p>
            <a href="buscador.php" class="white-btn">Descubre más</a>
        </div>

    </section>
    <section class="Vendidos">
           
   <h1 class="title">Añadidos recientemente</h1>

<div class="box-container">

    <?php foreach($resultado as $row) {?>
        <div class="box">
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
            <div class="price">$<?php echo number_format($row['Precio_libro'],2,'.',','); ?></div>

            <button value="Favorito" name="wishlist" class="btn" onclick="vWishlist(<?php echo $usuario->getID()?>, <?php echo $id;?>, '<?php echo $token_tmp; ?>')">Favorito</button>
            <?php 
            if (!is_null($row['Precio_libro'])) {?>
            <button value="Agregar al Carrito" name="cart" class="btn" onclick="vCarrito(<?php echo $usuario->getID()?>, <?php echo $row['LibroID'];?>, <?php echo $row['Precio_libro']?>, 1, '<?php echo hash_hmac('sha1',$row['LibroID'], KEY_TOKEN); ?>')">Agregar al Carrito</button>
            <?php }?>
            <?php 
            if (is_null($row['Precio_libro'])) {?>
            <button value="Cotizar" name="cart" class="btn">Preguntar precio</button>
            <?php }?>
        </div>
    <?php } ?>
  
</div>


    </section>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="jsarely/checkout.js"></script>
</body>
</html>