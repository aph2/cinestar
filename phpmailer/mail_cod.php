<?php
require_once('class.phpmailer.php');
require_once('mail_config.php');
// Google account / Security / Less Secure app access

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = wordwrap($_POST["message"], 160, "<br />\n");

  $mail = new PHPMailer(true);
  $mail->IsSMTP();

  try {
    $mail->SMTPDebug  = 0;
    $mail->SMTPAuth   = true;

    $fromEmail = 'adrian@clustercs.com';
    $fromName = 'Cinestar';

    $mail->SMTPSecure = "ssl";
    $mail->Host       = "smtp.gmail.com";
    $mail->Port       = 465;
    $mail->Username   = $username;
    $mail->Password   = $password;

    // $mail->AddReplyTo('adrian@clustercs.com', 'Adrian Curcan');
    $mail->SetFrom($fromEmail, $fromName);
    $mail->AddAddress($email, $name);
    $mail->AddAttachment("../assets/images/logo.jpeg", "App logo");

    $mail->Subject = 'CineStar message'; // Subiectul mailului
    $mail->AltBody = 'To view this post you need a compatible HTML viewer!';
    $mail->MsgHTML($message);
    $mail->Send();
    echo "Message Sent</p>\n";
    echo '<p><a href="/cinema">Go to Homepage</a></p>';
    header("refresh:5;url=/cinema/contact.php");
    exit();
  } catch (phpmailerException $e) {
    echo $e->errorMessage(); //error from PHPMailer
  } catch (Exception $e) {
    echo $e->getMessage(); //error from anything else!
  }
}
