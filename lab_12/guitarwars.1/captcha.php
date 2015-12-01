<?php
    session_start();
    define('CAPTCHA_WIDTH', 100);
    define('CAPTCHA_HEIGHT', 25);

    $img = imagecreatetruecolor(CAPTCHA_WIDTH, CAPTCHA_HEIGHT);
    $bg_color = imagecolorallocate($img, 225, 255, 255);
    $text_color = imagecolorallocate($img, 0, 0, 0);
    $graphic_color = imagecolorallocate($img, 143, 143, 143);

    $passphrase = "";
    for ($i=0; $i<7; $i++)
    {
        $passphrase .= chr(rand(97, 122));
    }

    $_SESSION['passphrase'] = $passphrase;

    imagefilledrectangle($img, 0, 0, CAPTCHA_WIDTH, CAPTCHA_HEIGHT, $bg_color);

    for ($i=0; $i<5; $i++)
    {
        imageline($img, 0, rand() % CAPTCHA_HEIGHT, CAPTCHA_WIDTH,
            rand() % CAPTCHA_HEIGHT, $graphic_color);
    }

    for ($i=0; $i<50; $i++)
    {
        imagesetpixel($img, rand() % CAPTCHA_HEIGHT,
            rand() % CAPTCHA_HEIGHT, $graphic_color);
    }

    imagettftext($img, 18, 0, 0, 20, $text_color, './Courier New Bold.ttf', $passphrase);

    header("Content-type: image/png");
    imagepng($img);
    imagedestroy($img);

?>