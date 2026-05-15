<?php
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAMP Stack Application</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f5f5f5; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .header { text-align: center; color: #333; margin-bottom: 30px; }
        .info { background: #e8f4fd; padding: 15px; border-radius: 5px; margin: 15px 0; }
        .success { background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin: 15px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🚀 LAMP Stack Application</h1>
            <p>Successfully deployed via GitHub Actions</p>
        </div>
        
        <div class="success">
            ✅ Application is running successfully!
        </div>
        
        <div class="info">
            <h3>System Information</h3>
            <p><strong>PHP Version:</strong> <?php echo phpversion(); ?></p>
            <p><strong>Server:</strong> <?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown'; ?></p>
            <p><strong>Timestamp:</strong> <?php echo date('Y-m-d H:i:s T'); ?></p>
        </div>
        
        <div class="info">
            <h3>Database Connection</h3>
            <?php
            try {
                $host = $_ENV['DB_HOST'] ?? 'localhost';
                $dbname = $_ENV['DB_NAME'] ?? 'app_db';
                $username = $_ENV['DB_USER'] ?? 'app_user';
                $password = $_ENV['DB_PASSWORD'] ?? '';
                
                if ($password) {
                    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                    echo "<p>✅ Database connection successful</p>";
                } else {
                    echo "<p>⚠️ Database credentials not configured</p>";
                }
            } catch (PDOException $e) {
                echo "<p>⚠️ Database connection failed: " . $e->getMessage() . "</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
