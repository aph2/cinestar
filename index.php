<?php include 'components/header.php'; ?>

<header class="main-header">
  <h1 class="site-title">Best Cine<span style='font-size:2.5rem;'>&#9734;</span>Star movies</h1>
</header>
<?php
$sql = "select * from movies limit 4;";
$movies = mysqli_query($con, $sql);
?>
<section class="movies-admin-list">
  <?php foreach ($movies as $movie) : ?>
    <?= card($movie); ?>
  <?php endforeach; ?>
</section>

<?php include 'components/footer.php'; ?>