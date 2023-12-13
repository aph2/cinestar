<?php include 'components/header.php'; ?>

<?php
$id = $_SESSION['id'];

$sql = "
  SELECT t.*, s.*, h.name as hall_name, m.name as movie_name, se.seat_number 
  FROM tickets t 
  JOIN schedules s ON t.schedule_id = s.id 
  JOIN halls h ON s.hall_id = h.id 
  JOIN movies m ON s.movie_id = m.id 
  JOIN seats se ON t.seat_id = se.id 
  WHERE t.user_id = $id";
$tickets = mysqli_query($con, $sql);
// display($tickets->fetch_assoc());
?>
<h1>My tickets:</h1>
<section class="flex flex-col gap-2 py-2">
  <?php foreach ($tickets as $ticket) : ?>
    <div class="flex space-between flex-1 items-center">
      <!-- <a href="./category.php?category=<?= $ticket["name"]; ?>"><?= ucfirst($category["name"]); ?></a> -->
      <p><?= $ticket["movie_name"]; ?></p>
      <p><?= $ticket["hall_name"]; ?></p>
      <p><?= $ticket["start_time"]; ?></p>
      <p>Seat: <?= $ticket["seat_number"]; ?></p>
      <button class="btn">Send email</button>
    </div>
    <hr>
  <?php endforeach; ?>
</section>
<?php include './components/footer.php'; ?>