<?php
require_once 'config.php'; // Connect to database

// Recupera tutti i post
try {
    $stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
    $posts = $stmt->fetchAll();
} catch (PDOException $e) {
    $posts = [];
    $error = "Error while loading posts.";
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luca Facchini | Travel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <?php foreach ($posts as $post): ?>
            <h2><?= htmlspecialchars($post['title']) ?></h2>
        <?php endforeach; ?>
</body>
</html>