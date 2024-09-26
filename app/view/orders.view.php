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
    public function error($error){
        echo "Error!!!; $error";
    }

    /*public function showError($error,$redirigir){
        echo ($error);?>
        <a href="<?php echo $redirigir; ?>">VOLVER</a>
        <?php
        return;
}*/
}

