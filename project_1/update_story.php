<!DOCTYPE html>
<html>
    
    <head>
        <title>Mad Libs Game!</title>
        <link href="css/index.css" rel="stylesheet" />
    </head>
    
    <body>
    
        <div class="container"> 
            <h2>Enter words to complete the story!</h2>
        
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <label for="noun">Enter a noun: </label>
                <input name="noun" type="text" /> <br />
                        
                <label for="verb">Enter a verb (present tense): </label>
                <input name="verb" type="text" /><br />
                        
                <label for="adjective">Enter an adjective: </label>
                <input name="adjective" type="text" /><br />
                        
                <label for="adverb">Enter an adverb: </label>
                <input name="adverb" type="text" /><br />
                
                <div class="submit">  
                    <input type="submit" name="Submit" />
                </div>
            </form>
            
            <div class="line">
                <hr />
            </div>
        
            <?php
                    $noun = $_POST['noun'];
                    $adjective = $_POST['adjective'];
                    $adverb = $_POST['adverb'];
                    $verb = $_POST['verb'];
                    
                    $dbc = mysqli_connect("localhost", "sgreenholtz", "", "project_1");
                    $insert_query = "INSERT INTO story (noun,verb,adjective," .
                        "adverb) VALUES ('$noun','$verb','$adjective','$adverb')";
                    $select_query = "SELECT * FROM story ORDER BY id ASC";
                    $inserted = mysqli_query($dbc, $insert_query);
                    $selected = mysqli_query($dbc, $select_query);
                    
                    if (isset($_POST['Submit']))
                    {
                        if ((empty($noun)) || (empty($adjective)) || 
                            (empty($adverb)) || (empty($verb)))
                        {
                            echo "Please enter all values";
                        }
                        if ($inserted)
                            {
                                include('story_table.php');
                            }
                        else
                        {
                            echo "Failed to update story in the database.";
                                
                        } // end of else insert
                    } // end of if isset Submit
                    else
                    {
                        include('story_table.php');
                    }
                
                
            ?>
        </div>
        
    </body>
</html>