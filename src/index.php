<?php
require_once 'config.php'; // Connect to database
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
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="navbar-logo">
                <img src="https://via.placeholder.com/40x40?text=LF" alt="Logo">
            </div>
            <ul class="navbar-menu">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#destinations">Destinations</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <a href="#login" class="navbar-login">Login</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <h2>Explore the World</h2>
        <p>Discover amazing destinations through my travel adventures</p>
    </section>

    <!-- Posts Grid -->

    <?php
    try {
        $query = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
        $posts = $query->fetchAll();
    } catch (PDOException $e) {
        $posts = [];
        $error = "Error while loading posts.";
    }
    ?>

    <section class="posts-container">
        <?php if(!empty($posts)): ?>
            <?php foreach($posts as $post): ?>

            <div class="post-card">
                <div class="card-image">
                    <img src="<?= htmlspecialchars($post['thumbnail']) ?>" alt="<?= htmlspecialchars($post['title']) ?>">
                </div>
                <div class="card-content">
                    <h3><?= htmlspecialchars($post['title']) ?></h3>
                    <p class="post-date"><?= htmlspecialchars($post['published_on']) ?></p>
                    <p class="post-description"><?= htmlspecialchars($post['description']) ?></p>
                    <span class="read-more">Read More →</span> <? // not sure how to do it yet. ?>
                </div>
            </div>

            <?php endforeach; ?>
        <?php endif; ?>

      
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Luca Facchini. All rights reserved.</p>
    </footer>
</body>
</html>