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

    public function __construct($new_title, $new_price, $new_description, $is_recyclable)
    {
        $this->title = $new_title;
        $this->price = $new_price;
        $this->description = $new_description;
        $this->recyclable = $is_recyclable;
    }

    public function upload()
    {
        $dbc = mysqli_connect('localhost', 'sgreenholtz', '', 'lab_10');
        $query = "INSERT INTO Products (Title, Price, ProductType, Description, IsRecyclable) " .
            "VALUES ('$this->title', '$this->price', 'Electronics', '$this->description', '$this->recyclable');";

        mysqli_query($dbc, $query) or die("Error uploading: " . $query);
        mysqli_close($dbc);
    }
}

?>