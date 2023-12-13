<?php include 'components/header.php'; ?>
<?php
if (isset($_GET['category'])) {
  $category_name = $con->real_escape_string($_GET['category']);
  $category = getItem($con, "select id from movie_categories where name='$category_name'");
  $movies = getItems($con, "movies", "category_id = " . $category["id"]);
}
?>
<a href="./categories.php" class="back-link">Back to categories</a>
<h1>Category Movies</h1>

<section class="movies-admin-list">
  <?php foreach ($movies as $movie) : ?>
    <?= card($movie, true); ?>
  <?php endforeach; ?>
</section>
<?php include 'components/footer.php'; ?>