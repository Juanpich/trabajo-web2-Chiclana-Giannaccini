<?php
class ProductsView{
    
    public function __construct(){}
    
    public function showProducts($products){
        require_once './templates/listProducts.phtml';
    }

    public function showOrdersById($items) {
        require_once './templates/viewItems.phtml';
       
    }
}