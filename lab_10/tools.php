<?php
class Tools extends Product
{
    private $shipper;
    private $weight;

    public function getShipper()
    {
        return $this->shipper;
    }

    public function setShipper($new_shipper)
    {
        $this->shipper = $new_shipper;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($new_weight)
    {
        $this->weight = $new_weight;
    }
}


?>