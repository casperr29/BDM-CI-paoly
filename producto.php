
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
                        <img src = "img/freefall.jpg" >
                        <img src = "img/libro_troll.jpg">
                        <img src = "img/freefall.jpg">
                        <img src = "img/libro_troll.jpg">
                    </div>
                </div>
           
                <div class = "img-select">
                    <div class = "img-item">
                        <a href = "#" data-id = "1">
                            <img src = "img/freefall.jpg" >
                        </a>
                    </div>
                    <div class = "img-item">
                        <a href = "#" data-id = "2">
                            <img src = "img/libro_troll.jpg">
                        </a>
                    </div>                        
                    <div class = "img-item">                    
                        <a href = "#" data-id = "3">
                            <img src = "img/freefall.jpg">
                        </a>
                    </div>
                    <div class = "img-item">
                        <a href = "#" data-id = "4">
                            <img src = "img/libro_troll.jpg" >
                        </a>
                    </div>
                </div>
            </div>
            <!-- card right -->
            <div class = "product-content">
                <h2 class = "product-title">Freefall</h2>

                <div class = "product-rating">
                    <i class = "fas fa-star"></i>
                    <i class = "fas fa-star"></i>
                    <i class = "fas fa-star"></i>
                    <i class = "fas fa-star"></i>
                    <i class = "fas fa-star-half-alt"></i>
                    <span>4.7(21)</span>
                </div>

                <div class = "product-price">
                    <p class = "last-price">Precio: <span>$257.00</span></p>
                </div>

                <div class = "product-detail">
                    <h2>descripcion: </h2>
                    <p>PETER CAWDRON</p>
                    <p>Have you ever had those dreams where you feel like you are falling, and then your entire nerveous system reacts and makes you shake in the most violent way possible? Well, this book is like that</p>
                </div>

                <div class = "purchase-info">
                    <input type = "number" min = "0" value = "1">
                    <button class="btn cart-btn" onclick=vCarrito()>Add to cart</button>
                </div>
            </div>
        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="jsarely/producto.js"></script>
    <script src="jsarely/checkout.js"></script>

</body>
</html>