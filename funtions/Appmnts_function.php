<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $date = $_POST["date"];
        $time = $_POST["time"];
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        
        $appointment = "$date $time | $first_name $last_name | $phone | $email";
        
        // Save the appointment to a text file
        file_put_contents('textFiles/appointments.txt', $appointment.PHP_EOL, FILE_APPEND);
        
        header('Location: index.php'); // Redirect back to the booking page
    }
?>