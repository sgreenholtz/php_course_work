<?php
    include('header.php');
    require_once('connectvars.php');

    $dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $query = "SELECT * FROM chapters ORDER BY id ;";
    $result = mysqli_query($dbc, $query);

    if (!$result)
    {
        exit("Database query error: [[$query]]" . mysql_error($dbc));
    }
?>

<div class="container">
    <?php while ($record = mysqli_fetch_assoc($result)) { ?>
    <div class="col-md-12">
        <div class="well">
            <h3><?= $record['ID'] ?></h3>
            <p><?= $record['ChapterText'] ?></p>
            <p class="label label-info">Posted: <?= $record['DatePosted'] ?></p>
        </div>
    </div>
    <?php } ?>
</div>

<?php include('footer.php'); ?>