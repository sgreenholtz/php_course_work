<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Mad Libs Game!</title>
        <link href="index.css" rel="stylesheet" />
    </head>
    
    <body>
        
        <?php
            
        
    
        ?>
        
        <form enctype="multipart/form-data" action="update_story.php" method="post" role="form">
            <label for="noun">Enter a noun: </label>
            <input name="noun" type="text" /> <br />
            
            <label for="verb">Enter a verb (present tense): </label>
            <input name="verb" type="text" /><br />
            
            <label for="adjective">Enter an adjective: </label>
            <input name="adjective" type="text" /><br />
            
            <label for="adverb">Enter an adverb: </label>
            <input name="adverb" type="text" /><br />
            
            <input type="submit" name="Submit" />
        </form>
    </body>
</html>