<?php

require_once("recaptchalib.php");

$secret = "6Le5GRITAAAAACBRRMXVTIBbTzdbez5tUVOe6icy";

$reCaptcha = new ReCaptcha($secret);

$response = null;

if (isset($_POST["g-recaptcha-response"]) && !empty($_POST["g-recaptcha-response"]))
{
    $response = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"], $_POST["g-recaptcha-response"]);
}
else
{
    header('Location: index.php');
}

if ($response != null && $response->success)
{
    echo "Hi " . $_POST["name"] . " (" . $_POST["email"] . "), thanks for submitting the form!";
}
else
{
    header('Location: index.php');
}




?>