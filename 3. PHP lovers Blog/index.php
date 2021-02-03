<?php
require 'includes/header.inc.php';

    // Create DB Object
    $db = new DB();

    // Create a Query;
    $query    = "SELECT * FROM posts";
    $category = "SELECT * FROM categories";

    // Run Query
    $posts = $db->select($query);
    $categories = $db->select($category);
?>

  <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">Check this new featured Post!</h1>
      <p class="lead my-3">I could write down a bunch of text here, that doesn't make any sense at all... And I did.</p>
      <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
    </div>
  </div>

  <div class="row mb-2">
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">All Posts</strong>
          <h3 class="mb-0">Featured post</h3>
          <div class="mb-1 text-muted">Fev 2</div>
          <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Subject</strong>
          <h3 class="mb-0">Post title</h3>
          <div class="mb-1 text-muted">Jan 21</div>
          <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="stretched-link" href="<?= "post.php?id=1" ?>">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        </div>
      </div>
    </div>
  </div>
</div>

<main role="main" class="container">
  <div class="row">

<!-- Checking if there are any posts -->
  <?php if($posts) : ?>
  
  
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        From my Awesome Mind Directly!
      </h3>
  
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

    </div><!-- /.blog-main -->
<?php else : ?>
    <p>There are no posts yet... Add one please!
<?php endif; ?>


<?php require 'includes/footer.inc.php'; ?>
