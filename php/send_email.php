

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

error_reporting(E_ALL);
ini_set('display_errors', 1);
// <?php
// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//   $name = $_POST["name"];
//   $email = $_POST["email"];
//   $message = $_POST["message"];

//   $to = "adrian.curcan@s.unibuc.ro";
//   $subject = "New Contact Form Submission from $name";
//   $headers = "From: $email";

//   // Adaugă și alte anteturi necesare, cum ar fi Content-Type

//   // Trimite emailul
//   $success = mail($to, $subject, $message, $headers);

//   if ($success) {
//     echo "Your message has been sent successfully!";
//   } else {
//     echo "Error sending the message. Please try again later.";
//   }
// }

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];
  // var_dump($_POST);

  $to = "adrian.curcan@s.unibuc.ro";
  $subject = "New Contact Form Submission from $name";
  $headers = "From: $email\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

  $success = mail($to, $subject, $message, $headers);
  if ($success) {
    echo "Your message has been sent successfully!";
  } else {
    echo "Error sending the message. Please try again later.";
  }
}

$mail;
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Host = 'outlook.office365.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';

$mail->Username = 'username@example.com';  // Adaugă username-ul SMTP al tău
$mail->Password = 'password';

$mail->SetFrom($username, 'Curcan Adrian'); //datele reale ale contului utilizat sa transmita email-ul; probabil @s.unibuc.ro 
$mail->addCustomHeader("BCC: ".$email); //devine $mail->addBcc($email);
