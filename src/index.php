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
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <h1>Luca Facchini</h1>
                <span class="tagline">Travel Blog</span>
            </div>
            <ul class="nav-menu">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#destinations">Destinations</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <h2>Explore the World</h2>
        <p>Discover amazing destinations through my travel adventures</p>
    </section>

    <!-- Posts Grid -->
    <section class="posts-container">
        <div class="post-card" onclick="window.location.href='post.html?id=1'">
            <div class="card-image">
                <img src="https://images.unsplash.com/photo-1502602898657-3e91760cbb34?w=600" alt="Paris">
            </div>
            <div class="card-content">
                <h3>A Weekend in Paris</h3>
                <p class="post-date">October 15, 2025</p>
                <p class="post-excerpt">Exploring the city of lights, from the Eiffel Tower to hidden cafés in Montmartre...</p>
                <span class="read-more">Read More →</span>
            </div>
        </div>

        <div class="post-card" onclick="window.location.href='post.html?id=2'">
            <div class="card-image">
                <img src="https://images.unsplash.com/photo-1513581166391-887a96ddeafd?w=600" alt="London">
            </div>
            <div class="card-content">
                <h3>London Adventures</h3>
                <p class="post-date">September 28, 2025</p>
                <p class="post-excerpt">From the British Museum to Camden Market, discovering the vibrant culture of London...</p>
                <span class="read-more">Read More →</span>
            </div>
        </div>

        <div class="post-card" onclick="window.location.href='post.html?id=3'">
            <div class="card-image">
                <img src="https://images.unsplash.com/photo-1523906834658-6e24ef2386f9?w=600" alt="Barcelona">
            </div>
            <div class="card-content">
                <h3>Barcelona by the Sea</h3>
                <p class="post-date">August 12, 2025</p>
                <p class="post-excerpt">Sun, sand, and Gaudí's masterpieces - Barcelona has it all...</p>
                <span class="read-more">Read More →</span>
            </div>
        </div>

        <div class="post-card" onclick="window.location.href='post.html?id=4'">
            <div class="card-image">
                <img src="https://images.unsplash.com/photo-1552832230-c0197dd311b5?w=600" alt="Rome">
            </div>
            <div class="card-content">
                <h3>The Eternal City: Rome</h3>
                <p class="post-date">July 5, 2025</p>
                <p class="post-excerpt">Walking through history in the streets of ancient Rome...</p>
                <span class="read-more">Read More →</span>
            </div>
        </div>

        <div class="post-card" onclick="window.location.href='post.html?id=5'">
            <div class="card-image">
                <img src="https://images.unsplash.com/photo-1539037116277-4db20889f2d4?w=600" alt="Tokyo">
            </div>
            <div class="card-content">
                <h3>Tokyo: Where Tradition Meets Future</h3>
                <p class="post-date">June 20, 2025</p>
                <p class="post-excerpt">From ancient temples to neon-lit streets, Tokyo is a city of contrasts...</p>
                <span class="read-more">Read More →</span>
            </div>
        </div>

        <div class="post-card" onclick="window.location.href='post.html?id=6'">
            <div class="card-image">
                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600" alt="Iceland">
            </div>
            <div class="card-content">
                <h3>Iceland's Natural Wonders</h3>
                <p class="post-date">May 10, 2025</p>
                <p class="post-excerpt">Chasing waterfalls and northern lights in the land of fire and ice...</p>
                <span class="read-more">Read More →</span>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Luca Facchini. All rights reserved.</p>
    </footer>
</body>
</html>