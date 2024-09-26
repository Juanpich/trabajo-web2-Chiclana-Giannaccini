<?php
class ProductsView{
    
    public function __construct(){}
    
    public function showProducts($products){
        ?>
        <h2>Listado de Productos - Categoría</h2>
        <ul>
            <?php foreach ($products as $product) { ?>
               <div>
                <li>
                    <a href="itemCategoria/<?= $product->id ?>"> <?= $product->name ?> </a>
                </li>
                </div>
            <?php } ?>
        </ul>
    <?php
    }

    public function showOrdersById($items) {
        ?>
            <h2>Órdenes para el Producto </h2>
                <ul>
                    <?php foreach ($items as $order) { ?>
                        <li>
                            <div>
                                <ul>ID Pedido: <?= $order->id ?> </ul>
                                <ul>Cantidad: <?= $order->cant_products ?> </ul>
                                <ul>Total: $<?= $order->total ?> </ul>
                               <ul> Fecha: <?= $order->date ?></ul>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            
            <?php  
    }
}