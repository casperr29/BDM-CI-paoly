<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="img/quran.png">
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
                            <input type="email" id="iEmail" placeholder="Correo eletrónico" class="input">
                        </div>

                        <div class="field input-field">
                            <input type="password" id="iPass" placeholder="Contraseña" class="password">
                            <i class='bx bx-hide eye-icon'></i>
                        </div>

                        <div class="field button-field">
                            <button id="iniciarSesion" onclick=validacionInicio()>Iniciar sesión</button>
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
                            <input type="email" id="email" placeholder="Correo electrónico" class="input">
                        </div>

                        <div class="field input-field">
                            <input type="text" id="nombre" placeholder="Nombre completo" class="input">
                        </div>

                        <div class="field input-field">
                            <input type="text" id="user" placeholder="Nombre de usuario" class="input">
                            <span id="txUser"></span>
                        </div>

                        <div class="field input-field">
                            <input type="date" id="fechaNacimiento" class="Fecha" placeholder="Fecha de nacimiento" class="input" onclick=fechaActual()>
                        </div>

                        <div class="field input-field">
                            <input type="password" id="pass" placeholder="Contraseña" class="password">
                            <span id="txPass"></span>
                        </div>

                        <div class="field input-field">
                            <input type="password" id="confirmPass" placeholder="Confirma tu contraseña" class="password">
                            <i class='bx bx-hide eye-icon'></i>
                        </div>


                        <div class="field button-field">
                            <button id="Registrar" onclick=validacionRegistro()>Iniciar sesión</button>
                        </div>
                    </form>

                    <div class="form-link">
                        <span>¿Ya tienes una cuenta? <a href="#" class="link login-link">Inicia sesión</a></span>
                    </div>
                </div>
            </div>
        </section>

        <template id="AlertDatosIncompletos">
            <swal-title>
                Sabemos que quieres entrar pero primero
            </swal-title>
            <swal-html>
                <p>por favor llena todos los datos</p>
            </swal-html>
            <swal-icon type="warning" color="red"></swal-icon>
            <swal-button type="confirm" color="#c9729f">
                OK
            </swal-button>
        </template>

        <!-- JavaScript -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="jsarely/jquery-3.6.0.min.js"></script>
        <script src="jsarely/login.js"></script>
        <script src="jsarely/validaciones_login y registro.js"></script>

    </body>
</html>
