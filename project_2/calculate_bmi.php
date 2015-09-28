<!DOCTYPE html>
<html>
    <head>
        <title>Calculate Your BMI</title>
        <link href="css/calculate_bmi.css" rel="stylesheet" />
    </head>

    <body>
        <div class="container">
            <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">

                <label for="weight">Enter your weight (lbs): </label>
                <input type="text" name="weight" /><br />

                <label for="height">Enter your height (in): </label>
                <input type="text" name="height" /><br />

                <input type="submit" name="Submit" />

            </form>

            <div class="line">
                <hr />
            </div>

            <?php

                if (isset($_POST['Submit']))
                {
                    $weight = $_POST['weight'];
                    $height = $_POST['height'];

                    if (($weight == 0) || ($height == 0))
                    {
                        echo "Please enter values for height and weight.";
                    }
                    else
                    {
                        $bmi = ($weight / ($height * $height)) * 703;
                        echo "Your BMI is " . $bmi;

                        if ($bmi < 18.5) : ?>
                            <div class="message">
                                You are underweight. You might want to consider
                                consulting your doctor.
                            </div>
                        <?php elseif ($bmi < 25) : ?>
                            <div class="message">
                                You are at a health weight. Continue eating right
                                and exercising regularly.
                            </div>
                        <?php else : ?>
                            <div class="message">
                                You are overweight. You might want to consider
                                consulting your doctor.
                            </div>
                        <?php endif;
                    }
                }
            ?>
        </div>

    </body>
</html>