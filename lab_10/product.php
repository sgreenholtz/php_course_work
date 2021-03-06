<?php
class Product
{
    protected $title;
    protected $description;
    protected $price;

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($new_title)
    {
        $this->title = $new_title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($new_description)
    {
        $this->description = $new_description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($new_price)
    {
        $this->price = $new_price;
    }

    public function __construct($new_title, $new_price, $new_description)
    {
        $this->title = $new_title;
        $this->price = $new_price;
        $this->description = $new_description;
    }

    public function upload()
    {
        $dbc = mysqli_connect('localhost', 'sgreenholtz', '', 'lab_10');
        $query = "INSERT INTO Products (Title, Price, ProductType, Description) " .
            "VALUES ('$this->title', '$this->price', 'Products', '$this->description')";

        mysqli_query($dbc, $query) or die("Error uploading: " . $query);
        mysqli_close($dbc);
    }
}



?>