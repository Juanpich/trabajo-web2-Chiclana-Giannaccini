<?php
require_once './app/model/auth.model.php';
require_once './app/view/auth.view.php';
class AuthController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin() {
        return $this->view->showLogin();
    }

    public function login() {
        
        if (!isset($_POST['user_name']) || empty($_POST['user_name'])) {
            return $this->view->showLogin('Falta completar el nombre de usuario');
        }
        if (!isset($_POST['password']) || empty($_POST['password'])) {
            return $this->view->showLogin('Falta completar la contraseña');
        }
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        $userFromDB = $this->model->getUserByUserNsme($user_name);

        // password: 46902119
        // $userFromDB->password: $2y$10$WgfdVcd3ntADRG93D0Byduz5gRpdw7/QzPkdKG.GAbJqVqTXlMgUO
        if($userFromDB && password_verify($password, $userFromDB->password)){
            session_start();
            $_SESSION['ID_USER'] = $userFromDB->id;
            $_SESSION['NAME_USER'] = $userFromDB->user_name;
            header('Location: ' . BASE_URL);
        } else {
            //si el usuario no se encuentra o la clave no coincide lanza el error
            return $this->view->showLogin('La clave o contraseña no cionciden');
        }
    }

    public function logout()
    {
        session_start(); // Va a buscar la cookie
        session_destroy(); // Borra la cookie que se buscó
        header("Location: " . BASE_URL . "home");
    }
}