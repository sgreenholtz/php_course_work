<!DOCTYPE html>
<html lang="en">
<?php define('SITE_ROOT', '/php-course-work/project_4') ?>
<head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Photo Feed</title>

        <!-- Bootstrap Core CSS -->
        <link href="https://bootswatch.com/united/bootstrap.min.css" rel="stylesheet">

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

        <div class="container">
                <div class="row">
                        <h1>My Photo Feed</h1>
                </div>
        </div>


        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                    <ul class="nav navbar-nav">
                        <li><a class="navbar-brand" href="<?= SITE_ROOT ?>/index.php">Home</a></li>
                        <form class="navbar-form navbar-left" role="search" method="post" action="index.php">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search" name="search">
                            </div>
                            <button type="submit" class="btn btn-default" name="submit">Submit</button>
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
