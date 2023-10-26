<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $key = $_POST['appointment_key'];

    $filepath = '../textFiles/appointments.txt'; // Path to the appointment file
    $appointments = file($filepath, FILE_IGNORE_NEW_LINES);

    if (isset($appointments[$key])) {
        unset($appointments[$key]);
    }

    file_put_contents($filepath, implode(PHP_EOL, $appointments));

    header('Location: ../pages/Admin.php'); // Redirect back to the admin panel
}
?>
