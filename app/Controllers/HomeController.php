<?php
// app/Controllers/HomeController.php
namespace App\Controllers;

use App\Models\Student;

class HomeController {
    public function index() {
        // 1. Chuẩn bị dữ liệu từ Model
        $message = "Chào mừng đến với MVC! Đây là bài lab của tôi.";
        $studentInfo = (new Student())->getInfo();

        // 2. Gọi View và truyền dữ liệu
        require 'views/home.php';
    }
}