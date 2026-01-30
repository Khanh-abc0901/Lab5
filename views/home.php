<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ MVC</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }
        
        .container {
            max-width: 800px;
            width: 100%;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            padding: 30px;
            margin-top: 20px;
        }
        
        h1 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .message-box {
            background: #e3f2fd;
            border-left: 4px solid #2196f3;
            padding: 15px;
            margin: 15px 0;
            border-radius: 5px;
        }
        
        .student-info {
            background: #f3e5f5;
            border-left: 4px solid #9c27b0;
            padding: 15px;
            margin: 15px 0;
            border-radius: 5px;
        }
        
        .nav-menu {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        
        .nav-menu a {
            text-decoration: none;
            background: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        
        .nav-menu a:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h1>🎯 Lab 5 - Mô hình MVC</h1>
        
        <div class="message-box">
            <h2>📢 Thông báo:</h2>
            <p><?php echo htmlspecialchars($message); ?></p>
        </div>
        
        <div class="student-info">
            <h2>👨‍🎓 Thông tin sinh viên:</h2>
            <p><?php echo htmlspecialchars($studentInfo); ?></p>
        </div>
        
        <div class="nav-menu">
            <a href="index.php?page=home">🏠 Trang chủ</a>
            <a href="index.php?page=products">📦 Sản phẩm</a>
        </div>
    </div>
</body>
</html>