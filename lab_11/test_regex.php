<?php
$phone_regex = "/^\(?[2-9]\d{2}\)?[\-\s]?\d{3}[\-\s]?\d{4}$/";
$phone_replace = "/[\(\)\-\s]/";

$email_regex = "/[a-zA-Z0-9]+\w*@\w+\.\w+/";
$domain_check_replace = "/^\w+@/";

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
else :
    $domain = preg_replace($domain_check_replace, '', $email);
    if (!(checkdnsrr($domain))) : ?>
        <p class="error">Your email is invalid.</p>
    <?php
        $output_form = 'yes';
    endif;
endif;

?>