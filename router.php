<?php
require_once './app/controller/products.controller.php';
require_once './app/controller/orders.controller.php';
require_once './app/controller/error.controller.php';

//faltaba agregar
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

if(isset($_GET['action']) && !empty($_GET['action'])){
    $action = $_GET['action'];
}else{
    $action = 'home';
}
$params = explode('/', $action);

switch($params[0]){
    case 'home':
        $controller=new OrdersControlers;
        $controller->showHome();
        break;  
    case 'verOrden':
        $controller=new OrdersControlers;
        $controller->viewOrder($params[1]);
        break;

    case 'categorias':
        $controller = new ProductsController();
        $controller->showCategories();
        break;

    case 'itemCategoria':
        $controller = new ProductsController();
        $controller->viewItemByCategories($params[1]);
        break;    
    case 'controlarOrdenes':
        $controller = new OrdersControlers();
        $controller-> OrdersABM();
        break;
    case 'ABMOrdenes':
        $controler = new OrdersControlers();
        $controler->showSelectABM();    
    default:
        $error="404 page not found";
        $redir="home";
        $controler = new ErrorControler();
        $controler->showError($error,$redir);
        break;
}