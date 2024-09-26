<?php
    require_once './app/model/products.model.php';
    require_once './app/view/products.view.php';
    class ProductsController{
        private $view;
        private $model;
        public function __construct(){
            $this->view = new ProductsView();
            $this->model = new ProductsModel();
        }
        public function viewProduct($id){
        }
       



    }