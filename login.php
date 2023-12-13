<?php include 'components/header.php'; ?>

<?php
session_start();

$message = null;
$url = "login.php";

if (isset($_POST['login'])) {
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);

  $result = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password' ") or die("Error: $con->error");
  $row = mysqli_fetch_assoc($result);

  if (is_array($row) && !empty($row)) {
    $_SESSION['id'] = $row['id'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['age'] = $row['age'];
    $_SESSION['user_type'] = $row['user_type'];

    redirect("account");
  } else {
    $message = "Wrong credentials!";
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
          <label for="email">Email</label>
          <input type="email" name="email" id="email" autocomplete="off" required>
        </div>
        <div class="input-field">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" autocomplete="off" required>
        </div>
        <div class="center">
          <input type="submit" class="btn" name="login" value="Login" required>
        </div>
        <div class="links">
          Don't have account? <a href="register.php">Sign Up Now</a>
        </div>
      </form>
    </div>
  </div>
<?php } ?>

<?php include 'components/footer.php'; ?>