<?php include 'components/header.php'; ?>
<?php
if (!$isAdmin) {
  redirect("index");
}

$message = null;
$url = "admin-movies.php";

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
}

if (isset($_POST['update'])) {
  $name = $_POST['name'];
  $slug = $_POST['slug'];
  $category_id = $_POST['category_id'];
  $image_url = $_POST['image_url'];
  $id = $movie['id'];


  $q = "UPDATE movies SET name='$name', slug='$slug', category_id='$category_id', image_url='$image_url' WHERE id=$id";

  $edit_query = mysqli_query($con, $q) or die("error occurred: $con->error");

  if ($edit_query) {
    $message = "Successfully updated";
  } else {
    $message = "Update failed" . $conn->error;
  }
} else if (isset($_POST['delete'])) {
  $id = $movie["id"];
  if ($id !== null) {
    $sql = "DELETE FROM movies WHERE id = '$id'";

    $result = mysqli_query($con, $sql);
    $movie = null;

    if ($result === TRUE) {
      $message = "Successfully deleted";
    } else {
      $message = "Delete failed"  . $conn->error;
    }
  }
} else if (isset($_POST['create'])) {
  $name = $con->real_escape_string($_POST['name']);
  $slug = $con->real_escape_string($_POST['slug']);
  $category_id = $con->real_escape_string($_POST['category_id']);
  $image_url = $con->real_escape_string($_POST['image_url']);
  $description = $con->real_escape_string($_POST['description']);

  $sql = "
    INSERT INTO movies (name, description, category_id, image_url, slug)
    VALUES ('$name', '$description', ' $category_id', '$image_url', '$slug');
  ";

  $result = mysqli_query($con, $sql);
  if ($result === TRUE) {
    $message = "Successfully created";
  } else {
    $message = "Creation failed"  . $conn->error;
  }
}
// print_r($_REQUEST);
// print_r(getallheaders())
?>

<?php if ($message == null) { ?>
  <a href="admin-movies.php" class="back-link">
    < Back</a>
    <?php } ?>
    <div class="h-full center">
      <?php if ($message !== null) { ?>
        <?= message($message, $url); ?>
      <?php } else { ?>
        <section class="admin-form-container">
          <?php if ($movie !== null) { ?>
            <h2>Edit "<?php echo $movie["name"]; ?>"</h2>
          <?php } else { ?>
            <input type="submit" class="btn" name="create" value="Create" required>
          <?php } ?>
          <div class="form-container">
            <form action="" method="post">
              <div class="input-field">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="<?php echo $movie['name']; ?>" autocomplete="off" required>
              </div>
              <div class="input-field">
                <label for="slug">Slug:</label>
                <input type="text" name="slug" id="slug" value="<?php echo $movie['slug']; ?>" autocomplete="off" required>
              </div>
              <div class="input-field">
                <label for="category_id">Category</label>
                <input type="text" name="category_id" id="category_id" value="<?php echo $movie['category_id']; ?>" autocomplete="off" required>
              </div>
              <div class="input-field">
                <label for="image_url">Image</label>
                <input type="text" name="image_url" id="image_url" value="<?php echo $movie['image_url']; ?>" autocomplete="off" required>
              </div>
              <div class="input-field">
                <label for="description">Description</label>
                <textarea name="description" id="description" requiredcols="30" rows="10"><?php echo $movie['description']; ?></textarea>
              </div>
              <div class="field">
                <?php if ($movie !== null) { ?>
                  <input type="submit" class="btn" name="update" value="Update" required>
                <?php } else { ?>
                  <input type="submit" class="btn" name="create" value="Create" required>
                <?php } ?>
                <button type="submit" class="btn btn-danger" name="delete">Delete &#128465;</button>
              </div>
            </form>
          </div>
        </section>
      <?php } ?>
    </div>

    <?php include 'components/footer.php'; ?>