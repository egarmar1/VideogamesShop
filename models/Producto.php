<?php

class Producto {

    private $id;
    private $id_categoria;
    private $titulo;
    private $descripcion;
    private $precio;
    private $stock;
    private $fecha;
    private $imagen;
    private $db;

    function __construct() {
        $this->db = Database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getId_categoria() {
        return $this->id_categoria;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getStock() {
        return $this->stock;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_categoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }

    function setTitulo($titulo) {
        $this->titulo = $this->db->real_escape_string($titulo);
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    function setPrecio($precio) {
        $this->precio = $this->db->real_escape_string($precio);
        ;
    }

    function setStock($stock) {
        $this->stock = $this->db->real_escape_string($stock);
    }

    function setFecha($fecha) {
        $this->fecha = $this->db->real_escape_string($fecha);
    }

    function setImagen($imagen) {
        $this->imagen = $this->db->real_escape_string($imagen);
        ;
    }

    function getRandom() {
        $sql = "SELECT * from productos ORDER BY RAND() LIMIT 6";

        $products = $this->db->query($sql);

        return $products;
    }

    function getOne() {
        $sql = "SELECT * FROM productos WHERE id={$this->id}";
        $producto = $this->db->query($sql);

        return $producto->fetch_object();
    }

    function getAll() {
        $sql = "SELECT * FROM productos";
        $productos = $this->db->query($sql);

        return $productos;
    }

    function getAllFromCategory() {
        $sql = "SELECT * FROM productos WHERE id_categoria={$this->id_categoria}";
        $productos = $this->db->query($sql);

        return $productos;
    }

    function save() {
        $result = false;


        $sql = "INSERT INTO productos VALUES(null,$this->id_categoria,'$this->titulo','$this->descripcion',$this->precio,$this->stock,'$this->fecha','$this->imagen')";
        $save = $this->db->query($sql);




        if ($save) {
            $result = true;
            return $result;
        } else {
            return $result;
        }
    }

    function addFavourite($id_user) {
        $sql = "SELECT * FROM favouriteproduct WHERE id_usuario=$id_user AND id_producto=$this->id";
        $exists = $this->db->query($sql);

        if ($exists->num_rows > 0) {
            echo "hola";
            die();
            return false; //That favourite already exists
        } else {

            $sql = "INSERT INTO favouriteproduct VALUES(null,$id_user,$this->id)";

            $add = $this->db->query($sql);
            
            return true;
        }
    }

    function deleteFavourite($id_user) {

        $sql = "SELECT * FROM favouriteproduct WHERE id_usuario=$id_user AND id_producto=$this->id";
        $exists = $this->db->query($sql);


        if ($exists->num_rows > 0) {

            $sql = "DELETE FROM favouriteproduct WHERE id_usuario=$id_user AND id_producto=$this->id";
            $delete = $this->db->query($sql);
            return true;
        }
        return false;
    }

    function getFavourites($id_user) {
        $sql = "SELECT f.*,p.* FROM favouriteproduct f INNER JOIN productos p ON f.id_producto = p.id WHERE id_usuario=$id_user";

        $favourites = $this->db->query($sql);


        return $favourites;
    }

    function isFavourite($id_user, $id_prod) {
        $sql = "SELECT * FROM favouriteproduct WHERE id_usuario=$id_user AND id_producto=$id_prod";
        $exists = $this->db->query($sql);
        if ($exists->num_rows > 0) {
            return true;
        }
        return false;
    }
    function sumStock(){
        $result = false;
        
        $sql = "UPDATE productos SET stock = stock + 1 WHERE id=$this->id";
         
        $update = $this->db->query($sql);
        
        if($update){
            $result = true;
        }
        return $result;
    }
    
    function restStock(){
        $result = false;
            
        $sql = "SELECT stock from productos WHERE id=$this->id";
        $select = $this->db->query($sql);
        $stock = $select->fetch_object()->stock;
        
        var_dump($stock);
        
        if($stock == "1" ){
            $sql = "DELETE FROM productos WHERE id=$this->id";
        }else{
            $sql = "UPDATE productos SET stock = stock - 1 WHERE id=$this->id";
        }
        
        $update = $this->db->query($sql);
        
        if($update){
            $result = true;
        }
        return $result;
    }

}
