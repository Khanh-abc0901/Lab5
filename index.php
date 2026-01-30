<?php
// index.php - Final version
require 'vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\ProductController;

// Router cải tiến
$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;
        
    case 'products':
        $controller = new ProductController();
        $controller->index();
        break;
        
    default:
        echo "<h1>404 - Trang không tìm thấy</h1>";
        echo "<p>Vui lòng kiểm tra lại đường dẫn.</p>";
        break;
}