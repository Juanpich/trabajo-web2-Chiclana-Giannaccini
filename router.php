<?php
require_once './app/controller/products.controller.php';
require_once './app/controller/orders.controller.php';
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
    default:
        echo "pag no encontrada";
        break;
}