<?php
require_once 'includes/fetch_posts.php';
require_once 'includes/header.php';
?>

<!-- Hero Section -->
<div class="hero">
    <h1><span class="icon">🏛️</span> Lorem Ipsum</h1>
    <p>Explore bla bla bla</p>
    <div class="search-bar">
        <input type="text" placeholder="Search destinations, places, tags...">
        <button class="search-btn">🔍 Search</button>
    </div>
</div>

<!-- Filters -->
<div class="filters-wrapper">
    <div class="filters">
        <select><option>Tutte le regioni</option></select>
        <select><option>Tutte le province</option></select>
        <select><option>Tutti i tag</option></select>
        <button class="filter-btn">🔽 Applica Filtri</button>
        <button class="other-filters">≡ Altri filtri</button>
        <span style="margin-left: auto; color: #718096; font-size: 14px;">Ordina per:</span>
        <select><option>Rating</option></select>
    </div>
</div>

<!-- Main Content -->
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
                        <div class="card-tags">Tags qui</div>
                        <div class="card-footer">
                            <span class="price">Example</span>
                            <button class="details-btn">Details →</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
