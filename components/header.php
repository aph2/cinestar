<!-- header.php -->
<?php
include 'components/message.php';
include 'components/card.php';
include("php/config.php");
include("php/functions.php");

session_start();
$isAuthenticated = false;
$isAdmin = false;
if (isset($_SESSION['email'])) {
  $isAuthenticated = true;
  if ($_SESSION['user_type'] == "admin") {
    $isAdmin = true;
  };
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./style/main.css">
  <title>Cine&#9734;Star</title>
</head>

<body>
  <header>
    <nav class="main-menu">
      <a href="index.php" class="logo">
        Cine<span style='font-size:2.5rem;'>&#9734;</span>Star
      </a>
      <ul>
        <li><a href="categories.php" class="menu-link">Categories</a></li>
        <li><a href="tickets.php" class="menu-link">Tickets</a></li>
        <?php if ($isAuthenticated) { ?>
          <?php if ($isAdmin) { ?>
            <li><a href="admin.php" class="menu-link">Admin</a></li>
          <?php } else { ?>
            <li><a href="account.php" class="menu-link">Account</a></li>
          <?php } ?>
          <li><a href="./php/logout.php" class="menu-link">Logout</a></li>
        <?php } else { ?>
          <li><a href="login.php" class="menu-link">Login</a></li>
        <?php } ?>
      </ul>
    </nav>
  </header>
  <main class="content">