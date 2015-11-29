<?php

function draw_graph($category_array, $width, $height, $max_value, $filename)
{
    $img = imagecreatetruecolor($width, $height);
    $bg_color = imagecolorallocate($img, 255, 255, 255);       // white
    $text_color = imagecolorallocate($img, 255, 255, 255);     // white
    $bar_color = imagecolorallocate($img, 0, 0, 0);            // black
    $border_color = imagecolorallocate($img, 192, 192, 192);   // light gray

    imagefilledrectangle($img, 0, 0, $width, $height, $bg_color);

    $bar_width = $width / ((count($category_array) * 2) + 1);
    for ($i = 0; $i < count($category_array); $i++)
    {
      imagefilledrectangle($img, ($i * $bar_width * 2) + $bar_width, $height,
        ($i * $bar_width * 2) + ($bar_width * 2), $height - (($height / $max_value) * $category_array[$i][1]), $bar_color);
      imagestringup($img, 5, ($i * $bar_width * 2) + ($bar_width), $height - 5, $category_array[$i][0], $text_color);
    }

    imagerectangle($img, 0, 0, $width - 1, $height - 1, $border_color);

    for ($i = 1; $i <= $max_value; $i++)
    {
        imagestring($img, 5, 0, $height - ($i * ($height / $max_value)), $i,
            $bar_color);
    }

    imagepng($img, $filename, 5);
    imagedestroy($img);
}

?>