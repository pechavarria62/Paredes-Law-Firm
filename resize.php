<?php
// Input image file path
$inputImagePath = '/Volumes/personal/stackCp/Paredes-Law-Firm/assets/img/team/klk.jpg';

// Output image file path
$outputImagePath = '/Volumes/personal/stackCp/Paredes-Law-Firm/assets/img/team/output.jpg';

// New width and height for the resized image
$newWidth = 300;
$newHeight = 320;

// Load the original image
$sourceImage = imagecreatefromjpeg($inputImagePath);

// Create a blank canvas for the resized image
$resizedImage = imagecreatetruecolor($newWidth, $newHeight);

// Resize the image
imagecopyresized($resizedImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, imagesx($sourceImage), imagesy($sourceImage));

// Save the resized image to a file
imagejpeg($resizedImage, $outputImagePath, 90); // 90 is the image quality (adjust as needed)

// Clean up resources
imagedestroy($sourceImage);
imagedestroy($resizedImage);

echo 'Image resized and saved as ' . $outputImagePath;
?>
