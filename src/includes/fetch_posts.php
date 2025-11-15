<?php
require_once 'config.php';

try {
    $query = $pdo->query("SELECT

    p.title, p.thumbnail, p.description, p.created_at, p.author,
    pl.name AS place_name, pl.score AS rating, c.name AS country_name,
    u.profile_picture,
    GROUP_CONCAT(t.name) AS tags
    
    FROM posts p 
	JOIN places AS pl ON p.id_place = pl.id_place
    JOIN posts_tags AS pt ON p.id_post = pt.id_post
    JOIN tags AS t ON pt.id_tag = t.id_tag
	JOIN users AS u ON p.author = u.nickname
	JOIN countries AS c ON pl.id_country = c.id_country
    
    GROUP BY p.id_post, p.title, p.description, p.author, pl.name;");
    
    $posts = $query->fetchAll(PDO::FETCH_ASSOC);
    $num_results = count($posts);
    
} catch (PDOException $e) {
    $posts = [];
    $num_results = 0;
    $error = "Error in loading posts: " . $e->getMessage();
}