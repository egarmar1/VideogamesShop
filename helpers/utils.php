<?php

class Utils {

    public static function deleteSession($session) {
        if (isset($_SESSION[$session])) {
            unset($_SESSION[$session]);
        }
    }
    
    public static function isIdentified(){
        if (!isset($_SESSION['user'])) {
            header("Location:" . base_url);
        }
        return true;
    }

    public static function isAdmin() {
        if (!isset($_SESSION['admin'])) {
            header("Location:" . base_url);
        }
        return true;
    }

    public static function showCategorias() {
        require_once 'models/Categoria.php';
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        return $categorias;
    }

    public static function infoCarrito() {

        $stats = array(
            "unidades" => 0,
            "total" => 0,
        );

        if (isset($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $key => $element) {
                $stats['unidades'] += $element['unidades'];
                $stats['total'] += $element['precio'] * $element['unidades'];
            }
        } else {
            return false;
        }
        return $stats;
    }

}
