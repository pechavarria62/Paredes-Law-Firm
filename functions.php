<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment = $_POST['comment'];
    $rating = $_POST['rating'];

    // Validate comment and rating here as needed.

    // Create a new line of data to store in the text file.
    $data = $comment . " (Rating: $rating stars)\n";

    // Append the data to a text file (e.g., comments.txt).
    file_put_contents('comments.txt', $data, FILE_APPEND);

    header('Location: index.php');
    exit;
}
?>
