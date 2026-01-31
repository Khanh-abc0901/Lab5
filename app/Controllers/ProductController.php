<?php
// app/Controllers/ProductController.php
namespace App\Controllers;

use App\Models\Product;

class ProductController {
    
    // Hiển thị danh sách sản phẩm
    public function index() {
        $productModel = new Product();
        $products = $productModel->all();
        
        require 'views/product_list.php';
    }

    // Hiển thị form thêm mới (phần 3)
    public function create() {
        require 'views/product_add.php';
    }

    // Xử lý thêm mới (phần 4)
    public function store() {
        // Kiểm tra dữ liệu
        if (empty($_POST['name']) || empty($_POST['price'])) {
            $_SESSION['error'] = "Vui lòng nhập đầy đủ thông tin!";
            header('Location: index.php?page=product-create');
            exit;
        }

        $data = [
            'name' => $_POST['name'],
            'description' => $_POST['description'] ?? '',
            'price' => $_POST['price'],
            'image_url' => $_POST['image_url'] ?? 'https://via.placeholder.com/300',
            'category' => $_POST['category'] ?? 'Khác'
        ];

        $productModel = new Product();
        if ($productModel->insert($data)) {
            $_SESSION['success'] = "Thêm sản phẩm thành công!";
            header('Location: index.php?page=product-list');
        } else {
            $_SESSION['error'] = "Thêm sản phẩm thất bại!";
            header('Location: index.php?page=product-create');
        }
        exit;
    }

    // Hiển thị chi tiết sản phẩm (phần 2)
    public function show($id) {
        $productModel = new Product();
        $product = $productModel->find($id);
        
        if (!$product) {
            die("Sản phẩm không tồn tại!");
        }
        
        require 'views/product_detail.php';
    }

    // Hiển thị form chỉnh sửa (phần 5)
    public function edit($id) {
        $productModel = new Product();
        $product = $productModel->find($id);
        
        if (!$product) {
            die("Sản phẩm không tồn tại!");
        }
        
        require 'views/product_edit.php';
    }

    // Xử lý cập nhật (phần 5)
    public function update($id) {
        // Kiểm tra dữ liệu
        if (empty($_POST['name']) || empty($_POST['price'])) {
            $_SESSION['error'] = "Vui lòng nhập đầy đủ thông tin!";
            header("Location: index.php?page=product-edit&id=$id");
            exit;
        }

        $data = [
            'name' => $_POST['name'],
            'description' => $_POST['description'] ?? '',
            'price' => $_POST['price'],
            'image_url' => $_POST['image_url'] ?? 'https://via.placeholder.com/300',
            'category' => $_POST['category'] ?? 'Khác'
        ];

        $productModel = new Product();
        if ($productModel->update($id, $data)) {
            $_SESSION['success'] = "Cập nhật sản phẩm thành công!";
            header('Location: index.php?page=product-list');
        } else {
            $_SESSION['error'] = "Cập nhật sản phẩm thất bại!";
            header("Location: index.php?page=product-edit&id=$id");
        }
        exit;
    }

    // Xóa sản phẩm (phần 2)
    public function destroy($id) {
        $productModel = new Product();
        if ($productModel->delete($id)) {
            $_SESSION['success'] = "Xóa sản phẩm thành công!";
        } else {
            $_SESSION['error'] = "Xóa sản phẩm thất bại!";
        }
        header('Location: index.php?page=product-list');
        exit;
    }

    // Tìm kiếm sản phẩm (bonus)
    public function search() {
        $keyword = $_GET['keyword'] ?? '';
        $productModel = new Product();
        $products = $productModel->search($keyword);
        
        require 'views/product_list.php';
    }
}