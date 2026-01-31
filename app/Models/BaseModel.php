<?php
// app/Models/BaseModel.php
namespace App\Models;

class BaseModel {
    protected $pdo;
    protected $table;

    public function __construct() {
        try {
            $config = require __DIR__ . '/../../config/database.php';
            
            $dsn = "mysql:host={$config['host']};dbname={$config['database']};charset={$config['charset']}";
            $this->pdo = new \PDO($dsn, $config['username'], $config['password']);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            
        } catch (\PDOException $e) {
            die("Lỗi kết nối database: " . $e->getMessage());
        }
    }
}