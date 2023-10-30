<?php
// Input image file path
$inputImagePath = '/Volumes/personal/stackCp/Paredes-Law-Firm/assets/img/team/team-4.png'; // Change to the path of your image

// Output image file path
$outputImagePath = '/Volumes/personal/stackCp/Paredes-Law-Firm/assets/img/team/output-3.jpg';

// New width and height for the resized image
$newWidth = 1200;
$newHeight = 1500;

// Get the image format
$imageInfo = getimagesize($inputImagePath);
$imageMimeType = $imageInfo['mime'];

// Load the original image based on its format
switch ($imageMimeType) {
    case 'image/jpeg':
        $sourceImage = imagecreatefromjpeg($inputImagePath);
        break;
    case 'image/png':
        $sourceImage = imagecreatefrompng($inputImagePath);
        break;
    case 'image/gif':
        $sourceImage = imagecreatefromgif($inputImagePath);
        break;
    default:
        die('Unsupported image format');
}

// Create a blank canvas for the resized image
$resizedImage = imagecreatetruecolor($newWidth, $newHeight);

// Resize the image
imagecopyresampled($resizedImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, imagesx($sourceImage), imagesy($sourceImage));

// Save the resized image to a file
imagejpeg($resizedImage, $outputImagePath, 90); // Save as JPEG

// Clean up resources
imagedestroy($sourceImage);
imagedestroy($resizedImage);

echo 'Image resized and saved as ' . $outputImagePath;
?>
