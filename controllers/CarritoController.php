<?php

require_once 'models/Producto.php';

Class CarritoController {

    function index() {
        $hayCarrito = false;
        if (isset($_SESSION['carrito'])) {
            $carrito = $_SESSION['carrito'];
            $hayCarrito = true;
        }
        require_once 'views/carrito/index.php';
    }

    function add() {
        
        $flag = false;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $prod = $producto->getOne();
        } else {
            header("Location:" . base_url);
        }

        if ($prod != null) {

            
            if (!isset($_SESSION['carrito'])) {

                $_SESSION['carrito'][] = array(
                    "id_producto" => $prod->id,
                    "precio" => $prod->precio,
                    "unidades" => 1,
                    "producto" => $prod
                );

                
            } else {

                foreach ($_SESSION['carrito'] as $key => $element) {
                    if ($element['id_producto'] == $prod->id) {
                        $_SESSION['carrito'][$key]['unidades'] ++;
                        $flag = true;
                    }
                    
                }
                
                
                if (!$flag) {
                    echo "hola";
                    $_SESSION['carrito'][] = array(
                        "id_producto" => $prod->id,
                        "precio" => $prod->precio,
                        "unidades" => 1,
                        "producto" => $prod
                    );
                }
            }
        }
        
        header("Location:".base_url."carrito/index");
    }
    function deleteAll(){
        if(isset($_SESSION['carrito'])){
            unset($_SESSION['carrito']);
        }
        header("Location:".base_url."carrito/index");
    }

}
