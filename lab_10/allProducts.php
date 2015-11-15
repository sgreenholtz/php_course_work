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
                    <li>
                        <a href="index.php">Add Product</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

    <h1>All Items</h1>
    <div class="panel panel-default col-md-12">
        <div class="panel-body">
     <?php
        $mysqli = mysqli_connect('localhost', 'sgreenholtz', '', lab_10);
        $query = "SELECT * FROM Products ORDER BY id DESC;";
        $result = mysqli_query($mysqli, $query);
         if (!$result)
        {
              exit("Database query ($query) error: ". mysql_error($mysqli));
        }
      ?>
      <table class="table table-striped table-hover ">
        <thead>
          <tr>
            <th>Title</th>
            <th>Price</th>
            <th>Type</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($record = mysqli_fetch_array($result)) { ?>
            <tr>
              <td><?= $record['Title'] ?></td>
              <td>$<?= $record['Price'] ?></td>
              <td><?= $record['ProductType'] ?></td>
              <td><?= $record['Description'] ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

</div>

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>

</html>
