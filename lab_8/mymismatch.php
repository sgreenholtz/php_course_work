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

    $query = "SELECT mr.response_id, mr.topic_id, mr.response, mt.topic_name " .
        "AS topic_name FROM mismatch_response AS mr " .
        "INNER JOIN mismatch_topic AS mt " .
        "USING (topic_id) " .
        "WHERE mr.user_id = '" . $_SESSION['user_id'] . "'";

    $data = mysqli_query($dbc, $query);

    $user_responses = array();

    while ($row = mysqli_fetch_array($data))
    {
        array_push($user_responses, $row);
    }

    $mismatch_score = 0;
    $mismatch_user_id = -1;
    $mismatch_topics = array();

    $query = "SELECT user_id FROM mismatch_user " .
        "WHERE user_id != '" . $_SESSION['user_id'] . "'";
    $data = mysqli_query($dbc, $query);

    while ($row = mysqli_fetch_array($data))
    {
        $select_response_query = "SELECT response_id, topic_id, response " .
            "FROM mismatch_response WHERE user_id = '" . $row['user_id'] . "'";
        $response_data = mysqli_query($dbc, $select_response_query);
        $mismatch_responses = array();
        while ($response = mysqli_fetch_array($response_data))
        {
            array_push($mismatch_responses, $response);
        }
    }

    for ($i = 0; $i < count($user_responses); $i++)
    {
        if (((int)$user_responses[$i]['response']) +
            ((int)$mismatch_responses[$i]['response']) == 3)
        {
            $score += 1;
            array_push($topics, $user_responses[$i]['topic_name']);
        }
    }

    if ($score > $mismatch_score)
    {
        $mismatch_score = $score;
        $mismatch_user_id = $row['user_id'];
        $mismatch_topics = array_slice($topics, 0);
    }

    if ($mismatch_user_id != -1)
    {
        $user_select_query = "SELECT username, first_name, last_name, " .
            "city, state, picture FROM mismatch_user " .
            "WHERE user_id = '$mismatch_user_id'";

        $user_select_data = mysqli_query($dbc, $user_select_query);

        if (mysqli_num_rows($user_select_data) == 1)
        {
            $user = mysqli_fetch_array($user_select_data);
            ?>
            <table>
                <tr>
                    <td class="label">
                        <?php
                        if (!empty($user['first_name']) &&
                                !empty($user['last_name']))
                        {
                        ?>
                            <?= $user['first_name'] ?> <?= $user['last_name'] ?>
                            <br />
                        <?php
                        }
                        if (!empty($user['city']) && !empty($user['state']))
                        {
                        ?>
                            <?= $user['city'] ?>, <?= $user['state'] ?>
                        <?php
                        }
                        ?>
                    </td>
                    <td>
                       <?php
                        if (!empty($user['picture']))
                        {
                        ?>
                            <img src="<?= MM_UPLOADPATH . $user['picture'] ?>"
                                alt="Profile Picture" /><br />
                        <?php
                        }
                        ?>
                    </td>
                </tr>
            </table>

            <h4>You are mismatch on the following <?= count($mismatch_topics) ?> topics:</h4>
        <?php
            foreach ($mismatch_topics as $topic)
            {
                echo $topic . "<br />";
            }
        ?>
            <h4>View <a href=viewprofile.php?user_id='<?= $mismatch_user_id
                ?>'><?= $user['first_name'] ?>'s profile</a>.</h4>
        <?php
        }
    }

?>
    <p>You must first <a href="questionnaire.php">answer the questionnaire</a> before you can be mismatched.</p>
<?php
    require_once('footer.php');
?>
