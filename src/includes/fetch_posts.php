<?php
require_once 'config.php';

// Load posts
try {
    $query = $pdo->query(" ");

    $posts = $query->fetchAll(PDO::FETCH_ASSOC);
    //$num_results = count($posts);
} catch (PDOException $e) {
    $posts = [];
    $num_results = 0;
    $error = "Error while loading posts: " . $e->getMessage();
}
