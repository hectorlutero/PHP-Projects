<?php 
require 'includes/header.inc.php'; 

    // Create DB Object
    $db = new DB();
    
    if (isset($_GET['category'])) {
      $category = $_GET['category'];

      // Create a Query;
      $query = "SELECT * FROM posts WHERE category=$category";
      // Run Query
      $posts = $db->select($query);

    } else {
      // Create a Query;
      $query = "SELECT * FROM posts";
      // Run Query
      $posts = $db->select($query);
    }
    
    // Create a Query;
    $query = "SELECT * FROM categories";
    // Run Query
    $categories = $db->select($query);

?>

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        From my Awesome Mind Directly!
      </h3>
      <?php if ($posts) : ?>
        <?php while($row = $posts->fetch_assoc()) : ?>
          <div class="blog-post">
            <h2 class="blog-post-title"><?= $row['title']; ?></h2>
            <!-- THIS DATE IS NOT FRIENDLY YOU NEED TO FORMAT -->
            <p class="blog-post-meta"><?= formatDate($row['date']); ?> by <a href="#"><?= $row['author']; ?></a></p>
            <?= shortenText($row['body'], 200); ?>
            <div>
              <a href="post.php?id=<?= urlencode($row['id']); ?>">Continue reading</a>     
            </div>
          </div><!-- /.blog-post -->
        <?php endwhile; ?>
    <?php else : ?>
      <p>There are no posts with this category yet</p>
    <?php endif; ?>
    </div><!-- /.blog-main -->


<?php require 'includes/footer.inc.php'; ?>