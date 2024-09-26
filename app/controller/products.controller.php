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
        $items = $this->model->getOrdersByProductId($id_product);
        if (!$items) {
            echo "Esta categoria no existe"; //sacarlo a una funcion errores
            //$error= "<h1> Esta categoria no existe </h1>";
            //$redirigir='categorias';
            //return $this->view->showError($error,$redirigir);
        } elseif (count($items) === 0) {
            echo "No hay ordenes para este producto";
        } else {
            $this->view->showOrdersById($items);
        }
    }
}
