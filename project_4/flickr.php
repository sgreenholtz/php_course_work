<?php
    define('FLICKR_URL', 'https://api.flickr.com/services/feeds/photos_public.gne');

    $xml = simplexml_load_file(FLICKR_URL);

    foreach ($xml->entry as $entry)
    {

        $atts = $entry->category->attributes();
        $tags = $atts['term'];

        if ($tags[0] != '')
        {
            echo $entry->content;
        }

    }
?>