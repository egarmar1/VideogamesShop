<?php

require_once 'models/Producto.php';

class ProductoController {

    public function index() {
        $producto = new Producto();
        $products = $producto->getRandom();



        require_once 'views/producto/random.php';
    }

    public function ver() {
        if ($_GET['id']) {
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $prod = $producto->getOne();

            require_once 'views/producto/ver.php';
        }
    }

    public function gestion() {
        $producto = new Producto();
        $productos = $producto->getAll();

        require_once 'views/producto/gestion.php';
    }

    public function crear() {
        require_once 'views/producto/crear.php';
    }

    public function save() {

        if (isset($_POST)) {

            $title = isset($_POST['title']) ? $_POST['title'] : false;
            $description = isset($_POST['description']) ? $_POST['description'] : false;
            $price = isset($_POST['price']) ? $_POST['price'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $file = isset($_FILES['image']) ? $_FILES['image'] : false;
            $id_categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            $date = isset($_POST['date']) ? $_POST['date'] : false;




            if ($date && $title && $description && $price && $stock) {

                $new_product = new Producto();
                $new_product->setTitulo($title);
                $new_product->setDescripcion($description);
                $new_product->setPrecio($price);
                $new_product->setFecha($date);
                $new_product->setStock($stock);
                $new_product->setId_categoria($id_categoria);



                $filename = $file['name'];
                $mimetype = $file['type'];

                if ($mimetype == 'image/png' || $mimetype == 'image/jpeg' || $mimetype == 'image/jpg' || $mimetype == 'image/gif') {

                    if (!is_dir('uploads/images')) {
                        mkdir('uploads/images', 0777, true);
                    }
                    move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
                    $new_product->setImagen($filename);
                    $saved = $new_product->save();

                    if (!$saved) {
                        $_SESSION['notSaved'] = 'Product not saved';
                    }
                } else {
                    $_SESSION['notSaved'] = 'Invalid type of image';
                }
            } else {

                $_SESSION['notSaved'] = 'Error in the form';
            }
        } else {

            $_SESSION['notSaved'] = 'Error in the form';
        }
        if (isset($_SESSION['notSaved'])) {
            header("Location:" . base_url . "producto/crear");
        } else {
            header("Location:" . base_url . "producto/gestion");
        }
    }

    function addFavourite() {
        Utils::isIdentified();
        if (isset($_GET['id'])) {
            $id_prod = $_GET['id'];

            $producto = new Producto();

            $producto->setId($id_prod);
            $producto->getOne();
            $producto->addFavourite($_SESSION['user']->id);

           
            header("Location:".base_url."producto/favourites");
        }
    }

    function favourites() {
        Utils::isIdentified();
        $id_user = $_SESSION['user']->id;

        $producto = new Producto();
        $favourites = $producto->getFavourites($id_user);


        require_once 'views/producto/favourites.php';
    }

    function deleteFav() {
        Utils::isIdentified();
        
        if ($_GET['id']) {
            
            $id_prod = $_GET['id'];
            $id_user = $_SESSION['user']->id;

            $producto = new Producto();
            $producto->setId($id_prod);
            $producto->deleteFavourite($id_user);
            
          header("Location:".base_url."producto/favourites");
        }
    }
    
    function sumStock(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            
            $prod = new Producto();
            $prod->setId($id);
            $prod->sumStock();
            
            header("Location:".base_url."producto/gestion");
            
        }
    }
    
    function restStock(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            
            $prod = new Producto();
            $prod->setId($id);
            $prod->restStock();
            
            header("Location:".base_url."producto/gestion");
            
        }
    }

}
