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

    public function seeABMOrders($elements){
        $items = "orden";
        require_once './templates/CRUD.phtml';
    }
}

