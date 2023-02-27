<?php

require_once 'models/Pedido.php';
require_once 'models/Usuario.php';

Class PedidoController {

    function index() {

        require_once 'views/pedido/index.php';
    }

    function info() {
        require_once "views/pedido/info.php";
    }

    function save() {
        if (isset($_POST)) {
            $state = isset($_POST['state']) ? $_POST['state'] : false;
            $city = isset($_POST['state']) ? $_POST['state'] : false;
            $address = isset($_POST['state']) ? $_POST['state'] : false;

            if ($state && $city && $address) {
                $pedido = new Pedido();
                $pedido->setUsuario_id($_SESSION['user']->id);
                $pedido->setProvincia($state);
                $pedido->setLocalidad($city);
                $pedido->setDireccion($address);

                $save = $pedido->save();
                $id = $pedido->save_detalles();


                if ($save && $id != null) {

                    $saved = true;

                    require_once 'views/pedido/realizado.php';
                } else {
                    header("Location:" . base_url);
                }
            }
        }
    }

    function usuario() {
        Utils::isIdentified();
        $pedido = new Pedido();
        $pedido->setUsuario_id($_SESSION['user']->id);
        $pedidos = $pedido->getPedidosFromUser();

        require_once 'views/pedido/usuario.php';
    }

    function verUno() {
        Utils::isIdentified();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $user_id = $_SESSION['user']->id;

            $pedido = new Pedido();
            $pedido->setId($id);
            $ped = $pedido->getPedido();
            
            $usuario = new Usuario();
            $usuario->setId($ped->usuario_id);
            $user = $usuario->getUser();
            
            if ($user_id != $ped->usuario_id && !isset($_SESSION['admin'])) {
                header("Location:" . base_url . "pedido/usuario");
                exit();
            }

            $productos = $pedido->getProductsFromPedido();

            require_once 'views/pedido/verUno.php';
        }
    }

}
