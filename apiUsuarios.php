<?php

    include_once 'includes/usuario.php';

    class ApiUsuarios{
        
        function getAll(){
            $usuario = new Usuario();
            $usuarios = array();
            $usuarios["items"] = array();

            $res = $usuario->obtenerUsuarios();

            if($res->rowCount()){
                while($row = $res->fetch(PDO::FETCH_ASSOC)){
                    $item = array(
                        'id' => $row['UsuarioID'],
                        'correo' => $row['Correo'],
                        'nickname' => $row['Nickname'],
                        'contraseña' => $row['Contrasenia'],
                        'rol' => $row['Rol'],
                        'avatar' => $row['Avatar'],
                        'nombre' => $row['Nombre'],
                        'fecha de nacimiento' => $row['FechaNacimiento'],
                        'fecha de registro' => $row['FechaAdmision'],
                        'privacidad' => $row['Privacidad'],
                        'status' => $row['Estatus_Usuario']
                    );
                    array_push($usuarios['items'], $item);
                }

                echo json_encode($usuarios);
            } else {
                echo json_encode(array('mensaje'=>'No hay elementos registrados'));
            }
        }
    }

    
    if(!empty($_POST['email']) && !empty($_POST['nombre']) && !empty($_POST['nickname']) && !empty($_POST['fechaNacimiento']) && !empty($_POST['contrasenia'])){
        $usuario = new Usuario();
        
        $emailForm = $_POST['nombre'];
        $nicknameForm = $_POST['nickname'];
        $passForm = $_POST['contrasenia'];
        $nameForm = $_POST['nombre'];
        $dobForm = $_POST['fechaNacimiento'];
        
        $usuario->insertarUsuario($emailForm, $nicknameForm, $passForm, $nameForm, $dobForm);
        
        header("location: index.php");
                
    } 
      
?>