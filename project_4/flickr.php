<?php
    define('FLICKR_URL', 'https://api.flickr.com/services/feeds/photos_public.gne');

    $xml = simplexml_load_file(FLICKR_URL);

    foreach ($xml->entry as $entry)
    {
        //echo $entry->content;
        $atts = $entry->category->attributes();
        $tags = $atts['term'];

        print_r($tags);
    }
?>