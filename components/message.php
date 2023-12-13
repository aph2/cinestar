<?php
function message($message, $url)
{
  return '
  <div class="message-background">
    <div class="message-container">
      <p>' . $message . '</p>
      <a href="' . $url . '">
        <button class="btn">Ok</button>
      </a>
    </div>
  </div>
          ';
}
