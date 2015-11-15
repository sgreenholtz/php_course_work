<?php
    require_once('product.php');
    require_once('electronics.php');
    require_once('tools.php');
    require_once('addProduct.php');
?>

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
                        <a href="#">All Products</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

    <form class="form-horizontal" action="addProduct.php" method="post" role="form">
      <fieldset>
        <legend>Add new product</legend>

        <div class="form-group">
          <label for="type" class="col-lg-2 control-label">Product Type</label>
          <div class="col-lg-10">
            <select class="form-control" id="type" >
                <option>Tools</option>
                <option>Electronics</option>
                <option>Other</option>
            </select>
          </div>
        </div>

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

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>

</html>
