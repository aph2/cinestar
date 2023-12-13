<?php include 'components/header.php'; ?>

<?php
if (isset($_GET['slug'])) {
  $slug = $con->real_escape_string($_GET['slug']);

  $sql = "SELECT * FROM movies WHERE slug = '$slug'";
  $result = mysqli_query($con, $sql);
  $movie = null;
  

  if ($result === false) {
    die("Error! Please try again later!");
  }

  if ($result->num_rows > 0) {
    $movie = $result->fetch_assoc();
  }
} else {
  echo "Invalid movie name";
}
?>
<section class="movie-list">
  <?php if ($movie !== null) { ?>
    <?= card($movie); ?>
    <section>

    </section>
  <?php } else { ?>
    <p>No result for <?php echo "'$slug'" ?></p>
  <?php } ?>
</section>
<?php include 'components/footer.php'; ?>