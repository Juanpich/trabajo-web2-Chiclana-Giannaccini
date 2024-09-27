<?php
require_once './app/model/products.model.php';
require_once './app/view/products.view.php';
require_once './app/view/orders.view.php';

class ProductsController
{
    private $view;
    private $model;

    public function __construct() {
        $this->view = new ProductsView();
        $this->model = new ProductsModel();
    }

    public function showCategories(){
        $products = $this->model->getProducts();
        $this->view->showProducts($products);
    }

    public function viewItemByCategories($id_product){
        $productExists = $this->model->checkIDExists($id_product);
        $ordersError = new OrdersView();
        if (!$productExists) {
            $error = "Esta categoría no existe";
            $redir = 'categorias';
            $ordersError->showError($error, $redir);
        } else {
            $items = $this->model->getOrdersByProductId($id_product);
            
            if (count($items) === 0) {
                $error = "No hay órdenes para este producto";
                $redir = "categorias";
                $ordersError->showError($error, $redir);
            } else {
                $this->view->showOrdersById($items);
            }
        }
    }
}
