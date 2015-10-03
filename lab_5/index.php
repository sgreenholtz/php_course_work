<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Guitar Wars - High Scores</title>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
  <h2>Guitar Wars - High Scores</h2>
  <p>Welcome, Guitar Warrior, do you have what it takes to crack the high score list? If so, just <a href="addscore.php">add your own score</a>.</p>
  <hr />

<?php
  require_once('appvars.php');
  $upload_path = 'images/';

  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PW, DB_NAME)
    or die('Error connecting to the database.');

  // Retrieve the score data from MySQL
  $query = "SELECT * FROM uploads";
  $data = mysqli_query($dbc, $query);

  // Loop through the array of score data, formatting it as HTML
  echo '<table>';
  while ($row = mysqli_fetch_array($data))
  {
    // Display the score data
    echo '<tr><td class="scoreinfo">';
    echo '<span class="score">' . $row['score'] . '</span><br />';
    echo '<strong>Name:</strong> ' . $row['name'] . '<br />';
    echo '<strong>Date:</strong> ' . $row['date'] . '</td>';
    echo '<td><img src="' . $upload_path . $row['screenshot'] . '" alt="Image" /></td></tr>';


  /*
    if (is_file(GW_FILEPATH . $row['screenshot']) &&
      filesize(GW_FILEPATH . $row['screenshot']) > 0)
    {
      echo '<td><img src="' . GW_FILEPATH . $row['screenshot'] .
        '" alt="Score image" /></td></tr>';
    }

    else
    {
      echo '<td><img src="' . GW_FILEPATH .
        'unverified.gif" alt="Unverified score" /></td></tr>';
    }
    */
  }
  echo '</table>';

  mysqli_close($dbc);
?>

</body>
</html>
