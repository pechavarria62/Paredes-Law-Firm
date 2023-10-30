<?php
// Input image file path
$imagePath = 'assets/img/team/team-3.png'; // Change to the path of your image

// Get the image dimensions
list($width, $height) = getimagesize($imagePath);

echo "Image width: $width pixels\n";
echo "Image height: $height pixels\n";
?>