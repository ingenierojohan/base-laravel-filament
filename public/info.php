<?php
$serverInfo = [
    'PHP Version' => phpversion(),
    'Server Software' => $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown',
    'Server Name' => $_SERVER['SERVER_NAME'] ?? 'Unknown',
    'Document Root' => $_SERVER['DOCUMENT_ROOT'] ?? 'Unknown',
    'Remote Address' => $_SERVER['REMOTE_ADDR'] ?? 'Unknown',
    'Current Time' => date('Y-m-d H:i:s'),
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel1 - Server Info</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 10px;
        }
        .info-label {
            font-weight: bold;
            background: #f8f9fa;
            padding: 10px;
            border-radius: 4px;
        }
        .info-value {
            padding: 10px;
            background: #e9ecef;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🚀 Laravel1 Server Information</h1>
        <div class="info-grid">
            <?php foreach ($serverInfo as $label => $value): ?>
                <div class="info-label"><?php echo htmlspecialchars($label); ?></div>
                <div class="info-value"><?php echo htmlspecialchars($value); ?></div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
