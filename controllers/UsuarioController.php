<?php

require_once 'models/Usuario.php';

class UsuarioController {

    public function index() {
        echo "Controller usuario accion index";
    }

    public function registro() {

        require_once 'views/usuario/registro.php';
    }

    public function save() {

        if (isset($_POST)) {

            $name = isset($_POST['name']) ? $_POST['name'] : false;
            $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $file = isset($_FILES['image']) ? $_FILES['image'] : false;


            $save = CheckRegister($name, $lastname, $email, $password);

            if ($save && $name && $lastname && $password && $email) {

                $new_user = new Usuario();
                $new_user->setNombre($name);
                $new_user->setEmail($email);
                $new_user->setApellidos($lastname);
                $new_user->setPassword($password);


                $filename = $file['name'];
                $mimetype = $file['type'];

                if ($mimetype == 'image/png' || $mimetype == 'image/jpeg' || $mimetype == 'image/jpg' || $mimetype == 'image/gif') {

                    if (!is_dir('uploads/images')) {
                        mkdir('uploads/images', 0777, true);
                    }
                    move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
                    $new_user->setImagen($filename);
                    $saved = $new_user->save();

                    if ($saved) {
                        $_SESSION['register'] = 'completed';
                    } elseif (!isset($_SESSION['register'])) {
                        $_SESSION['register'] = 'Register not completed';
                    }
                } else {
                    $_SESSION['register'] = 'Invalid type of image';
                }
            } else {

                $_SESSION['register'] = 'Error in the form';
            }
        } else {

            $_SESSION['register'] = 'Error in the form';
        }
        header("Location:" . base_url . "usuario/registro");
    }

    public function login() {
        if (isset($_POST)) {

            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            $user = $usuario->login();

            if ($user && is_object($user)) {
                $_SESSION['user'] = $user;
                
                if($user->rol=='admin'){
                    $_SESSION['admin'] = true;
                }
            }else{
                $_SESSION['error'] = 'Login incorrecto';
            }

        }
        header("Location:".base_url);
    }
    
    public function close(){
        if(isset($_SESSION['user'])){
            Utils::deleteSession('user');
            Utils::deleteSession('admin');
            Utils::deleteSession("carrito");
        }
        header("Location:".base_url);
    }

}
