<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes</title>
    <link rel="stylesheet" type="text/css" href="cssarely/dashboard.css"/>
    <link rel="stylesheet" type="text/css" href="cssarely/mensajes.css"/>
    <link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
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
    <section class="body-chat">
        <div class="seccion-titulo">
            <h3>
                <i class="bx bx-chat"></i>
                Sistema de mensajeria
            </h3>
        </div>
        <div class="seccion-usuarios">
           
            <div class="seccion-lista-usuarios">
                <div class="usuario">
                    <div class="avatar">
                        <img src="ruta_img" alt="img">

                    </div>
                    <div class="cuerpo">
                        <span> Nombre apellido</span>
                        <span>detalles de mensaje</span>
                    </div>
                </div>
        </div>
    </div>
    <div class="seccion-chat">
        <div class="usuario-seleccionado">
            <div class="avatar">
                <img src="ruta_img" alt="img">
            </div>
            <div class="cuerpo">
                <span>Nombre de usuario</span>

            </div>
        </div>
        <div class="panel-chat">
            <div class="mensaje">
                <div class="cuerpo">
                    <div class="texto">
                        Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Dolor eligendi voluptatum dolore voluptas iure.
                        <span class="tiempo">
                            <i class="far fa-clock"></i>
                            Hace 5 min
                        </span>
                    </div>
                   
                </div>
            </div>
            <!-- derecha -->
            <div class="mensaje left">
                <div class="cuerpo">
                    <div class="texto">
                        Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Dolor eligendi voluptatum dolore voluptas iure.
                        <span class="tiempo">
                            <i class="far fa-clock"></i>
                            Hace 6 min
                        </span>
                    </div>   
                </div>
            </div>
        </div>
        <div class="panel-escritura">
            <form class="textarea">
                <div class="opcines">
                    <button type="button">
                        <i class="fas fa-file"></i>
                        <label for="file"></label>
                        <input type="file" id="file">
                    </button>
                    <button type="button">
                        <i class="far fa-image"></i>
                        <label for="img"></label>
                        <input type="file" id="img">
                    </button>
                </div>
                <textarea placeholder="Escribir mensaje"></textarea>
                <button type="button" class="enviar">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
</section>

</body>

</html>