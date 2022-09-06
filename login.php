<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<title> Responsive Login and Signup Form </title>-->

        <!-- CSS -->
        <link rel="stylesheet" href="cssarely/login.css">
                
        <!-- Boxicons CSS -->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
                        
    </head>
    <body>
        <section class="container forms">
            <div class="form login">
                <div class="form-content">
                    <header>Iniciar Sesión</header>
                    <form action="#">
                        <div class="field input-field">
                            <input type="email" placeholder="Correo eletrónico" class="input">
                        </div>

                        <div class="field input-field">
                            <input type="password" placeholder="Contraseña" class="password">
                            <i class='bx bx-hide eye-icon'></i>
                        </div>

                        <div class="field button-field">
                            <button>Iniciar sesión</button>
                        </div>
                    </form>

                    <div class="form-link">
                        <span>¿No tienes una cuenta? <a href="#" class="link signup-link">Crea una</a></span>
                    </div>
                </div>

            </div>

            <!-- Signup Form -->

            <div class="form signup">
                <div class="form-content">
                    <header>Crear Cuenta</header>
                    <form action="#">
                        <div class="field input-field">
                            <input type="email" placeholder="Correo electrónico" class="input">
                        </div>

                        <div class="field input-field">
                            <input type="email" placeholder="Nombre completo" class="input">
                        </div>

                        <div class="field input-field">
                            <input type="email" placeholder="Nombre de usuario" class="input">
                        </div>

                        <div class="field input-field">
                            <input type="date" placeholder="Fecha de nacimiento" class="input">
                        </div>

                        <div class="field input-field">
                            <input type="password" placeholder="Contraseña" class="password">
                        </div>

                        <div class="field input-field">
                            <input type="password" placeholder="Confirma tu contraseña" class="password">
                            <i class='bx bx-hide eye-icon'></i>
                        </div>


                        <div class="field button-field">
                            <button >Iniciar sesión</button>
                        </div>
                    </form>

                    <div class="form-link">
                        <span>¿Ya tienes una cuenta? <a href="#" class="link login-link">Inicia sesión</a></span>
                    </div>
                </div>
            </div>
        </section>

        <!-- JavaScript -->
        <script src="jsarely/login.js"></script>
    </body>
</html>
