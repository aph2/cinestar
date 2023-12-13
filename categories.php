<?php include './components/header.php'; ?>
<?php
$categories = getItems($con, "movie_categories", "");
?>
<h1>Categories</h1>
<section class="flex flex-col gap-2 py-2">
  <?php foreach ($categories as $category) : ?>
    <div class="flex space-between flex-1 items-center">
      <a href="./category.php?category=<?= $category["name"]; ?>"><?= ucfirst($category["name"]); ?></a>
    </div>
    <hr>
  <?php endforeach; ?>
</section>
<?php include './components/footer.php'; ?>