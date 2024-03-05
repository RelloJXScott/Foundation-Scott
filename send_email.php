<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST["email"];
    $subject = "Foundation Scott Verification Code";
    $message = "Hello " . $_POST["username"] . ",\n\nThank you for signing up with Foundation Scott! Your verification code is: " . $_POST["verificationCode"];
    $headers = "From: rellojxscott@gmail.com"; // Replace with your email

    mail($to, $subject, $message, $headers);
}
?>
