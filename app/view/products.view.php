<?php
class ProductsView
{

    public function __construct() {}

    public function showProducts($products)
    {
        require_once './templates/listProducts.phtml';
    }

    public function showOrdersById($orders, $product)
    {
        require_once './templates/viewItems.phtml';
    }

    public function seeABMProducts($products)
    {
        require_once './templates/CRUDproduct.phtml';
    }

    public function addProduct()
    {
        require_once './templates/formCRUDproduct.phtml';
    }

    public function showProductForm($product = null, $isEdit = false)
    {
        require_once './templates/formCRUDproduct.phtml';
    }

}
