<?php
require ('mailer.php');

  $message_email=$_POST["email"];
  $message_subject=$_POST["subject"];
  $message_body=$_POST["body"];
  

// $message_body = "Dear Mr. Awsaf\\nYour flight has been unfortunately delayed, due to severe weather conditions.\\n We are currently doing everything in our power to resume the flight as fast as possible.\\nRegards,\\nBUETAirlines.com";

// $message_subject = "Greetings From BuetAirlines";

// $message_email = "awsafalam@gmail.com"; // receiver email address

$message_title = "BUET Airlines";

$mailSender = new MailSender($message_email, $message_subject, $message_title, $message_body);

$mailSender->requestMailSend();


?>