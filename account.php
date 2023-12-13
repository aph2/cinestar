<?php include 'components/header.php'; ?>

<?php
$message = null;
$url = "tickets.php";

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $id = $_SESSION['id'];

  $sql = "UPDATE users SET username='$username', email='$email', password='$password' WHERE id=$id ";
  $edit_query = mysqli_query($con, $sql) or die("Error $con->error");

  if ($edit_query) {
    $message = "Successfully updated";
    $_SESSION['email'] = $$_POST['email'];
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $$_POST['password'];
  }
} else {
  $id = $_SESSION['id'];

  $query = mysqli_query($con, "SELECT*FROM users WHERE id=$id ");
  while ($result = mysqli_fetch_assoc($query)) {
    $username = $result['username'];
    $email = $result['email'];
    $password = $result['password'];
  }
}
?>
<?php if ($message !== null) { ?>
  <?= message($message, $url); ?>
<?php } else { ?>
  <div class="center">
    <div class="admin-form-container">
      <form class="form-container" action="" method="post">
        <div class="input-field">
          <label for=" username">Username</label>
          <input type="text" name="username" id="username" value="<?php echo $username; ?>" autocomplete="off" required>
        </div>
        <div class="input-field">
          <label for="email">Email</label>
          <input type="text" name="email" id="email" value="<?php echo $email; ?>" autocomplete="off" required>
        </div>
        <div class="input-field">
          <label for="password">Password</label>
          <input type="text" name="password" id="password" value="<?php echo $password; ?>" autocomplete="off" required>
        </div>
        <div class="field">
          <input type="submit" class="btn" name="submit" value="Update" required>
        </div>
      </form>
    </div>
  </div>
<?php } ?>

<?php include 'components/footer.php'; ?>