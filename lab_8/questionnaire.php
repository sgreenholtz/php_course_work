<?php
    require_once('startsession.php');
    $page_title = 'Questionnaire';
    require_once('header.php');
    require_once('appvars.php');
    require_once('connectvars.php');

    if (!isset($_SESSION['user_id'])) : ?>
        <p class="login">Please <a href="login.php">log in</a> to access this page.</p>
    <?php exit();
    endif;

    require_once('navmenu.php');

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $select_response_query = "SELECT * FROM mismatch_reponse WEHRE user_id = '" .
        $_SESSION['user_id'] . "'";
    $response_data = mysqli_query($dbc, $select_response_query);

    if (mysqli_num_rows($response_data) == 0)
    {
        $topics_selet_query = "SELECT topic_id FROM mismatch_topic ORDER BY " .
            "category_id, topic_id";
        $topics_data = mysqli_query($dbc, $topics_selet_query);
        $topicIDs = array();

        while ($row = mysqli_fetch_array($topics_data))
        {
            array_push($topicIDs, $row['topic_ID']);
        }

        foreach ($topicIDs as $topic_id)
        {
            $insert_blanks_query = "INSERT INTO mismatch_reponse " .
                "(user_id, topic_id) VALUES (" . $_SESSION['user_id'] . ", " .
                "$topic_id)";

            mysqli_query($dbc, $insert_blanks_query) or
                die("Error inserting answers");

        }
    }

    if (isset($_POST['Submit']))
    {
        foreach($_POST as $response_id)
        {
            $insert_answers_query = "UPDATE mismatch_reponse SET response = " .
                "$response WHERE response_id = $response_id";

            mysqli_query($dbc, $insert_answers_query);
        }
        ?>
        <p>Your responses have been saved.</p>
    <?php
    }

?>

<?php
    require_once('footer.php');
?>
