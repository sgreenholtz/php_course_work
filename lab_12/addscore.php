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
    $name = mysqli_real_escape_string($dbc, trim($_POST['name']));
    $score = mysqli_real_escape_string($dbc, trim($_POST['score']));
    $screenshot = mysqli_real_escape_string($dbc, trim($_FILES['screenshot']['name']));
    $image_size = $_FILES['screenshot']['size'];
    $image_type = $_FILES['screenshot']['type'];
    $user_captcha = sha1($_POST['captcha']);

    if ($_SESSION['passphrase'] == $user_captcha)
    {

        if (!empty($name) && !empty($score) && !empty($screenshot) &&
            is_numeric($score))
        {
            $target = GW_UPLOADPATH . $screenshot;

            if ($image_size > 0 && $image_size < GW_FILESIZE)
            {
                if (!($image_type == 'image/gif' || $image_type == 'image/jpeg' ||
                  $image_type == 'image/pjpeg' || $image_type == 'image/png'))
                { ?>
                    <p class="error">Please choose a valid image file.</p>
                <?php
                }
                else
                {
                    if (move_uploaded_file($_FILES['screenshot']['tmp_name'], $target))
                    {
                        $dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PW, DB_NAME);

                        $query = "INSERT INTO uploads (date, name, score, " .
                            "screenshot) VALUES (NOW(), '$name', '$score', " .
                            "'$screenshot')";
                        mysqli_query($dbc, $query);

                        ?>

                        <p>Thanks for adding your new high score!</p>
                        <p><strong>Name:</strong><?= $name ?><br />
                        <strong>Score:</strong><?= $score ?><br />
                        <img src="<?= GW_UPLOADPATH . $screenshot ?>" alt="Score image" /></p>
                        <p><a href="index.php">&lt;&lt; Back to high scores</a></p>

                        <?php
                        $name = "";
                        $score = "";
                        $screenshot = "";

                        mysqli_close($dbc);
                    }
                    else
                    {?>
                        <p class="error">Error moving file, please try again.</p>
                    <?php
                    }

                }

            }
            else
            { ?>
                <p class="error">Please choose an image less than 32 KB.</p>
            <?php
            }

        }
        else
        {?>
            <p class="error">Please enter all information.</p>
        <?php
        }
    }
    else
    { ?>
        <p class="error">Please enter the captcha text correctly.</p>
    <?php
    }

}
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

    <label for="captcha">Type letters shown:</label>
    <input type="text" id="captcha" name="captcha" />
    <img src="captcha.php" alt="Captcha Phrase" />

    <hr />
    <input type="submit" value="Add" name="submit" />
  </form>
</body>
</html>