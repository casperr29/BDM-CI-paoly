<?php 
    include_once 'includes/producto.php';

    $producto=new producto();
    $items=$producto->getAllItems();
    echo json_encode(['statuscode'=>200, 'items'=>$items]);
    /*class ApiProductos{
        
        function getAll(){
            $producto = new Producto();
            $productos = array();
            $productos["items"] = array();

            $res = $producto->obtenerProductos();

            if($res->rowCount()){
                while($row = $res->fetch(PDO::FETCH_ASSOC)){
                    $item = array(
                        'id'=> $row['LibroID'],
                        'nombre'=> $row['Nombre_libro'],
                        'precio'=> $row['Precio_libro']
                    );
                    array_push($productos['items'], $item);
                }

                echo json_encode($productos);
            } else {
                echo json_encode(array('mensaje'=>'No hay elementos registrados'));
            }
        }
    }*/

?>