<?php
    // save the times selected in the admin panel.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $new_time = $_POST["available_times"];

        // Convert the 24-hour time to 12-hour format
        $new_time_12hr = date("h:i A", strtotime($new_time));

        $filepath = '../textFiles/available_times.txt'; // Path to the file for available times

        // Save the new time to the file for available times
        file_put_contents($filepath, $new_time_12hr.PHP_EOL, FILE_APPEND);
    }

    header('Location: ../pages/Admin.php'); // Redirect back to the admin panel
?>
