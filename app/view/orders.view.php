<?php 
class OrdersView{
    public function __construct(){
    }
    public function showOrders($orders){
        echo "<h1>Ordenes</h1>
        <ul>";
        foreach($orders as $order){
            echo "<li> Orden n° $order->id; precio total $order->total <a href='verOrden/$order->id'>Ver Completo</a></li>";
        }
        echo "</ul>";
    }
    public function showOrder($order, $product){
        echo "<ul>
        <li>Orden n° $order->id</li>
        <li>Fecha $order->date</li>
        <li>Total: $order->total</li>
        <li>Cantidad: $order->cant_products</li>
        <li>Producto: $product->name</li>
        </ul>";
    }
    public function error($error){
        echo "Error!!!; $error";
    }
}