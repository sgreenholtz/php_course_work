<?php
    $delete_query = "DELETE FROM story";
    mysqli_query($dbc, $delete_query);
    echo "Old stories deleted.";
?>