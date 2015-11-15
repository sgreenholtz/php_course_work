<?php

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

        $myProduct = new Tool($title, $price, $description, $shipper, $weight);
    }
    else if ($type == "Electronics")
    {
        $recyclable = $_POST['recyclable'];

        $myProduct = new Electronics($title, $price, $description, $recyclable);
    }
    else
    {
        $myProduct = new Product($title, $price, $description);
    }

    $myProduct->upload;
}

?>