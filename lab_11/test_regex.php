<?php
$phone_regex = "/^\(?[2-9]\d{2}\)?(\-|\s)?\d{3}(\-|\s)?\d{4}$/";
$phone_replace = "/[\(\)\-\s]/";

if (!(preg_match($phone_regex, $phone))) : ?>
    <p class="error">Your phone number is entered incorrectedly.</p>
    <p><?= $phone ?></p>
<?php
    $output_form = 'yes';
else :
    $phone = preg_replace($phone_replace_regex, '', $phone);
endif;

?>