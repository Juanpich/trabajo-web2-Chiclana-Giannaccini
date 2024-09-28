<?php
require_once './app/model/orders.model.php';
require_once './app/view/orders.view.php';
require_once './app/model/products.model.php';
require_once './app/controller/error.controller.php';
class OrdersControlers{
    private $view;
    private $model;
    public function __construct(){
        $this->view = new OrdersView();
        $this->model = new OrdersModel();
    }
    public function showHome(){
        $orders = $this->model->getOrders();
        $this->view->showOrders($orders);
    }
    public function viewOrder($id){
        if($this->model->checkIDExists($id)){
            $order = $this->model->getOrder($id);
            $id_product = $order->id_product;
            $controletProduct = new ProductsModel();
            if($controletProduct->checkIDExists($id_product)){
                $product = $controletProduct->getProduct($id_product);
                if($product != null){
                    $this->view->showOrder($order, $product);
                }
            }
            
        }else{
            $error="No existe la orden y/o producto";
            $redir="home";
            $controllerError = new ErrorControler();
            $controllerError->showError($error,$redir);
        }
    }
    public function OrdersABM(){
        $elements = $this->model->getOrders();
        $this->view->seeABMOrders($elements);
    }
    public function showSelectABM(){
        if(!isset($_POST['operation']) || empty($_POST['operation'])){
            $error = "Seleccione una opcion";
            $redir = "controlarOrdenes";
            $controller = new ErrorControler();
            $controller->showError($error, $redir);
            return;
        }
        $action = $_POST['operation'];
        switch($action){
            case 'create':

                break;
            case 'update':  

                break;
            case 'delete':

                break;
            default:
            break;      
        }

    }
}