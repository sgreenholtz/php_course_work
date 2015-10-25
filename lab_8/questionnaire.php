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

    $select_response_query = "SELECT * FROM mismatch_response " .
        "WHERE user_id = '" . $_SESSION['user_id'] . "'";
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

            mysqli_query($dbc, $insert_blanks_query);

        }
    }

    if (isset($_POST['Submit']))
    {
        foreach($_POST as $response_id => $response)
        {
            if ($response_id != "Submit")
            {
                $insert_answers_query = "UPDATE mismatch_response SET response = " .
                    "$response WHERE response_id = $response_id";

                mysqli_query($dbc, $insert_answers_query)
                    or die("Failed to update data.");
            }
        }
        ?>
        <p>Your responses have been saved.</p>
    <?php
    }

    $topic_query = "SELECT response_id, response, topic_name, " .
            "category_name FROM mismatch_response LEFT JOIN mismatch_topic " .
            "ON mismatch_response.topic_id = mismatch_topic.topic_id " .
            "LEFT JOIN mismatch_category " .
            "ON mismatch_topic.category_id = mismatch_category.category_id " .
            "WHERE user_id= '" . $_SESSION['user_id'] . "'";

    $topic_data = mysqli_query($dbc, $topic_query)
        or die("Error in query: " . $topic_query);

    $responses = array();

    while ($row = mysqli_fetch_array($topic_data))
    {
        $result_row = array(
            'response_id'=>$row['response_id'],
            'response'=>$row['response'],
            'topic_name'=>$row['topic_name'],
            'category_name'=>$row['category_name']
            );

        array_push($responses, $result_row);
    }

    mysqli_close($dbc);
?>

<form method="post" action="<?= $_SERVER['PHP_SELF'] ?>" />
    <p>How do you feel about each topic?</p>

    <fieldset>
        <legend><?= $responses[0]['category_name'] ?></legend>

    <?php
    $i = 0;

    while ($i < count($responses))
    {
        if ($responses[$i]['category_name'] != $responses[$i-1]['category_name']
            && $i != 0)
        {
    ?>
        </fieldset>
        <fieldset>
            <legend><?= $responses[$i]['category_name'] ?></legend>
        <?php
        }
        ?>
        <label for="<?= $responses[$i]['response_id'] ?>">
            <?= $responses[$i]['topic_name'] ?>
        </label>

        <input type="radio" name="<?= $responses[$i]['response_id'] ?>" value="1"
            <?php if ($responses[$i]['response'] == 1) { ?>  checked="checked" <?php } ?>
            />Love
        <input type="radio" name="<?= $responses[$i]['response_id'] ?>" value="2"
            <?php if ($responses[$i]['response'] == 2) { ?>  checked="checked" <?php } ?>
            />Hate<br />
    <?php
        $i++;
    }
    ?>

    </fieldset>
    <input type="submit" value="Save Questionnaire" name="Submit" />
</form>


<?php
    require_once('footer.php');
?>