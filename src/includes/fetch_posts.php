<?php
require_once 'config.php';

try {
    $query = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
    $posts = $query->fetchAll();
    $num_results = $query->rowCount();
} catch (PDOException $e) {
    $posts = [];
    $num_results = 0;
    $error = "Error while loading posts.";
}
