<?php
    define('FLICKR_URL', 'https://api.flickr.com/services/feeds/photos_public.gne');
    $xml = simplexml_load_file(FLICKR_URL);
    $max_photos = count($xml->entry);

    foreach ($xml->entry as $entry)
    {
    ?>
        <div class="col-md-4">
            <div class="well">
                <p><?php echo $entry->content; ?></p>
            </div>
        </div>
    <?php
    }
?>

