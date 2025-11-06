<?php
require_once 'config.php'; // Connect to database
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mete Turistiche - Appartamento Manuela</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="header-logo">
            <img src="https://via.placeholder.com/50" alt="Logo">
        </div>
        <div class="header-nav">
            <a href="#">Turismo</a>
            <a href="#">Food</a>
            <a href="#">Mappa</a>
            <a href="#">Tag</a>
        </div>
        <div class="admin-btn">✈️ Admin</div>
    </div>

    <!-- Hero Section -->
    <div class="hero">
        <h1>
            <span class="icon">🏛️</span>
            Lorem Ipsum
        </h1>
        <p>EExplore bla bla bla</p>
        <div class="search-bar">
            <input type="text" placeholder="Search destinations, places, tags...">
            <button class="search-btn">🔍 Search</button>
        </div>
    </div>

    <!-- Filters Wrapper -->
    <div class="filters-wrapper">
        <div class="filters">
            <select>
                <option>Tutte le regioni</option>
            </select>
            <select>
                <option>Tutte le province</option>
            </select>
            <select>
                <option>Tutti i tag</option>
            </select>
            <button class="filter-btn">🔽 Applica Filtri</button>
            <button class="other-filters">≡ Altri filtri</button>
            <span style="margin-left: auto; color: #718096; font-size: 14px;">Ordina per:</span>
            <select>
                <option>Rating</option>
            </select>
        </div>
    </div>

    <!-- Main Content -->

        <?php
    try {
        $query = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
        $posts = $query->fetchAll();
        $num_results = $query->rowCount();
    } catch (PDOException $e) {
        $posts = [];
        $num_results = 0;
        $error = "Error while loading posts.";
    }
    ?>


    <div class="container">
        <div class="content-header">
            <div>
                <h2>All destinations</h2>
                <div class="results-count"><?php echo $num_results; ?> destinations found</div>
            </div>
            <div class="view-options">
                <button class="view-btn active">Grid</button>
                <button class="view-btn">List</button>
                <button class="view-btn">Button1</button>
                <button class="view-btn">Button2</button>
            </div>
        </div>

        <!-- Cards Grid -->
        <div class="cards-grid">

            <?php if(!empty($posts)): ?>
                <?php foreach($posts as $post): ?>
                    <div class="card">
                        <div class="card-image">
                            <img src="<?php echo htmlspecialchars($post['thumbnail']) ?>" alt="<?php echo htmlspecialchars($post['thumbnail_alt']) ?>">
                            <div class="rating">Soon</div> 
                        </div>
                        <div class="card-content">
                            <h3 class="card-title"><?php echo htmlspecialchars($post['title']) ?></h3>
                            <div class="card-location">address</div>
                            <p class="card-description"><?php echo htmlspecialchars($post['description']) ?></p>
                            <div class="card-tags">
                                Tags qui
                            </div>
                            <div class="card-footer">
                                <span class="price">Example</span>
                                <button class="details-btn">Details -></button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>