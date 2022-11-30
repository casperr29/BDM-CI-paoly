<?php
    include_once 'includes/config.php';
    include_once 'includes/usuario.php';
    include_once 'includes/sesion_usuario.php';

    $TotalPrecio=0;
    $usuarioSesion = new UsuarioSesion();
    $usuarioTemp = $usuarioSesion->getCurrentUsuario();
    $passTemp = $usuarioSesion->getCurrentContrasenia();
    //session_start();

    if(isset($_SESSION['usuario'])){
        //echo "Hay sesión";
        $usuario = new Usuario();
        $usuario->setUsuario($usuarioTemp, $usuarioTemp, $passTemp);
        //include_once "dashboard.php";
    }  else {
        //echo "Login";
        include_once "login.php";
    }

    $db=new DB;
    $con=$db->connect();
    $sql=$con->prepare('SELECT 
    libro.Nombre_libro,
    libro.LibroID,
    libro_carrito.Precio_compra,
    libro.Cantidad_vendida,
    libro.Cantidad_disponibilidad-libro_carrito.Cantidad_compra AS "cantidad_disponible",
    Categoria.Nombre_categoria
    FROM libro
    INNER JOIN libro_carrito ON libro.LibroID=libro_carrito.LibroID
    INNER JOIN categoria_libro ON libro.LibroID=categoria_libro.LibroID
    INNER JOIN Categoria ON categoria_libro.CategoriaID=Categoria.CategoriaID
    WHERE libro.Usuario_libro=:usuario
    GROUP BY libro.LibroID;');
    $sql->execute(['usuario' => $usuario->getID()]);
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
    <link rel="stylesheet" type="text/css" href="cssarely/ventas.css"/>

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
        </div>  
    </header>

    <section class="container forms">
        <select name="select" id="Categorias">
            <option value="value1">Erótico</option>
            <option value="value2" selected>Fantasía</option>
            <option value="value3">Ciencia Ficción</option>
        </select>
        <select name="select" id="Meses">
            <option value="value1">Enero</option>
            <option value="value2" selected>Febrero</option>
            <option value="value3">Marzo</option>
            <option value="value3">Abril</option>
            <option value="value3">Mayo</option>
            <option value="value3">Junio</option>
            <option value="value3">Julio</option>
            <option value="value3">Agosto</option>
            <option value="value3">Septiembre</option>
            <option value="value3">Octubre</option>
            <option value="value3">Noviembre</option>
            <option value="value3">Diciembre</option>
            <option value="value3">Todos los meses</option>
        </select>
        <select name="select" id="Anio">
            <option value="value1">2022</option>
            <option value="value2" selected>2021/option>
            <option value="value3">2020</option>
        </select>
        <div class="field button-field">
            <button id="Buscar" >Mostrar Ventas</button>
        </div>
    </section>


    <table class="default" id="tablaventas">
        <thead id="ventasheader">
            <tr>
                <th>Nombre del producto</th>
                <th>ID del producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Fecha de venta</th>
                <th>Disponibilidad</th>
                <th>Categoria</th>
            </tr>
        </thead>
        <?php foreach($resultado as $row) {?>
        <tbody id="ventasrows">
            <tr>
                <td><?php echo $row['Nombre_libro']?></td>
                <td><?php echo $row['LibroID']?></td>
                <td><?php echo $row['Precio_compra']?></td>
                <td><?php echo $row['Cantidad_vendida']?></td>
                <td>Fecha</td>
                <td><?php echo $row['cantidad_disponible']?></td>
                <td><?php echo $row['Nombre_categoria']?></td>
            </tr>
        </tbody>
        <?php } ?>
    </table>

</body>
</html>