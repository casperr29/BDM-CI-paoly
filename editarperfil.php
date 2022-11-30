<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="img/quran.png">

        <!-- CSS -->
        <link rel="stylesheet" href="cssarely/login.css">
                        
    </head>
    <body>
        <section class="container forms">
            <div class="form login">
                <div class="form-content">
                    <header>Actualizar Datos</header>
                    <form action="" method="POST">
                        <div class="field input-field">

                            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
                        </div>   
                        <div class="field input-field">
                            <input type="text" name="userSession" id="iEmail" placeholder="Correo eletrónico" class="input">
                        </div>
                        <div class="field input-field">
                            <input type="text" name="userSession" id="name" placeholder="Nombre" class="input">
                        </div>
                        <div class="field input-field">
                            <input type="text" name="userSession" id="password" placeholder="Contraseña" class="input">
                        </div>
                        <div class="field button-field">
                            <button id="Actualizar">
                                <a href="perfil.php" class="btn">Guardar nuevos datos</a>
                            </button>
                        </div>
                    </form>
                </div>           
            </div>     
        </section>
    </body>
</html>