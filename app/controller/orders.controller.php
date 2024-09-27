<?php
require_once './app/model/orders.model.php';
require_once './app/view/orders.view.php';
require_once './app/model/products.model.php';
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
            $this->view->showError($error,$redir);
        }
    }
}