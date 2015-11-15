<?php
require_once('product.php');
require_once('electronics.php');
require_once('tools.php');

if (isset($_POST['submit']))
{
    $type = $_POST['type'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    if ($type == "Tools")
    {
        $weight = $_POST['weight'];
        $shipper = $_POST['shipper'];

        $myProduct = new Tools($title, $price, $description, $shipper, $weight);
    }
    else if ($type == "Electronics")
    {
        $recyclable = $_POST['recyclable'];
        if ($recyclable == "yes")
        {
            $recyclable = 1;
        }
        else
        {
            $recyclable = 0;
        }

        $myProduct = new Electronics($title, $price, $description, $recyclable);
    }
    else
    {
        $myProduct = new Product($title, $price, $description);
    }

    $myProduct->upload();
    header('Location: allProducts.php');

}

?>