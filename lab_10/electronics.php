<?php
class Electronics extends Product
{
    private $recyclable;

    public function getRecyclable()
    {
        return $this->recyclable;
    }

    public function setRecyclable($is_recyclable)
    {
        $this->recyclable = $is_recyclable;
    }
}

?>