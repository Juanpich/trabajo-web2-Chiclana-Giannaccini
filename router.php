<?php
require_once './app/controller/products.controller.php';
require_once './app/controller/orders.controller.php';

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
        $controller=new OrdersControlers;//cambiar a controller
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

    default:
    //ACA SE PUEDE AGREGAR FUNCION error:
    /*default:
        $controler = new OrdersController();
        $controler->showError();
        break;*/
        echo "pag no encontrada";
        break;
}