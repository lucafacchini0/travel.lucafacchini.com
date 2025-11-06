<?php
require_once 'includes/fetch_posts.php';
?>

<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/hero.php'; ?>
<?php require_once 'includes/filters.php'; ?>

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
                    <div class="card-location"><?php echo htmlspecialchars($post['place_name'] ?? ''); ?></div>
                    <p class="card-description"><?php echo htmlspecialchars($post['description']); ?></p>

                    <!-- Tags -->
                    <div class="card-tags">
                        <?php if (!empty($tags_by_post[$post['id_post']])): ?>
                            <?php foreach ($tags_by_post[$post['id_post']] as $tag): ?>
                                <span class="tag" style="background-color: <?php echo strtolower($tag['color']); ?>;">
                                    <?php echo htmlspecialchars($tag['name']); ?>
                                </span>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <span class="tag tag-empty">No tags</span>
                        <?php endif; ?>
                    </div>

                    <div class="card-footer">
                        <span class="price"><?php echo htmlspecialchars($post['author']) ?></span>
                        <button class="details-btn">Details →</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
</div>

<?php require_once 'includes/footer.php'; ?>
