<?php
// app/Controllers/ProductController.php
namespace App\Controllers;

use App\Models\Product;

class ProductController {
    public function index() {
        // Lấy dữ liệu từ Model
        $productModel = new Product();
        $products = $productModel->getAllProducts();
        
        // Truyền dữ liệu ra View
        require 'views/product_list.php';
    }
}