<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $comment = $_POST['comment'];

        // Validate comment and rating here as needed.

        // Create a new line of data to store in the text file.
        // $stars = str_repeat('<i class="fa-solid fa-star"></i>', $rating);
        $data = "$first_name | $last_name | $comment" ;

        // Append the data to a text file (e.g., comments.txt).
        $filepath = '../textFiles/comments.txt';
        file_put_contents($filepath, $data.PHP_EOL, FILE_APPEND);

        header('Location: ../index.php');
        exit;
    }
?>
