<?php include 'components/header.php'; ?>

<?php
if (!$isAdmin) {
  redirect("index");
}

$movies = getItems($con, "movies", "");
?>
<div class="container admin">
  <h2>Admin movies list:</h2>
  <a href="admin-movie.php">
    <button class="btn">Add new movie</button>
  </a>
  <section class="movies-admin-list">
    <?php foreach ($movies as $movie) : ?>
      <?= card($movie, true); ?>
    <?php endforeach; ?>
  </section>
</div>

<?php include 'components/footer.php'; ?>