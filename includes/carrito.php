<?php
    require 'config.php';
    $db=new DB;
    $con=$db->connect();

    if(isset($_POST['id'])){
        $usuario = $_POST['usuario'];
        $id = $_POST['id'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $token = $_POST['token'];

        $token_tmp=hash_hmac('sha1',$id,KEY_TOKEN);

        if($token==$token_tmp){
            $sql=$con->prepare('CALL sp_AgregarCarrito(:usuario,:producto,:precio,:cantidad)');
            $sql->execute(['usuario' => $usuario, 'producto' => $id, 'precio' => $precio, 'cantidad' => $cantidad]);

            $datos['ok']=true;
        } else {
            $datos['ok']=false;
        }

    } else {
        $datos['ok']=false;
    }

    echo json_encode($datos);
?>