<?php
    include 'sesion_usuario.php';

    $usuarioSesion = new UsuarioSesion();
    $usuarioSesion->cerrarSesion();

    header("location: ../index.php");
?>