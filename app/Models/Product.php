<?php
// app/Models/Product.php
namespace App\Models;

class Product extends BaseModel {
    protected $table = 'products';

    // Lấy tất cả sản phẩm
    public function all() {
        $sql = "SELECT * FROM {$this->table} ORDER BY id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Lấy sản phẩm theo ID
    public function find($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Thêm sản phẩm (sẽ dùng ở phần 4)
    public function insert($data) {
        $sql = "INSERT INTO {$this->table} (name, description, price, image_url, category) 
                VALUES (:name, :description, :price, :image_url, :category)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
    }

    // Cập nhật sản phẩm (sẽ dùng ở phần 5)
    public function update($id, $data) {
        $sql = "UPDATE {$this->table} 
                SET name = :name, description = :description, price = :price, 
                    image_url = :image_url, category = :category 
                WHERE id = :id";
        $data['id'] = $id;
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
    }

    // Xóa sản phẩm (sẽ dùng ở phần 2)
    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

    // Tìm kiếm sản phẩm (bonus)
    public function search($keyword) {
        $sql = "SELECT * FROM {$this->table} 
                WHERE name LIKE :keyword OR description LIKE :keyword 
                ORDER BY id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':keyword' => "%$keyword%"]);
        return $stmt->fetchAll();
    }
}