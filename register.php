<?php include 'components/header.php'; ?>

<?php
$message = null;
$url = "register.php";

if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $verify_query = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");
  if (mysqli_num_rows($verify_query) != 0) {
    $message = "There is an account with this email. Use another one!";
    // echo "<a href='javascript:self.history.back()'>";
  } else {
    mysqli_query($con, "INSERT INTO users(username,email,password, user_type) VALUES('$username','$email','$password', '2')") or die("Error: $conn->error ");
    $message = "Successfully registered!";
    $url = "login.php";
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
          <label for="username">Username:</label>
          <input type="text" name="username" id="username" autocomplete="off" required>
        </div>
        <div class="input-field">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" autocomplete="off" required>
        </div>
        <div class="input-field">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" autocomplete="off" required>
        </div>
        <div class="center">
          <input type="submit" class="btn" name="register" value="Register" required>
        </div>
        <div class="links">
          Already a member? <a href="login.php">Sign In</a>
        </div>
      </form>
    </div>
  </div>
<?php } ?>

<?php include 'components/footer.php'; ?>