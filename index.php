<?php
// index.php - Router hoàn chỉnh cho MVC CRUD
session_start();
require 'vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\ProductController;

// Khởi tạo controllers
$homeController = new HomeController();
$productController = new ProductController();

// Xác định page từ URL
$page = $_GET['page'] ?? 'home';

// Router chính
switch ($page) {
    // Trang chủ
    case 'home':
        $homeController->index();
        break;
    
    // ========== PRODUCT CRUD ==========
    
    // Danh sách sản phẩm
    case 'product-list':
    case 'products':
        $productController->index();
        break;
    
    // Thêm mới - Form
    case 'product-create':
    case 'product-add':
        $productController->create();
        break;
    
    // Thêm mới - Xử lý
    case 'product-store':
        $productController->store();
        break;
    
    // Chi tiết sản phẩm
    case 'product-detail':
    case 'product-show':
        $id = $_GET['id'] ?? 0;
        if ($id) {
            $productController->show($id);
        } else {
            header('Location: index.php?page=product-list');
        }
        break;
    
    // Sửa sản phẩm - Form
    case 'product-edit':
        $id = $_GET['id'] ?? 0;
        if ($id) {
            $productController->edit($id);
        } else {
            header('Location: index.php?page=product-list');
        }
        break;
    
    // Sửa sản phẩm - Xử lý
    case 'product-update':
        $id = $_GET['id'] ?? 0;
        if ($id) {
            $productController->update($id);
        } else {
            header('Location: index.php?page=product-list');
        }
        break;
    
    // Xóa sản phẩm
    case 'product-delete':
        $id = $_GET['id'] ?? 0;
        if ($id) {
            $productController->destroy($id);
        } else {
            header('Location: index.php?page=product-list');
        }
        break;
    
    // Tìm kiếm
    case 'product-search':
        $productController->search();
        break;
    
    // ========== TRANG LỖI ==========
    
    default:
        // Hiển thị trang 404
        http_response_code(404);
        ?>
        <!DOCTYPE html>
        <html lang="vi">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>404 - Không tìm thấy trang</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
            <style>
                body {
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                    min-height: 100vh;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
                .error-container {
                    text-align: center;
                    color: white;
                    max-width: 600px;
                    padding: 40px;
                    background: rgba(255, 255, 255, 0.1);
                    border-radius: 20px;
                    backdrop-filter: blur(10px);
                }
                .error-code {
                    font-size: 120px;
                    font-weight: bold;
                    color: #ff6b6b;
                }
                .btn-home {
                    background: white;
                    color: #667eea;
                    padding: 12px 30px;
                    border-radius: 50px;
                    text-decoration: none;
                    font-weight: bold;
                    display: inline-block;
                    margin-top: 20px;
                    transition: transform 0.3s;
                }
                .btn-home:hover {
                    transform: translateY(-3px);
                    color: #764ba2;
                }
            </style>
        </head>
        <body>
            <div class="error-container">
                <div class="error-code">404</div>
                <h1 class="mb-3">Trang không tìm thấy</h1>
                <p class="lead mb-4">Trang bạn đang tìm kiếm không tồn tại hoặc đã bị di chuyển.</p>
                
                <div class="row mt-4">
                    <div class="col-md-6 mb-2">
                        <a href="index.php?page=home" class="btn-home">
                            <i class="fas fa-home"></i> Trang chủ
                        </a>
                    </div>
                    <div class="col-md-6 mb-2">
                        <a href="index.php?page=product-list" class="btn-home">
                            <i class="fas fa-boxes"></i> Danh sách sản phẩm
                        </a>
                    </div>
                </div>
                
                <div class="mt-4">
                    <small class="text-white-50">URL được yêu cầu: 
                        <code><?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?></code>
                    </small>
                </div>
            </div>
            
            <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
        </body>
        </html>
        <?php
        break;
}