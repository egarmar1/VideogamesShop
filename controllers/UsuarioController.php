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



            $save = CheckRegister($name, $lastname, $email);


            if ($save && $name && $lastname && $email) {

                $new_user = new Usuario();
                $new_user->setNombre($name);
                $new_user->setEmail($email);
                $new_user->setApellidos($lastname);
                $new_user->setPassword($password);

                if (!$_FILES['image']['error'] == 4) {
                    $filename = $file['name'];
                    $mimetype = $file['type'];
                    $fileTemp = $file['tmp_name'];
                } else {
                    $filename = 'default_picture.png';
                    $mimetype = 'image/png';
                    $fileTemp = 'C:\wamp64\www\VideogamesShop\uploads\images\default_picture.png';
                }

                if ($mimetype == 'image/png' || $mimetype == 'image/jpeg' || $mimetype == 'image/jpg' || $mimetype == 'image/gif') {

                    if (!is_dir('uploads/images')) {
                        mkdir('uploads/images', 0777, true);
                    }
                    move_uploaded_file($fileTemp, 'uploads/images/' . $filename);
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

                if ($user->rol == 'admin') {
                    $_SESSION['admin'] = true;
                }
            } else {
                $_SESSION['error'] = 'Login incorrecto';
            }
        }
        header("Location:" . base_url);
    }

    public function update() {
        Utils::isIdentified();

        if (isset($_POST)) {

            $name = isset($_POST['name']) ? $_POST['name'] : false;
            $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $file = isset($_FILES['image']) ? $_FILES['image'] : false;

        
            if (!$_FILES['image']['error'] == 4) {
                $filename = $file['name'];
                $mimetype = $file['type'];
                $fileTemp = $file['tmp_name'];
                $noChangeImage = false;
 
            } else {
                $noChangeImage = true;
                $filename = 'noChange';
                $mimetype = 'image/png';
                $fileTemp = 'C:\wamp64\www\VideogamesShop\uploads\images\default_picture.png';
                
            }

            $save = CheckRegister($name, $lastname, $email);

            
            if ($save && $name && $lastname && $email) {

                $id = $_SESSION['user']->id;
                $new_user = new Usuario();
                $new_user->setId($id);
                $new_user->setNombre($name);
                $new_user->setEmail($email);
                $new_user->setApellidos($lastname);
                $new_user->setPassword($password);

                
                
                if ($mimetype == 'image/png' || $mimetype == 'image/jpeg' || $mimetype == 'image/jpg' || $mimetype == 'image/gif') {
                    
                    if (!is_dir('uploads/images')) {
                        mkdir('uploads/images', 0777, true);
                    }
                    move_uploaded_file($fileTemp, 'uploads/images/' . $filename);
                    $new_user->setImagen($filename);
                    $updated = $new_user->update($noChangeImage);


                    if ($updated) {
                        $_SESSION['update'] = 'completed';
                    } elseif (!isset($_SESSION['register'])) {
                        $_SESSION['update'] = 'update not completed';
                    }
                } else {
                    $_SESSION['update'] = 'Invalid type of image';
                }
            } else {

                $_SESSION['update'] = 'Error in the form';
            }
        } else {

            $_SESSION['update'] = 'Error in the form';
        }
        header("Location:" . base_url . "usuario/info");
    }

    public function info() {
        Utils::isIdentified();
        $id = $_SESSION['user']->id;

        $user = new Usuario();
        $user->setId($id);
        $user = $user->getUser();

        require_once 'views/usuario/info.php';
    }

    public function close() {
        if (isset($_SESSION['user'])) {
            Utils::deleteSession('user');
            Utils::deleteSession('admin');
            Utils::deleteSession("carrito");
        }
        header("Location:" . base_url);
    }

}
