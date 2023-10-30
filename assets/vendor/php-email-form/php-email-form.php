<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $to = "elmacron19@hotmail.com"; // Replace with your email address
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $message_body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage:\n$message";

    if (mail($to, $subject, $message_body, $headers)) {
        echo "success"; // You can customize this response
    } else {
        echo "error"; // You can customize this response
    }
} else {
    echo "Invalid request";
}
?>