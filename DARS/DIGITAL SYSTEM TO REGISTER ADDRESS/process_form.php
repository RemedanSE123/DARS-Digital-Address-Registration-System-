<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $option = $_POST["option"];
  $name = $_POST["name"];
  $surname = $_POST["surname"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $message = $_POST["message"];

  // Set your email address here
  $to = "remedanhyeredin@gmail.com";

  // Set the subject of the email
  $subject = "Form Submission: $option";

  // Compose the email message
  $message_body = "Option: $option\n";
  $message_body .= "Name: $name $surname\n";
  $message_body .= "Email: $email\n";
  $message_body .= "Phone: $phone\n\n";
  $message_body .= "Message:\n$message";

  if (mail($to, $subject, $message_body)) {
    // Email sent successfully
} else {
    // There was an error sending the email
    echo "Error: Unable to send email.";
}

  // Redirect to a thank you page
  header("Location: thank_you.html");
  exit();
}
?>
