<?php

// verrification code script.
require("../safe/safe.php");

if($set_value_button){$button_value = $digit;}

$image = imagecreate(120, 30);

$white    = imagecolorallocate($image, 0x41, 0x41, 0x41);
$gray    = imagecolorallocate($image, 0x66, 0x66, 0x66);
$darkgray = imagecolorallocate($image, 0xFF, 0x99, 0x00);

srand((double)microtime()*1000000);

for ($i = 0; $i < 30; $i++) {
  $x1 = rand(0,120);
  $y1 = rand(0,30);
  $x2 = rand(0,120);
  $y2 = rand(0,30);
  imageline($image, $x1, $y1, $x2, $y2 , $gray);  
}

imagestring($image, 10, rand(15 , 60), rand(7 , 12), $button_value , $darkgray); 

header('Content-type: image/png');
imagepng($image);
imagedestroy($image);
  
?> 

