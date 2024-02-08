<?php
function display($data)
{
  echo '<pre>' . print_r($data) . '</pre>';
}

function redirect($url)
{
  header('Location: ' . $url . '.php');
  die();
}

function getItems($con, $table, $condition)
{
  $sql = 'select * from ' . $table;
  if ($condition) {
    $sql .= ' where ' . $condition;
  }

  $result = mysqli_query($con, $sql);
  return $result;
}

function getItem($con, $sql)
{
  $result = mysqli_query($con, $sql);

  if ($result === false) {
    die("Error! Please try again later!");
  }

  if ($result->num_rows > 0) {
    return $result->fetch_assoc();
  }
}