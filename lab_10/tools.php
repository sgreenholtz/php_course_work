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

    public function __construct($new_title, $new_price, $new_description, $new_shipper, $new_weight)
    {
        $this->title = $new_title;
        $this->price = $new_price;
        $this->shipper = $new_shipper;
        $this->weight = $new_weight;
    }

    public function upload()
    {
        $dbc = mysqli_connect('localhost', 'sgreenholtz', '', 'lab_10');
        $query = "INSERT INTO Products (Title, Price, ProductType, Description, Shipper, Weight) " .
            "VALUES ('$this->title', '$this->price', 'Tools', '$this->description', '$this->shipper', '$this->weight');";

        mysqli_query($dbc, $query) or die("Error uploading: " . $query);
        mysqli_close($dbc);
    }
}


?>