<?php

    while ($row = mysqli_fetch_assoc($selected))
    {
        echo $row["adjective"];
        echo $row["noun"];
        echo $row["verb"];
        echo $row["adverb"];
        ?> <br /> <br /> <?php
    }

?>