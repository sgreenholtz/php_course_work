<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add New Product</title>

    <!-- Bootstrap Core CSS -->
    <link href="https://bootswatch.com/cerulean/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="allProducts.php">All Products</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

<?php
if (isset($_POST['submit']))
{
    $type = $_POST['type'];
?>

<form class="form-horizontal" action="addProduct.php" method="post" role="form">
    <fieldset>
        <legend><?= $type ?></legend>

        <input type="hidden" name="type" value="<?= $type ?>" />

        <div class="form-group">
            <label for="title" class="col-lg-2 control-label">Product Title</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="title" id="title" >
                 </div>
        </div>

        <div class="form-group">
            <label for="price" class="col-lg-2 control-label">Price</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="price" id="price" >
                </div>
        </div>

        <?php if ($type == "Tools") : ?>
        <div class="form-group">
            <label for="weight" class="col-lg-2 control-label">Weight</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="weight" id="weight" >
                </div>
        </div>

        <div class="form-group">
            <label for="shipper" class="col-lg-2 control-label">Which Shipping Method?</label>
                <div class="col-lg-10">
                    <select class="form-control" id="shipper" name="shipper">
                        <option>UPS</option>
                        <option>FedEx</option>
                        <option>US Postal Ground</option>
                        <option>US Postal Air (Express)</option>
                    </select>
                </div>
        </div>

        <?php elseif ($type == "Electronics") : ?>

        <div class="form-group">
              <label for="recyclable" class="col-lg-2 control-label">Is this recyclable?</label>
              <div class="col-lg-10">
                <div class="radio">
                  <label>
                    <input type="radio" name="recyclable" id="yes" value="yes" checked="">
                    Yes
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="recyclable" id="no" value="no">
                    No
                  </label>
                </div>
            </div>
        </div>

        <?php endif;?>

        <div class="form-group">
            <label for="description" class="col-lg-2 control-label">Description</label>
                <div class="col-lg-10">
                    <textarea class="form-control" rows="3" id="description" name="description"></textarea>
                </div>
        </div>

        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </fieldset>
</form>

<?php } ?>