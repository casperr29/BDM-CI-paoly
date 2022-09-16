<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="shortcut icon" href="img/quran.png">
   <title>buscador</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <link rel="stylesheet" href="cssarely/buscador.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>Buscador</h3>
   <p> <a href="dashboard.php">Regresar al inicio</a> </p>
</div>

<section class="search-form">
   <form action="" method="post">
      <input type="text" name="search" placeholder="buscar productos..." class="box">
      <input type="submit" name="submit" value="buscar" class="btn">
   </form>
</section>

<section class="products" style="padding-top: 0;">

   <div class="box-container">
   
   </div>
  

</section>