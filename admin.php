<?php include 'components/header.php'; ?>

<?php
if (!$isAdmin) {
  redirect("index");
}


$sqlM = "select * from movies limit 3;";
$movies = mysqli_query($con, $sqlM);
$sql = "select email from users where id <> 1 limit 3;";
$users = mysqli_query($con, $sql);
?>
<div class="container admin">
  <h2>Users list:</h2>
  <a href="admin-users.php" class="btn">
    See all users
  </a>
  <section class="flex flex-col gap-2 py-2">
    <?php foreach ($users as $user) : ?>
      <div class="flex space-between flex-1 items-center">
        <p><?= $user["email"]; ?></p>
      </div>
      <hr>
    <?php endforeach; ?>
  </section>
</div>

<div class="container admin">
  <h2>Movies list:</h2>
  <a href="admin-movies.php" class="btn">
    See all movies
  </a>
  <section class="movies-admin-list">
    <?php foreach ($movies as $movie) : ?>
      <?= card($movie, true); ?>
    <?php endforeach; ?>
  </section>
</div>

<?php include 'components/footer.php'; ?>