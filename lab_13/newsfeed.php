<?php header('Content-Type: text/xml'); ?>
<?php echo '<?xml version="1.0" encoding="utf-8"?>' ?>
<rss version="2.0">
    <channel>
        <title>Aliens Abducted Me - Newsfeed</title>
        <link>http://aliensabductedme.com/</link>
        <description>
            Alien abduction reports from around the world courtesy of Owen and
            his abducted dog Fang.
        </description>
        <language>en-us</language>

<?php
    require_once('connectvars.php');

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $query = "SELECT abduction_id, first_name, last_name, " .
        "DATE_FORMAT(when_it_happened,'%a, %d %b %Y %T') AS when_it_happened_rfc, " .
        "alien_description, what_they_did " .
        "FROM aliens_abduction " .
        "ORDER BY when_it_happened DESC";
    $sightings = mysqli_query($dbc, $query);

    while ($report = mysqli_fetch_array($sightings))
    {
    ?>
        <item>
            <title><?= $report['first_name'] ?> <?= $report['last_name'] ?> - <?= substr($report['alien_description'], 0, 32) ?>...</title>
            <link>http://www.aliensabductedme.com/index.php?abduction_id=<?= $report['abduction_id'] ?></link>
            <pubDate><?= $report['when_it_happened_rfc'] ?> <?= date('T') ?></pubDate>
            <description><?= $report['what_they_did'] ?></description>
        </item>
    <?php
    }
?>

    </channel>
</rss>
