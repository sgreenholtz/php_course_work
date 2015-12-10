<?php
    define('FLICKR_URL', 'https://api.flickr.com/services/feeds/photos_public.gne');
    $xml = simplexml_load_file(FLICKR_URL);
    $max_photos = count($xml->entry);

    foreach ($xml->entry as $entry)
    {
        echo $entry->content;
    }
?>