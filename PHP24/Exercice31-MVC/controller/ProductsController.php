<?php

require_once 'Products.php';

class ProductsController {
    private $model;

    public function __construct($db) {
        $this->model = new Products($db);
    }

    public function list() {
        $products = $this->model->getAllProducts();
        include 'view/ProductsList.php';
    }
}
?>
