<?php 
    include_once 'includes/usuario.php';
    include_once 'includes/sesion_usuario.php';

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

    include_once 'includes/config.php';
    $db=new DB;
    $con=$db->connect();

    $sql=$con->prepare('SELECT count(UsuarioID) FROM usuario WHERE UsuarioID=:usuario');
    $sql->execute(['usuario' => $usuario->getID()]);

    if($sql->fetchColumn()>0){
        $sql=$con->prepare('CALL sp_PerfilUsuario(:usuario, :rol)');
        $sql->execute(['usuario' => $usuario->getID(), 'rol' => $usuario->getRol()]);
        $row=$sql->fetch(PDO::FETCH_ASSOC);

        $correo=$row['Correo'];
        $nickname=$row['Nombre de usuario'];
        $avatar=$row['Imagen de perfil'];
        $nombre=$row['Nombre'];
        $fecha_nacimiento=$row['Fecha de nacimiento'];
        $fecha_admision=$row['Fecha de registro'];
        $privacidad=$row['Privacidad'];

        $sql=$con->prepare('SELECT
        libro.LibroID,
        media.imagen1,
        lista_libro.ListaID,
        lista.Usuario_lista
        FROM Libro
        INNER JOIN media ON libro.LibroID=media.LibroID
        INNER JOIN lista_libro ON Libro.LibroID=lista_libro.LibroID
        INNER JOIN lista ON lista_libro.ListaID=lista.ListaID
        WHERE lista.Usuario_lista=:usuario;');
        $sql->execute(['usuario' => $usuario->getID()]);
        $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
?>
<!DOCTYPE html>
<html lang= "en" >
<head>
     <meta charset= "UTF - 8" >
     <meta name= "viewport" content = "width = device - width , initial - scale = 1.0">
     <link rel="shortcut icon" href="img/quran.png">
     <title>Perfil</title>
     <link rel="stylesheet" type="text/css" href = "cssarely/perfil.css"/>

</head>
<body>
    <header>
    <?php include 'header.php'?> 
        <div class="header-2">
            <nav class="navbar">
                <a href="index.php">inicio</a>
                <a href="historial.php">historial</a>
                <a href="includes/logout.php">salir</a>
            </nav>
        </div> 
    </header>

    <div class="cols__container">
        <div class="left__col">
            <div class="img__container">
                <img src="img/user.jpeg" alt="Anna Smith" />
            </div>
            <h2><?php echo $nombre?></h2>
            <p><?php echo $correo?></p>
            <a href="editarperfil.php" class="btn">Editar datos</a>

        </div>
        <div class="right__col">
          <nav>
            <ul>
              <li><a href="">Mi lista de deseados</a></li>
            </ul>

            <a href="perfil-vendedor.php" class="btn">Empieza a vender con nosotros</a>
          </nav>

          <div class="photos">
            <?php foreach($resultado as $row) {?>
                <div class="box" style="height: 20rem;">
                    <?php 
                        $id=$row['LibroID'];
                        $imagen=$row['imagen1'];

                        if(!file_exists($imagen)){
                            $imagen="images/no-photo.jpg";
                        }
                    ?>
                    <a href="producto.php?id=<?php echo $row['LibroID']; ?>&token=<?php echo hash_hmac('sha1',$row['LibroID'], KEY_TOKEN); ?>">
                    <img class="image" src="<?php echo $imagen; ?>"></a>
                </div>
            <?php }?>

          </div>
        </div>

</body >
</html>