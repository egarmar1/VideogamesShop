<?php

require_once 'models/Categoria.php';
require_once 'models/Producto.php';

class CategoriaController {

    public function index() {
        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        require_once 'views/categoria/index.php';
    }

    public function crear() {
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }

    public function save() {
        Utils::isAdmin();
        if (isset($_POST['name'])) {
            $nombre = $_POST['name'];

            $categoria = new Categoria();
            $categoria->setNombre($nombre);
            $save = $categoria->save();
        }
        header("Location:" . base_url . "categoria/index");
    }

    public function ver() {
        if (isset($_GET['id'])) {
            
            $idCat=$_GET['id'];
            
            $categoria = new Categoria();
            $categoria->setId($idCat);
            $new_categoria = $categoria->getOne(); //To check if the category exists
            
            
            $product = new Producto();
            $product->setId_categoria($idCat);
            $products = $product->getAllFromCategory();

            require_once 'views/categoria/ver.php';
        }
    }

}
