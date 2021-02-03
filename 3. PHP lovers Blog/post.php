<?php 
require 'includes/header.inc.php'; 
    
    $id = $_GET['id'];

    // Create DB Object
    $db = new DB();

    // Create a Query;
    $query    = "SELECT * FROM posts WHERE id=$id";
    $category = "SELECT * FROM categories";

    // Run Query
    $posts = $db->select($query)->fetch_assoc();
    $categories = $db->select($category);

?>

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        From my Awesome Mind Directly!
      </h3>
      <div class="blog-post">
        <h2 class="blog-post-title"><?= $posts['title']; ?></h2>
        <!-- THIS DATE IS NOT FRIENDLY YOU NEED TO FORMAT -->
        <p class="blog-post-meta"><?= formatDate($posts['date']); ?> by <a href="#"><?= $posts['author']; ?></a></p>
        <?= $posts['body']; ?>
      </div><!-- /.blog-post -->
    </div><!-- /.blog-main -->


<?php require 'includes/footer.inc.php'; ?>