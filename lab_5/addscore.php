<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Guitar Wars - Add Your High Score</title>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
  <h2>Guitar Wars - Add Your High Score</h2>

<?php
require_once('appvars.php');
require_once('connectvars.php');

if (isset($_POST['submit']))
{
    // Grab the score data from the POST
    $name = $_POST['name'];
    $score = $_POST['score'];
    $screenshot = $_FILES['screenshot']['name'];
    $image_size = $_FILES['screenshot']['size'];
    $image_type = $_FILES['screenshot']['type'];

    if (!empty($name) && !empty($score) && !empty($screenshot))
    {
        // Move the uploaded image to the images file
        $target = GW_UPLOADPATH . $screenshot;

        if ($image_size < GW_FILESIZE)
        {
            if (!($image_type == 'image/gif' || $image_type == 'image/jpeg' ||
              $image_type == 'image/pjpeg' || $image_type == 'image/png'))
            {
                echo '<p class="error">Please enter a valid image type.</p>';
            } // end of if file type validation
            else
            {
                if (move_uploaded_file($_FILES['screenshot']['tmp_name'], $target))
                {
                    // Connect to the database
                    $dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PW, DB_NAME);

                    // Write the data to the database
                    $query = "INSERT INTO uploads VALUES (0, NOW(), '$name', '$score',
                        '$screenshot')";
                    mysqli_query($dbc, $query);

                    // Confirm success with the user
                    echo '<p>Thanks for adding your new high score!</p>';
                    echo '<p><strong>Name:</strong> ' . $name . '<br />';
                    echo '<strong>Score:</strong> ' . $score . '<br />';
                    echo '<img src="' . GW_UPLOADPATH . $screenshot . '" alt="Score image" /></p>';
                    echo '<p><a href="index.php">&lt;&lt; Back to high scores</a></p>';

                    // Clear the score data to clear the form
                    $name = "";
                    $score = "";
                    $screenshot = "";

                    mysqli_close($dbc);
                } // end of if successfully moved file
                else
                {
                    echo '<p class="error">Error moving file, please try again.</p>';
                } // end of else not successful moving file

            } // end of else image type validation

        } // end of if file size
        else
        {
            echo '<p class="error">Please upload an image less than 32 KB.</p>';
        } // end of else file size

    } // end of if empty
    else
    {
        echo '<p class="error">Please enter all information.</p>';
    } // end of else empty

} // end of if submitted
?>

  <hr />
  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="MAX_FILE_SIZE" value="32768" />
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php if (!empty($name)) echo $name; ?>" /><br />
    <label for="score">Score:</label>
    <input type="text" id="score" name="score" value="<?php if (!empty($score)) echo $score; ?>" />
    <br />
    <label for="screenshot">Screenshot:</label>
    <input type="file" id="screenshot" name="screenshot" />
    <hr />
    <input type="submit" value="Add" name="submit" />
  </form>
</body>
</html>