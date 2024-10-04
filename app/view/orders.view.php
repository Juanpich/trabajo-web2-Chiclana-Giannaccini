<?php 
class OrdersView{
    public function __construct(){
    }
    public function showOrders($orders){
        require_once './templates/listOrders.phtml';
    }

    public function showOrder($order, $product){
        require_once './templates/viewOrder.phtml';
    }

    public function seeABMOrders($ordens,$result, $success){
        require_once './templates/CRUD.phtml';
        
    }
    public function seeForm($order, $products){
        require_once './templates/formCRUDorder.phtml';

    }
}

