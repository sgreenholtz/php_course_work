<!DOCTYPE html>
<html lang="en">
<?php define('SITE_ROOT', '/php-course-work/project_3') ?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sebastian's Writing Blog</title>

    <!-- Bootstrap Core CSS -->
    <link href="https://bootswatch.com/darkly/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

    <!-- Script for Text Enter -->
    <script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>

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
            <h1>Sebastian's Writing Blog</h1>
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
            <li><a href="<?= SITE_ROOT ?>/admin/login.php">Admin</a></li>
            <li><a href="<?= SITE_ROOT ?>/logout.php">Log Out</a></li>
            <li><a href="<?= SITE_ROOT ?>/story_summary.php">Story Summary</a></li>
            <li><a href="<?= SITE_ROOT ?>/chapters.php">Chapters</a></li>
          </ul>
        </div>
      </div>
    </nav>
