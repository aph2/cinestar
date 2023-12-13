<?php include 'components/header.php'; ?>
<?php
if (!$isAdmin) {
  redirect("index");
}

$users = getItems($con, "users", "id <> 1");
// $sql = "select email from users where id <> 1;";
// $users = mysqli_query($con, $sql);
?>
<div class="container admin">
  <h2>Users list:</h2>
  <a href="admin-movie.php">
    <button class="btn">Add new movie</button>
  </a>
  <section class="flex flex-col gap-2 py-2">
    <?php foreach ($users as $user) : ?>
      <div class="flex space-between flex-1 items-center">
        <p><?= $user["email"]; ?></p>
        <div class="flex gap-2 items-center">
          <a href="admin-user.php">Edit</a>
          <form action="">
            <button class="btn btn-danger">Delete</button>
          </form>
        </div>
      </div>
      <hr>
    <?php endforeach; ?>
  </section>
</div>

<?php include 'components/footer.php'; ?>