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

    public function showError($error,$redir){
        require_once './templates/error.phtml';
    }
}

