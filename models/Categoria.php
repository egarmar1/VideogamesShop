<?php

class Categoria{
    private $id;
    private $nombre;
    private $db;
    
    function __construct() {
        $this->db = Database::connect();
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


    function getAll(){
        $sql = "SELECT * FROM categorias";
        $categorias = $this->db->query($sql);
        
        return $categorias;
    }
    
    function getOne(){
        $sql = "SELECT * FROM categorias WHERE id={$this->id}";
        $categoria = $this->db->query($sql);
        
        return $categoria->fetch_object();
    }
    
    
    function save(){
        $result = false;
        
        $sql="INSERT INTO categorias VALUES(null,'$this->nombre')";
        $save = $this->db->query($sql);
        
        if($save){
            $result = true;
            return $result;
        }else{
            return $result;
        }
    }

}