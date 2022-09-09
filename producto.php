<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset=" UTF - 8 ">
    <meta http - equiv="X-UA-Compatible" content="IE = edge ">
    <meta name="viewport" content=" width = device - width , initial - scale = 1.0 ">
    <!-- ICONO -->
    <title> Shop </title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="cssarely/dashboard.css" />
    <link rel="stylesheet" type="text/css" href="cssarely/producto.css" />
    <!-- FONT AWESOME  -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO " crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYMEC3Yw5cVb3ZcuHt0A93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- SWIPER -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

</head>

<body>
    <header>
        <?php include 'header.php' ?>
        <div class="header-2">
            <nav class="navbar">
                <a href="dashboard.php">inicio</a>
            </nav>
        </div>
    </header>

    <div class="cols__container">
        <main class="container">

            <!-- Left Column / Headphones Image -->
            <div class="left-column">
                <img data-image="black" src="images/black.png" alt="">
                <img data-image="blue" src="images/blue.png" alt="">
                <img data-image="red" class="active" src="img/freefall.jpg" alt="">
            </div>


            <!-- Right Column -->
            <div class="right-column">

                <!-- Product Description -->
                <div class="product-description">
                    <span>PETER CAWDRON</span>
                    <h1>FREE FALL</h1>
                    <p>Have you ever had those dreams where you feel like you are falling, and then your entire nerveous system reacts and makes you shake in the most violent way possible? Well, this book is like that</p>
                </div>

                <div class="salesclerk-name">
                    <a href="perfil.php">
                        <div class="img__container">
                            <img src="img/user.jpeg" alt="Anna Smith" />
                        </div>
                        <h2>Anna Smith</h2>
                    </a>
                </div>

                <!-- Product Configuration -->
                <div class="product-configuration">

                    <!-- Product Color -->
                    <div class="product-color">
                        <span>Color</span>

                        <div class="color-choose">
                            <div>
                                <input data-image="red" type="radio" id="red" name="color" value="red" checked>
                                <label for="red"><span></span></label>
                            </div>
                            <div>
                                <input data-image="blue" type="radio" id="blue" name="color" value="blue">
                                <label for="blue"><span></span></label>
                            </div>
                            <div>
                                <input data-image="black" type="radio" id="black" name="color" value="black">
                                <label for="black"><span></span></label>
                            </div>
                        </div>

                    </div>

                    <!-- Cable Configuration -->
                    <div class="cable-config">
                        <span>Opciones adicionales</span>

                        <div class="cable-choose">
                            <button>Opción 1</button>
                            <button>Opción 2</button>
                            <button>Opción 3</button>
                        </div>

                        <a href="#">Link de ayuda</a>
                    </div>
                </div>

                <!-- Product Pricing -->
                <div class="product-price">
                    <span>148$</span>
                    <button class="btn cart-btn">Add to cart</button>
                </div>
            </div>
        </main>
    </div>

</body>