<?php
require_once 'includes/fetch_posts.php';

// Imports: $posts
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
        <?php foreach($posts as $post): // $posts is taken from includes/fetch_posts.php ?>

            <div class="card">

                <div class="card-image">
                    <img src="<?php echo htmlspecialchars($post['thumbnail']) ?>" alt="<?php echo htmlspecialchars($post['thumbnail_alt']) ?>">
                    <div class="rating"><?php echo htmlspecialchars($post['rating']) ?>/5</div>
                </div>

                <div class="card-content">
                    <h3 class="card-title"><?php echo htmlspecialchars($post['title']) ?></h3   >
                    <div class="card-location">Written by <img class="profile-picture" src="<?php echo htmlspecialchars($post['profile_picture']); ?>" alt=""> <?php echo htmlspecialchars($post['author']); ?> - <?php echo htmlspecialchars($post['created_at']); ?></div>
                    <p class="card-description"><?php echo htmlspecialchars($post['description']); ?></p>

                    <!-- Tags -->
                    <div class="card-tags">
                        <?php
                        if (!empty($post['tags'])) {
                            $tags = array_map('trim', explode(',', $post['tags']));
                            foreach ($tags as $tag) {
                                if ($tag === '') continue;
                                echo '<span class="tag">' . htmlspecialchars($tag) . '</span> ';
                            }
                        }
                        ?>

                    </div>

                    <div class="card-footer">
                        <span class="price">Soon</span>
                        <button class="details-btn">Details</button>
                    </div>
                </div>

                
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
</div>

<?php require_once 'includes/footer.php'; ?>
