<?php
    include('header.php');
    require_once('connectvars.php');

    $dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $query = "SELECT * FROM posts ORDER BY id DESC;";
    $result = mysqli_query($dbc, $query);
    if (!$result) {
        exit("Database query error: [[$query]]" . mysql_error($dbc));
    }
?>

    <?php while ($record = mysqli_fetch_assoc($result)) { ?>

    <div class="content">
        <p><?= $record['Title'] ?></p>
        <p><?= $record['BlogPost'] ?></p>
    </div>

    <?php } ?>

<?php
    include('footer.php');
?>