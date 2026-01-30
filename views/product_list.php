<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .header {
            text-align: center;
            color: white;
            margin-bottom: 30px;
        }
        
        .back-button {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            background: #2196F3;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        
        .back-button:hover {
            background: #1976D2;
        }
        
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        
        .product-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
        
        .product-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(45deg, #6a11cb 0%, #2575fc 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 48px;
        }
        
        .product-info {
            padding: 20px;
        }
        
        .product-title {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }
        
        .product-price {
            color: #e91e63;
            font-size: 1.3em;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .product-description {
            color: #666;
            line-height: 1.5;
        }
        
        .no-products {
            background: white;
            padding: 40px;
            text-align: center;
            border-radius: 10px;
            grid-column: 1 / -1;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php?page=home" class="back-button">← Quay lại trang chủ</a>
        
        <div class="header">
            <h1>🛒 Danh sách sản phẩm</h1>
            <p>Tổng số sản phẩm: <?php echo count($products); ?></p>
        </div>
        
        <div class="products-grid">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <div class="product-image">
                            📦
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">
                                <?php echo htmlspecialchars($product['name'] ?? 'Sản phẩm không tên'); ?>
                            </h3>
                            <div class="product-price">
                                <?php echo number_format($product['price'] ?? 0, 0, ',', '.') . ' ₫'; ?>
                            </div>
                            <p class="product-description">
                                <?php echo htmlspecialchars($product['description'] ?? 'Không có mô tả'); ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-products">
                    <h2>📭 Không có sản phẩm nào</h2>
                    <p>Vui lòng kiểm tra kết nối database hoặc thêm sản phẩm mới.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>