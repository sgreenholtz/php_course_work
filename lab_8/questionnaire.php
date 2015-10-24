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

$create_form_query = "SELECT response_id, topic_id, response " .
    "FROM mismatch_reponse WEHRE user_id = '" . $_SESSION['user_id'] . "'";

$data_for_form = mysqli_query($dbc, $create_form_query);
$responses = array();

while ($select_row = mysqli_fetch_array($data_for_form))
{
    $topic_query = "SELECT name, category FROM mismatch_topic " .
        "WHERE topic_id = '" . $row['topic_id'] . "'";
    $topic_data = mysqli_query($dbc, $topic_query);

    if (mysqli_num_rows($topic_data) == 1)
    {
        $topic_row = mysqli_fetch_array($topic_data);

        $select_row['topic_name'] = $topic_row['name'];
        $select_row['category_name'] = $topic_row['category'];
        array_push($responses, $select_row);
    }
}

mysqli_close();
?>

<form method="post" action="<?= $_SERVER['PHP_SELF'] ?>" />
    <p>How do you feel about each topic?</p>

    <?php $category = $response[0]['category_name']; ?>

    <fieldset>
        <legend><?= $category ?></legend>

    <?php
    foreach ($responses as $response)
    {
        if ($category != $response['category_name'])
        {
    ?>
        </fieldset>
        <fieldset>
            <legend><?= $response['category_name'] ?></legend>
        <?php
        }
        ?>
        <label <?php if ($response['response'] == NULL) { ?> class="error"
            <?php } ?> for="<?= $response['response_id'] ?>">
            <?= $response['topic_name'] ?>
        </label>

        <input type="radio" name="<?= $response['response_id'] ?>" value="1"
            <?php if ($response['response'] == 1) { ?>  checked="checked" <?php } ?>
            />Love
        <input type="radio" name="<?= $response['response_id'] ?>" value="2"
            <?php if ($response['response'] == 2) { ?>  checked="checked" <?php } ?>
            />Hate<br />
    <?php
    }
    ?>

    </fieldset>
    <input type="submit" value="Save Questionnaire" name="Submit" />;
</form>




<?php
    require_once('footer.php');
?>