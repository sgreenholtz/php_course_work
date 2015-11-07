<?php

class Madlib
{
    private $noun;
    private $verb;
    private $adjective;
    private $adverb;
    private $story;

    public function getNoun()
    {
        return $this->noun;
    }

    public function getVerb()
    {
        return $this->verb;
    }

    public function getAdjective()
    {
        return $this->adjective;
    }

    public function getAdverb()
    {
        return $this->adverb;
    }

    public function getStory()
    {
        return $this->story;
    }

    public function setNoun($new_noun)
    {
        $this->noun = $new_noun;
    }

    public function setVerb($new_verb)
    {
        $this->verb = $new_verb;
    }

    public function setAdjective($new_adjective)
    {
        $this->adjective = $new_adjective;
    }

    public function setAdverb($new_adverb)
    {
        $this->adverb = $new_adverb;
    }

    public function uploadStory()
    {
        // put story into the database
    }

    public function createStory()
    {
        if ((!(empty($this->noun))) && (!(empty($this->adjective))) &&
            (!(empty($this->adverb))) && (!(empty($this->verb))))
        {
            $this->story = "Once there was a " . $this->getAdjective() . " " .
                            $this->getNoun() . " from Texas who like to " .
                            $this->getAdverb() . " " . $this->getVerb() .
                            " anyone passing by.";

            $this->uploadStory();
        }
        else
        {
            echo "Please enter all values.";
        }
    }

}

?>