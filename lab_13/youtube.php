<?php
    define('YOUTUBE_URL', 'https://www.youtube.com/feeds/videos.xml?user=aliensabductedme');
    define('NUM_VIDEOS', 5);

    $xml = simplexml_load_file(YOUTUBE_URL);

    $num_videos_found = count($xml->entry);

    if ($num_videos_found > 0)
    {
    ?>
        <table><tr>
    <?php
    for ($i = 0; $i < min($num_videos_found, NUM_VIDEOS); $i++)
    {
        $entry = $xml->entry[$i];
        $media = $entry->children('http://search.yahoo.com/mrss/');
        $title = $media->group->title;

        $yt = $media->children('http://gdata.youtube.com/schemas/2007');
        //$attrs = $yt->duration->attributes();
        //$length_min = floor($attrs['seconds'] / 60);
        //$length_sec = $attrs['seconds'] % 60;
        //$length_formatted = $length_min . (($length_min != 1) ? ' minutes, ':' minute, ') .
        //$length_sec . (($length_sec != 1) ? ' seconds':' second');

        $attrs = $entry->link->attributes();
        $video_url = $attrs['href'];

        $attrs = $media->group->thumbnail[0]->attributes();
        $thumbnail_url = $attrs['url'];

        $attrs = $entry->link->attributes();
        $updated_date = $attrs['updated'];

        ?>
        <td style="vertical-align:bottom; text-align:center" width="
            <?= (100 / NUM_VIDEOS) ?>%"><a href="<?= $video_url ?>">
            <?= $title ?><br /><span style="font-size:smaller">
            <?= $updated_date ?></span><br /><img src="
            <?= $thumbnail_url ?>" /></a></td>
        <?php
        }
        ?>
    </tr></table>
    <?php
    }
    else
    {
    ?>
    <p>Sorry, no videos were found.</p>
<?php
    }
?>
