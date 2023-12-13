<?php
function card($movie, $isAdmin = false)
{
  $url = $isAdmin ? 'admin-movie.php' : 'movie.php';
  $image_url = $movie["image_url"];
  $slug = $movie["slug"];
  $name = $movie["name"];

  return '
        <article class="movie-card">
            <a href="' . $url . '?slug=' . $slug . '">
                <img style="width:100%;object-fit:cover;" src="' . $image_url . '" alt="' . $name . '">
                <h2 class="movie-title">' . $name . '</h2>
            </a>
        </article>
    ';
}
