<?php
// The file
$filename = '/home/content/S/a/u/Sausageman/html' . $_GET['img'];

// Set a maximum height and width
if ( array_key_exists('width', $_GET) ) $width = $_GET['width'];
else $width = 100;
if ( array_key_exists('height', $_GET) ) $height = $_GET['height'];
else $height = 100;

// Get new dimensions
$img_info = getimagesize($filename);
list($width_orig, $height_orig) = $img_info;
$img_type = $img_info[2];

if ( ($width_orig < $width) && ($height_orig < $height) ) {
	$width = $width_orig;
	$height = $height_orig;
}
elseif ($width && ($width_orig < $height_orig)) {
   $width = ($height / $height_orig) * $width_orig;
}
else {
   $height = ($width / $width_orig) * $height_orig;
}

// Cropping
if ($width_orig > $height_orig) {
	// Get crop height
	$height_crop = $height_orig;
	$width_crop = $height_orig;
}
else {
	$height_crop = $width_orig;
	$width_crop = $width_orig;
}

// Resample
$image_p = imagecreatetruecolor($width, $height);
if ($img_type == IMAGETYPE_JPEG) $image = imagecreatefromjpeg($filename);
elseif ($img_type == IMAGETYPE_GIF) $image = imagecreatefromgif($filename);
elseif ($img_type == IMAGETYPE_PNG) $image = imagecreatefrompng($filename);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_crop, $height_crop);

// Content type
header('Content-type: image/jpeg');
// Output
imagejpeg($image_p, null, 80);
exit;
?>