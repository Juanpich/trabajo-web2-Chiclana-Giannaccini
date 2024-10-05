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
        
        if (!isset($_POST['userName']) || empty($_POST['userName'])) {
            return $this->view->showLogin('Falta completar el nombre de usuario');
        }
        if (!isset($_POST['password']) || empty($_POST['password'])) {
            return $this->view->showLogin('Falta completar la contraseña');
        }
        $userName = $_POST['userName'];
        $password = $_POST['password'];

        $userFromDB = $this->model->getUserByUserNsme($userName);

        // password: 46902119
        // $userFromDB->password: $2y$10$WgfdVcd3ntADRG93D0Byduz5gRpdw7/QzPkdKG.GAbJqVqTXlMgUO
        if($userFromDB && password_verify($password, $userFromDB->password)){
            session_start();
            $_SESSION['ID_USER'] = $userFromDB->id;
            $_SESSION['NAME_USER'] = $userFromDB->userName;
            header('Location: ' . BASE_URL);
        } else {
            //si el usuario no se encuentra o la clave no coincide lanza el error
            return $this->view->showLogin('La clave o contraseña no cionciden');
        }
    }
}