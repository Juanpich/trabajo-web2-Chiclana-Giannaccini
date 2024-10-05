<?php
require_once './app/controller/products.controller.php';
require_once './app/controller/orders.controller.php';
require_once './app/controller/error.controller.php';
require_once './app/controller/auth.controller.php';
require_once './app/middleware/session.auth.middlware.php';
require_once './app/middleware/verify.auth.middleware.php';
require_once './response.php';


//faltaba agregar
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

if (isset($_GET['action']) && !empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}
$res = new Response();
$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        sessionAuthMiddleware($res);
        $controller = new OrdersControlers($res);
        $controller->showHome();
        break;
    case 'iniciarSeccion':
        $controller = new AuthController();
        $controller->showLogin();
        break;    
    case 'verificarLogin':
        $controller = new AuthController();
        $controller->login();
            break;
    case 'verOrden':
        sessionAuthMiddleware($res);
        $controller = new OrdersControlers($res);
        $controller->viewOrder($params[1]);
        break;
    case 'categorias':
        sessionAuthMiddleware($res);
        $controller = new ProductsController();
        $controller->showCategories();
        break;
    case 'itemCategoria':
        sessionAuthMiddleware($res);
        $controller = new ProductsController();
        $controller->viewItemByCategories($params[1]);
        break;
    case 'controlarOrdenes':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new OrdersControlers($res);
        $controller->OrdersABM();
        break;
    case 'eliminarOrden':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new OrdersControlers($res);
        $controller->deleteOrder($params[1]);
        break; 
    case 'formularioModificarOrden':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new OrdersControlers($res);
        $controller->showOrderForm($params[1]);
        break;
    case 'modificarOrden':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new OrdersControlers($res);
        $controller->updateOrder($params[1]);
        break;
    case 'formularioNuevaOrden':  
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new OrdersControlers($res);
        $controller->showOrderForm();
        break;
    case 'crearOrden': 
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new OrdersControlers($res);
        $controller->createOrder();
        break;   
    case 'controlarProductos':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new ProductsController();
        $controller->productsABM();
        break;
    case 'nuevoProducto':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controler = new ProductsController();
        $controler->addProduct();
        break;
    case 'eliminarProducto':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controler=new ProductsController();
        $controler->deleteProduct($params[1]);
        break;
    case 'modificarProducto':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controler=new ProductsController();
        $controler->updateProduct($params[1]);
             break; 
    default:
        $error = "404 page not found";
        $redir = "home";
        $controler = new ErrorControler();
        $controler->showError($error, $redir);
        break;
}
