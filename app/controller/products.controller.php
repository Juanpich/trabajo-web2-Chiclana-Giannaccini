<?php
require_once './app/model/products.model.php';
require_once './app/view/products.view.php';
require_once './app/controller/error.controller.php';

class ProductsController
{
    private $view;
    private $model;

    public function __construct()
    {
        $this->view = new ProductsView();
        $this->model = new ProductsModel();
    }

    public function showCategories()
    {
        $products = $this->model->getProducts();
        $this->view->showProducts($products);
    }

    public function viewItemByCategories($id_product)
    {
        $productExists = $this->model->checkIDExists($id_product);
        $ordersError = new ErrorControler();
        if (!$productExists) {
            $error = "Esta categoría no existe";
            $redir = 'categorias';
            $ordersError->showError($error, $redir);
        } else {
            $orders = $this->model->getOrdersByProductId($id_product);
            $product = $this->model->getProduct($id_product);
            if (count($orders) === 0) {
                $error = "No hay órdenes para este producto";
                $redir = "categorias";
                $ordersError->showError($error, $redir);
            } else {
                $this->view->showOrdersById($orders, $product);
            }
        }
    }
    //ABM
    public function ProductsABM()
    {
        $products = $this->model->getProducts();
        $this->view->seeABMProducts($products);
    }

    public function addProduct(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { //si se envia el formulario se procesa
            if (
                !isset($_POST['name']) || empty($_POST['name']) ||
                !isset($_POST['price']) || empty($_POST['price']) ||
                !isset($_POST['description']) || empty($_POST['description'])
            ) {
                $error = "<h1>Error: completar todos los campos</h1>";
                $redir = "controlarProducto";
                $controllerError = new ErrorControler();
                $controllerError->showError($error, $redir);
            } else {
                $name = $_POST['name'];
                $price = $_POST['price'];
                $description = $_POST['description'];

                $id = $this->model->insertProduct($name, $price, $description);
                header("Location: " . BASE_URL . "controlarProductos");
                exit();
            }
        } else {
            $this->view->addProduct();//si no se envió el formulario se muestra
        }
    }
    /*
    public function showSelectABMProducts() {
        // Verifica si se ha enviado la operación
        if (!isset($_POST['operation']) || empty($_POST['operation'])) {
            $error = "Seleccione una opción";
            $redir = "controlarProducto";
            $controller = new ErrorControler();
            $controller->showError($error, $redir);
            return;
        }
$action = $_POST['operation'];
    switch ($action) {
        case 'nuevoProducto':
            $this->addProduct(); 
            break;

        case 'modificarProducto':
            $this->updateProduct(); 
            break;

        case 'delete':
            $this->eliminarProduct(); 
            break;

        default:
            $error = "Operación no válida";
            $redir = "controlarProducto";
            $controller = new ErrorControler();
            $controller->showError($error, $redir);
            break;    
    }  
    }*/
}
