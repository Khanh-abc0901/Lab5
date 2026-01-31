<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .product-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
        }
        .header-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .price {
            font-weight: bold;
            color: #dc3545;
        }
        .action-buttons .btn {
            margin: 0 2px;
            padding: 3px 8px;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <!-- Header với tiêu đề và nút thêm mới -->
        <div class="header-actions">
            <h1 class="h3 mb-0">📦 Quản lý sản phẩm</h1>
            <div>
                <a href="index.php?page=product-create" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Thêm sản phẩm
                </a>
                <a href="index.php?page=home" class="btn btn-secondary">
                    <i class="fas fa-home"></i> Trang chủ
                </a>
            </div>
        </div>

        <!-- Thông báo -->
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Form tìm kiếm -->
        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" action="index.php" class="row g-3">
                    <input type="hidden" name="page" value="product-search">
                    <div class="col-md-10">
                        <input type="text" name="keyword" class="form-control" 
                               placeholder="Tìm kiếm sản phẩm theo tên hoặc mô tả..."
                               value="<?php echo $_GET['keyword'] ?? ''; ?>">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-info w-100">
                            <i class="fas fa-search"></i> Tìm kiếm
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Bảng sản phẩm -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th width="5%">ID</th>
                                <th width="20%">Tên sản phẩm</th>
                                <th width="15%">Giá</th>
                                <th width="15%">Hình ảnh</th>
                                <th width="15%">Danh mục</th>
                                <th width="30%">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($products)): ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        <i class="fas fa-box-open fa-2x mb-3"></i><br>
                                        Không có sản phẩm nào
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($products as $product): ?>
                                <tr>
                                    <td><?php echo $product['id']; ?></td>
                                    <td>
                                        <strong><?php echo htmlspecialchars($product['name']); ?></strong><br>
                                        <small class="text-muted"><?php echo substr($product['description'], 0, 50) . '...'; ?></small>
                                    </td>
                                    <td class="price"><?php echo number_format($product['price'], 0, ',', '.'); ?> ₫</td>
                                    <td>
                                        <img src="<?php echo $product['image_url']; ?>" 
                                             alt="<?php echo $product['name']; ?>" 
                                             class="product-img">
                                    </td>
                                    <td>
                                        <span class="badge bg-info"><?php echo $product['category']; ?></span>
                                    </td>
                                    <td class="action-buttons">
                                        <a href="index.php?page=product-detail&id=<?php echo $product['id']; ?>" 
                                           class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i> Xem
                                        </a>
                                        <a href="index.php?page=product-edit&id=<?php echo $product['id']; ?>" 
                                           class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i> Sửa
                                        </a>
                                        <a href="index.php?page=product-delete&id=<?php echo $product['id']; ?>" 
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                                            <i class="fas fa-trash"></i> Xóa
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Thống kê -->
        <div class="mt-3 text-end">
            <small class="text-muted">
                Tổng số sản phẩm: <strong><?php echo count($products); ?></strong>
            </small>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Xác nhận xóa
        function confirmDelete() {
            return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');
        }
    </script>
</body>
</html>