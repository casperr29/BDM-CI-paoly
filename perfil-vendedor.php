<!DOCTYPE html>
<html lang= "en" >
<head>
     <meta charset= "UTF - 8" >
     <meta name= "viewport" content = "width = device - width , initial - scale = 1.0">
     <title> User Profile Page </title>
     <link rel="stylesheet" type="text/css" href = "cssarely/perfil.css"/>

</head>
<body>
    <header>
    <?php include 'header.php'?> 
        <div class="header-2">
            <nav class="navbar">
                <a href="dashboard.php">inicio</a>
            </nav>
        </div> 
    </header>

    <div class="cols__container">
        <div class="left__col">
            <div class="img__container">
                <img src="img/user.jpeg" alt="Anna Smith" />
            </div>
            <h2>Anna Smith</h2>
            <p>anna@example.com</p>


        </div>
        <div class="right__col">
          <nav>
            <ul>
              <li><a href="">Productos</a></li>

            </ul>
            <a href="perfil-vendedor.php" class="btn">Agrega un producto</a>
          </nav>

          <div class="photos">
          </div>
        </div>

</body >
</html>