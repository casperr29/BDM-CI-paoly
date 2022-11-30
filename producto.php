<?php
    include_once 'includes/config.php';
    $db=new DB;
    $con=$db->connect();

    $id= isset($_GET['id']) ? $_GET['id'] : '';
    $token= isset($_GET['token']) ? $_GET['token'] : '';

    if($id==''||$token==''){
        echo 'Error al procesar la petición';
        exit;
    } else {
        $token_tmp=hash_hmac('sha1',$id,KEY_TOKEN);

        if($token==$token_tmp){
            $sql=$con->prepare('SELECT count(LibroID) FROM Libro WHERE LibroID=:id');
            $sql->execute(['id' => $id]);
            
            if($sql->fetchColumn()>0){
                $sql=$con->prepare('SELECT libro.Nombre_libro, libro.Descripcion_libro, libro.Precio_libro, libro.Valoracion, libro.Cantidad_disponibilidad, libro.Autor_libro, media.imagen1, media.imagen2, media.imagen3, media.video FROM Libro INNER JOIN media ON libro.LibroID=media.LibroID WHERE libro.LibroID=:id LIMIT 1');
                $sql->execute(['id' => $id]);
                $row=$sql->fetch(PDO::FETCH_ASSOC);
                $nombre=$row['Nombre_libro'];
                $descripcion=$row['Descripcion_libro'];
                $precio=$row['Precio_libro'];
                $valoracion=$row['Valoracion'];
                $disponibilidad=$row['Cantidad_disponibilidad'];
                $autor=$row['Autor_libro'];
                $imagen1=$row['imagen1'];
                $imagen2=$row['imagen2'];
                $imagen3=$row['imagen3'];
                $video=$row['video'];
                /*$dir_images='images/productos/'.$id.'/';

                $rutaImg=$dir_images.'principal.jpg';*/

                if(!file_exists($imagen1)){
                    $imagen1='images/no-photo.jpg';
                }

                /*$imagenes=array();
                $dir=dir($dir_images);

                while(($archivo=$dir->read())!=false){
                    if($archivo!='principal.jpg'){
                        $imagenes[]=$dir_images.$archivo;
                    }
                }
                $dir->close();*/
            }
        }else{
            echo 'Error al procesar la petición';
            exit;
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset=" UTF - 8 ">
    <meta http - equiv="X-UA-Compatible" content="IE = edge ">
    <meta name="viewport" content=" width = device - width , initial - scale = 1.0 ">
    <!-- ICONO -->
    <title> Shop </title>
    <!-- CSS -->  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="cssarely/dashboard.css" />
    <link rel="stylesheet" type="text/css" href="cssarely/producto.css" />
    <!-- FONT AWESOME  -->

    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYMEC3Yw5cVb3ZcuHt0A93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- SWIPER -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  

</head>

<body>
    <header>
        <?php include 'header.php' ?>
        <div class="header-2">
        <nav class="navbar" style="display: block">
                <a href="dashboard.php">inicio</a>
                <a href="dashboard.php">categorias</a>
                <a href="dashboard.php">mas vendidos</a>
                <a href="dashboard.php">nuevos</a>
                <a href="dashboard.php">vistos anteriormente</a>
            </nav>
        </div> > 
    </header>

    <div class = "card-wrapper">
        <div class = "card">
            <!-- card left -->
            <div class = "product-imgs">
                <div class = "img-display">
                    <div class = "img-showcase">
                        <img src = "<?php echo $imagen1?>" >
                        <img src = "<?php echo $imagen2?>">
                        <img src = "<?php echo $imagen3?>">
                        <img src = "<?php echo $video?>">
                    </div>
                </div>
           
                <div class = "img-select">
                    <div class = "img-item">
                        <a href = "#" data-id = "1">
                            <img src = "<?php echo $imagen1?>" >
                        </a>
                    </div>
                    <div class = "img-item">
                        <a href = "#" data-id = "2">
                            <img src = "<?php echo $imagen2?>">
                        </a>
                    </div>                        
                    <div class = "img-item">                    
                        <a href = "#" data-id = "3">
                            <img src = "<?php echo $imagen3?>">
                        </a>
                    </div>
                    <div class = "img-item">
                        <a href = "#" data-id = "4">
                            <img src = "<?php echo $video?>" >
                        </a>
                    </div>
                </div>
            </div>
            <!-- card right -->
            <div class = "product-content">
                <h2 class = "product-title"><?php echo $nombre?></h2>

                <div class = "product-rating">
                    <i class = "fas fa-star"></i>
                    <i class = "fas fa-star"></i>
                    <i class = "fas fa-star"></i>
                    <i class = "fas fa-star"></i>
                    <i class = "fas fa-star-half-alt"></i>
                    <span>4.7(21)</span>
                </div>

                <div class = "product-price">
                    <!--<p class = "last-price">Precio: <span>$</span></p>-->
                    <p class = "price">Precio: <?php echo MONEDA . number_format($precio, 2, '.',','); ?></p>
                </div>

                <div class = "product-detail">
                    <h2>descripcion: </h2>
                    <p><?php echo $autor?></p>
                    <p><?php echo $descripcion?></p>
                </div>

                <button class="btn wish-btn" onclick="vWishlist(<?php echo $usuario->getID()?>, <?php echo $id;?>, '<?php echo $token_tmp; ?>')">Add to wishlist</button>

                <div class = "purchase-info">
                    <input id="cantidad" name="cantidad" type = "number" min = "0" max="<?php echo $row['Cantidad_disponibilidad']; ?>"value = "1">
                    <?php 
                    if (!is_null($row['Precio_libro'])) {?>
                    <button class="btn cart-btn" onclick="vCarrito(<?php echo $usuario->getID()?>, <?php echo $id;?>, <?php echo $precio?>, cantidad.value, '<?php echo $token_tmp; ?>')">Add to cart</button>
                    <?php }?>
                    <?php 
                    if (is_null($row['Precio_libro'])) {?>
                    <button class="btn cart-btn" value="Cotizar" name="cart" class="btn">Ask!!</button>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
    <?php include 'comentarios.php' ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="jsarely/producto.js"></script>
    <script src="jsarely/checkout.js"></script>

</body>
</html>