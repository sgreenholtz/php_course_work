<?php
    // Define database connection variables
    define("DB_HOST", "localhost");
    define("DB_USERNAME", "sgreenholtz");
    define("DB_PW", "");
    define("DB_NAME", "guitarwars");

    $dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PW, DB_NAME);
?>