<?php
    require_once('startsession.php');
    $page_title = "Where Opposites Attract";
    require_once('header.php');
    require_once('navigation.php');
    require_once('appvars.php');
    require_once('connectvars.php');

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $query = "SELECT user_id, first_name, picture FROM mismatch_user WHERE " .
        "first_name IS NOT NULL ORDER BY join_date DESC LIMIT 5";
    $data = mysqli_query($dbc, $query);
?>

    <h4>Latest members:</h4>
    <table>

<?php
    while ($row = mysqli_fetch_array($data))
    {
        if (is_file(MM_UPLOADPATH . $row['picture']) && filesize(MM_UPLOADPATH . $row['picture']) > 0)
        { ?>
            <tr><td><img src="<?= MM_UPLOADPATH . $row['picture'] ?>" alt="<?= $row['first_name'] ?>" /></td>
        <?php }
        else
        { ?>
            <tr><td><img src="<?= MM_UPLOADPATH ?>nopic.jpg" alt="<?= $row['first_name'] ?>" /></td>
        <?php } ?>
       <td><?= $row['first_name'] ?></td></tr>
    <?php  }?>

    </table>

<?php
    mysqli_close($dbc);
    require_once('footer.php');
?>
