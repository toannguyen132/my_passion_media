<?php
/**
 * candidate: Toan Nguyen
 * email: n.minhtoan
 */
/*

Using PHP's GD Image primatives (squares, circles, lines) draw any image you'd like.

*/

// set response as a png image
header("Content-type: image/png");

// create image resource
$image = imagecreate(500, 500);

// set background color to white
imagecolorallocate($image, 255, 255, 255);

// set some color
$black = imagecolorallocate($image, 0, 0, 0);
$red = imagecolorallocate($image, 255, 0, 0);

// draw a rectangle
$rec = imagerectangle($image, 100, 100, 200, 200, $black);

// draw a polygon
$vertices = [
  350, 100,
  400, 200,
  300, 200
];
$rec = imagefilledpolygon($image, $vertices, 3, $red);

// process image
imagepng($image);

// descript resource
imagedestroy($im);