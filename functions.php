<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $comment = $_POST['comment'];
        $rating = $_POST['rating'];

        // Validate comment and rating here as needed.

        // Create a new line of data to store in the text file.
        $data = $comment . " (Rating: $rating stars)\n";

        // Append the data to a text file (e.g., comments.txt).
        file_put_contents('textFiles/comments.txt', $data, FILE_APPEND);

        header('Location: index.php');
        exit;
    }
?>
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
