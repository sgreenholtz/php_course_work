<?php

    $noun = $_POST['noun'];
    $adjective = $_POST['adjective'];
    $adverb = $_POST['adverb'];
    $verb = $_POST['verb'];
    
    
    echo "Once there was a $adjective $noun from Texas that liked to " .
        "$adverb $verb anyone passing by."
?>

<form action="<?php $_SERVER[SELF_PHP] ?>" method="post">
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