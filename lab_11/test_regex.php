<?php
$phone_regex = "/^\(?[2-9]\d{2}\)?(\-|\s)?\d{3}(\-|\s)?\d{4}$/";
$phone_replace = "/[\(\)\-\s]/";

$email_regex = "/^.+@.+\..+$/";

if (!(preg_match($phone_regex, $phone))) : ?>
    <p class="error">Your phone number is entered incorrectedly.</p>
<?php
    $output_form = 'yes';
else :
    $phone = preg_replace($phone_replace, '', $phone);
endif;

if (!(preg_match($email_regex, $email))) : ?>
    <p class="error">Your email is entered incorrectly.</p>
<?php
    $output_form = 'yes';
endif;

?>