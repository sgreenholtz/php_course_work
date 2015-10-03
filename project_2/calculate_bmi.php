<!DOCTYPE html>
<html>
    <head>
        <title>Calculate Your BMI</title>
        <link href="css/calculate_bmi.css" rel="stylesheet" />
    </head>

    <body>
        <div class="container">

            <h1>Calculate Your Body Mass Index</h1>

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
                ?>
                        <div class="error">
                            Please enter values for height and weight.
                        </div>
                <?php
                    }
                    else
                    {
                        $bmi = round((($weight / ($height * $height)) * 703), 2);
                    ?>

                        <div class="message">
                            You entered: <span class="entered"><?= $weight ?> lbs</span>
                            and <span class="entered"><?= $height ?> inches</span>.
                            <br />
                            Your BMI is <span class="entered"><?= $bmi ?></span>.
                        </div>
                        <br />

                    <?php
                        if ($bmi < 18.5) : ?>
                            <div class="message">
                                You are <span class="weight">underweight</span>.
                                <br />You might want to consider consulting your
                                doctor.
                            </div>
                        <?php elseif ($bmi < 25) : ?>
                            <div class="message">
                                You are at a <span class="weight">healthy weight
                                </span>. Congratulations! <br />Continue eating
                                right and exercising regularly.
                            </div>
                        <?php else : ?>
                            <div class="message">
                                You are <span class="weight">overweight</span>.
                                <br />You might want to consider consulting your
                                doctor.
                            </div>
                        <?php endif;
                    }
                }
            ?>
        </div>

    </body>
</html>