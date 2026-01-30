<?php
// app/Models/Product.php
namespace App\Models;

class Product extends BaseModel {
    protected $table = 'products'; // Thay bằng tên bảng thực tế

    public function getAllProducts() {
        return $this->all();
    }
    
    // Thêm các method khác nếu cần
    public function getFeaturedProducts($limit = 5) {
        $sql = "SELECT * FROM {$this->table} LIMIT :limit";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}