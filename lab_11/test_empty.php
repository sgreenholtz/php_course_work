<?php
if (empty($first_name)) : ?>
    <p class="error">You forgot to enter your first name.</p>
<?php
    $output_form = 'yes';
endif;

if (empty($last_name)) : ?>
    <p class="error">You forgot to enter your last name.</p>
<?php
    $output_form = 'yes';
endif;

if (empty($email)) : ?>
    <p class="error">You forgot to enter your email address.</p>
<?php
    $output_form = 'yes';
endif;

if (empty($phone)) : ?>
    <p class="error">You forgot to enter your phone number.</p>
<?php
    $output_form = 'yes';
endif;

if (empty($job)) : ?>
    <p class="error">You forgot to enter your job preference.</p>
<?php
    $output_form = 'yes';
endif;

if (empty($resume)) : ?>
    <p class="error">You forgot to enter your resume.</p>
<?php
    $output_form = 'yes';
endif;

?>