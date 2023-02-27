<?php

class Usuario {

    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;
    private $imagen;
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

    function getApellidos() {
        return $this->apellidos;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getRol() {
        return $this->rol;
    }

    function getImagen() {
        return $this->imagen;
    }

    function getDb() {
        return $this->db;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setApellidos($apellidos) {
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }

    function setEmail($email) {
        $this->email = $this->db->real_escape_string($email);
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

    function setImagen($imagen) {
        $this->imagen = $this->db->real_escape_string($imagen);
    }

    function setDb($db) {
        $this->db = $db;
    }
    
    function getUser(){
        $sql = "SELECT * FROM usuarios where id={$this->id}";
        
        $user = $this->db->query($sql);

        return $user->fetch_object();
    }

    function save() {
        $result = false;

        $sql = "SELECT COUNT(*) as count FROM usuarios WHERE email='$this->email'";
        $exists = $this->db->query($sql); //If the email already exists then cant be created

        if ($exists->fetch_object()->count > 0) {

            $_SESSION['register'] = 'Email already exists';
            return $result;
        }
   

        $hashed_password = password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT,['cost' => 4]);
        
        $sql = "INSERT INTO usuarios VALUES(null,'$this->nombre','$this->apellidos','$this->email','$hashed_password','user','$this->imagen')";
        $save = $this->db->query($sql);



        if ($save) {
            $result = true;
            return $result;
        } else {
            return $result;
        }
    }
    

    function login(){
        $result = false;
        
        $sql = "SELECT * FROM usuarios where email='$this->email'";
        $login = $this->db->query($sql);
        
        if($login && $login->num_rows == 1){
            $usuario = $login->fetch_object();
            
            $verified = password_verify( $this->password, $usuario->password);
            
            if($verified){
                $result = $usuario;
                return $result;
            }else{
                return $result;
            }
            
        }
    }
}
