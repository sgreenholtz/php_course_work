<!DOCTYPE html>
<html>
    <head>
        <title>Calculate Your BMI</title>
    </head>

    <body>

        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">

            <label for="weight">Enter your weight: </label>
            <input type="text" name="weight" /><br />

            <label for="height">Enter your height: </label>
            <input type="text" name="height" />

            <input type="submit" name="Submit" />

        </form>

        <?php

            $weight = $_POST['weight'];
            $height = $_POST['height'];

            $bmi = ($weight / ($height × $height)) * 703;
            echo $bmi;
        ?>
    </body>
</html>

