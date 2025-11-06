<?php
require_once 'config.php';

// Load posts
try {

    /* Personal Notes 

        In SELECT, sto chiedendo di prendere dalla tabella post le colonne id_post, title... 
        poi, dalla tabella places, sto chiedendo di prendere places.name etc... 

        Per i collegamenti FOREIGN KEY uso LEFT JOIN 

        LEFT JOIN <nome della tabella a cui fa riferimento la FK> ON <tabella.nome attributo FK>

        LEFT JOIN luoghi ON posts.id_luogo = posts.id_luogo 

        L'= qui non è un confronto normale come in un WHERE: 
        serve a dire "“"abbina le righe delle due tabelle 
        quando il valore di questa colonna corrisponde al valore di quell’altra colonna"

        è uguale all'operatore == del C++.
    */
    $query = $pdo->query("
        SELECT 
            posts.id_post,
            posts.title,
            posts.description,
            posts.thumbnail,
            posts.thumbnail_alt,
            posts.created_at,

            places.name AS place_name,

            countries.name AS country_name,

            users.nickname AS author,
            users.profile_picture

        FROM posts

        LEFT JOIN places ON posts.id_place = places.id_place
        LEFT JOIN countries ON places.id_country = countries.id_country
        LEFT JOIN users ON posts.author = users.nickname

        ORDER BY posts.created_at DESC
    ");

    $posts = $query->fetchAll(PDO::FETCH_ASSOC); // Prende tutti i campi dalla mia query
    $num_results = count($posts);
} catch (PDOException $e) {
    $posts = [];
    $num_results = 0;
    $error = "Error while loading posts: " . $e->getMessage();
}

// Load tags
try {
    // 
    $tags_query = $pdo->query("
        SELECT 
            posts_tags.id_post,
            tags.name AS tag_name,
            colors.name AS color_name

        FROM posts_tags 

        JOIN tags ON posts_tags.id_tag = tags.id_tag
        JOIN colors ON tags.id_color = colors.id_color
    ");

    $post_tags = $tags_query->fetchAll(PDO::FETCH_ASSOC);

    $tags_by_post = [];
    foreach ($post_tags as $row) {
        $tags_by_post[$row['id_post']][] = [ // In PHP, le parentesi [] ti "posizionano" alla fine dell'array, senza indice 
            'name' => $row['tag_name'],
            'color' => $row['color_name']
        ];
    }
} catch (PDOException $e) {
    $tags_by_post = [];
}
?>
